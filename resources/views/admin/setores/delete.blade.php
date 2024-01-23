 <!-- Modal -->
<div class="modal fade" id="deletarsetor-{{$setor->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Excluir setor</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <p>Tem certeza que deseja exluir o setor {{$setor->nome}}</p>

            <form action="{{route('setores.destroy', $setor->id)}}" method="POST" class="forms-sample">
                @csrf
                @method("DELETE")
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary modal-close" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </div>
            </form>
      </div>
    </div>
  </div>
