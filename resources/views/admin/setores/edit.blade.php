 <!-- Modal -->
<div class="modal fade" id="editarsetor-{{$setor->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar Setor</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('setores.edit', $setor->id)}}" method="GET" class="forms-sample">
                @csrf
                    <div class="form-group">
                        <label for="exampleInputUsername1">Nome do setor</label>
                        <input type="text" class="form-control" id="nome" name="nome" value="{{$setor->nome}}">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary modal-close" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
            </form>
      </div>
    </div>
  </div>
