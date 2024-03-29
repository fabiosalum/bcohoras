<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Solicitacoes;
use App\Models\User;
use Carbon\Carbon;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\Auth;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;
use App\Models\Configuracoes;

class UserRelatoriosController extends Controller
{
    public function index()
    {

        $user = Auth::user();

        $sol_entradas = Solicitacoes::where('user_id', $user->id)
            ->where('status', 'aprovado')
            ->where('regras', 'entrada')
            ->latest('id')
            ->get();

        $sol_saidas = Solicitacoes::where('user_id', $user->id)
            ->where('status', 'aprovado')
            ->where('regras', 'saida')
            ->latest('id')
            ->get();

        return view ('user.relatorios.index', compact('user', 'sol_entradas', 'sol_saidas'));

        // $users = User::where('regras', '=', 'user')->get();
        // $sol_entradas = Solicitacoes::where('regras', '=', 'entrada')->get();
        // $sol_saidas = Solicitacoes::where('regras', '=', 'saida')->get();
        // return view ('admin.relatorios.index', compact('users', 'sol_entradas', 'sol_saidas'));

    }



    public function buscar(Request $request)
    {


    // Recupere o ID do usuário do formulário
    $userId = $request->input('user');

    // Recupere o usuário do banco de dados
    $user = User::find($userId);

    // Se o usuário for encontrado, você pode exibir o relatório
    if ($user) {
        // Aqui você pode fazer o que for necessário para gerar o relatório com base no usuário


        $sol_entradas = Solicitacoes::where('regras', 'entrada')->where('user_id', $user->id)->where('status', 'aprovado')->latest('id')->get();
        $sol_saidas = Solicitacoes::where('regras', 'saida')->where('user_id', $user->id)->where('status', 'aprovado')->latest('id')->get();

        // Somando as horas de entrada
        $totalSolicitacoes_entradas = Carbon::createFromFormat('H:i:s', '00:00:00');
        foreach ($sol_entradas as $sol_entrada) {
            list($hours, $minutes, $seconds) = explode(':', $sol_entrada->qtde_horas);
            $totalSolicitacoes_entradas->addHours($hours)->addMinutes($minutes)->addSeconds($seconds);
        }

        // Somando as horas de Saida
        $totalSolicitacoes_saidas = Carbon::createFromFormat('H:i:s', '00:00:00');
        foreach ($sol_saidas as $sol_saida) {
            list($hours, $minutes, $seconds) = explode(':', $sol_saida->qtde_horas);
            $totalSolicitacoes_saidas->addHours($hours)->addMinutes($minutes)->addSeconds($seconds);
        }


        $totalSolicitacoes_entradasFormatado = $totalSolicitacoes_entradas->format('H:i:s');
        $totalSolicitacoes_saidasFormatado = $totalSolicitacoes_saidas->format('H:i:s');
        $diferencaHoras = $totalSolicitacoes_entradas->floatDiffInRealHours($totalSolicitacoes_saidas);
        $formatoDiferenca = gmdate('H:i:s', $diferencaHoras * 3600);



        return view ('user.relatorios.buscar', compact('user', 'sol_entradas', 'sol_saidas', 'totalSolicitacoes_entradasFormatado', 'totalSolicitacoes_saidasFormatado', 'formatoDiferenca'));

        } else {
            // Caso o usuário não seja encontrado, você pode tratar isso conforme necessário
            return redirect()->back()->with('error', 'Usuário não encontrado.');

        }


    }




    public function gerarPdf($id)
    {

        // Recupere o usuário do banco de dados
        $user = User::find($id);
        $config = Configuracoes::find(1);


        // Se o usuário for encontrado, você pode exibir o relatório
        if ($user) {
            // Aqui você pode fazer o que for necessário para gerar o relatório com base no usuário


            $sol_entradas = Solicitacoes::where('regras', 'entrada')->where('user_id', $user->id)->where('status', 'aprovado')->latest('id')->get();
            $sol_saidas = Solicitacoes::where('regras', 'saida')->where('user_id', $user->id)->where('status', 'aprovado')->latest('id')->get();

            // Somando as horas de entrada
            $totalSolicitacoes_entradas = Carbon::createFromFormat('H:i:s', '00:00:00');
            foreach ($sol_entradas as $sol_entrada) {
                list($hours, $minutes, $seconds) = explode(':', $sol_entrada->qtde_horas);
                $totalSolicitacoes_entradas->addHours($hours)->addMinutes($minutes)->addSeconds($seconds);
            }

            // Somando as horas de Saida
            $totalSolicitacoes_saidas = Carbon::createFromFormat('H:i:s', '00:00:00');
            foreach ($sol_saidas as $sol_saida) {
                list($hours, $minutes, $seconds) = explode(':', $sol_saida->qtde_horas);
                $totalSolicitacoes_saidas->addHours($hours)->addMinutes($minutes)->addSeconds($seconds);
            }


            $totalSolicitacoes_entradasFormatado = $totalSolicitacoes_entradas->format('H:i:s');
            $totalSolicitacoes_saidasFormatado = $totalSolicitacoes_saidas->format('H:i:s');
            $diferencaHoras = $totalSolicitacoes_entradas->floatDiffInRealHours($totalSolicitacoes_saidas);
            $formatoDiferenca = gmdate('H:i:s', $diferencaHoras * 3600);


            $data = [
                'user' => $user,
                'sol_entradas' => $sol_entradas,
                'sol_saidas' => $sol_saidas,
                'totalSolicitacoes_entradas' => $totalSolicitacoes_entradas->format('H:i:s'),
                'totalSolicitacoes_saidas' => $totalSolicitacoes_saidas->format('H:i:s'),
                'diferencaHoras' => $formatoDiferenca,
                'totalSolicitacoes_entradasFormatado' => $totalSolicitacoes_entradas->format('H:i:s'),
                'totalSolicitacoes_saidasFormatado' => $totalSolicitacoes_saidas->format('H:i:s'),
                'formatoDiferenca' => gmdate('H:i:s', $diferencaHoras * 3600),
                'config' => $config
            ];

            $dompdf = new Dompdf();

            // Carregue a view com os dados
            $view = View::make('admin.relatorios.relatorio_pdf', $data);

            $dompdf->loadHtml($view->render());

            $dompdf->setPaper('A4', 'landscape');

            $dompdf->render();

            return $dompdf->stream('relatorio.pdf');

            // Opcional: Baixar o PDF automaticamente
            //return $pdf->download('relatorio.pdf');

            // Ou, se você quiser apenas retornar o PDF na resposta HTTP
            //return $pdf->stream('relatorio.pdf');

        } else {
            // Caso o usuário não seja encontrado, você pode tratar isso conforme necessário
            return redirect()->back()->with('error', 'Usuário não encontrado.');
        }
    }

}
