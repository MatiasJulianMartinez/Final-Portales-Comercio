<!-- Modal Eliminar Producto -->
<div class="modal fade" id="eliminarModal{{ $articulo->id }}" tabindex="-1" aria-labelledby="eliminarModalLabel{{ $articulo->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h4 class="modal-title" id="eliminarModalLabel{{ $articulo->id }}">Confirmar Eliminación</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de que deseas eliminar el producto <strong>{{ $articulo->nombre }}</strong>?
            </div>
            <div class="modal-footer">
                <form action="{{ route('articulos.destroy', $articulo->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>
