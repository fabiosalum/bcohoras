@extends('user.layouts.master')
@section('content')
    @php
        use Illuminate\Support\Carbon;
        $datetime = Carbon::now();
    @endphp


    <div class="card">
        <div class="card-body dashboard-tabs p-0">
            <ul class="nav nav-tabs px-4" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab"
                        aria-controls="overview" aria-selected="true">Visão geral</a>
                </li>
            </ul>
            <div class="tab-content py-0 px-0">
                <div class="tab-pane fade active show" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                    <div class="d-flex flex-wrap justify-content-xl-between">


                        <div class="d-flex border-md-right flex-grow-1 align-items-left justify-content-left p-3 item mt-2">
                            <div class="d-flex flex-column justify-content-around">
                                <h2 class="mb-1 text-muted pl-3" style="font-size: 20px">Olá, {{$user->name}} </h2>

                                    <span class="mb-1 text-muted pl-4 mt-3">Matrícula: {{$user->matricula}}</span>
                                    <span class="mb-1 text-muted pl-4">setor: {{$user->setor->nome}}</span>
                                    <span class="mb-1 text-muted pl-4">supervisor: {{$user->supervisor->name}}</span>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
