 <!-- Creamos un modal para cada operación que podremos realizar con cada registro -->
            <div class="modal fade" id="modificar{{ $entrada->entradas_id }}" tabindex="-1" role="dialog" aria-labelledby="modificarLabel{{ $entrada->entradas_id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modificar">Confirmar Modificación</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ¿Estás seguro de que deseas modificar esta entrada?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn-secondary py-2 px-4 rounded-lg mr-2" data-dismiss="modal">Cancelar</button>
                            <a href="{{route('entradas.edit',['entradas_id'=>$entrada->entradas_id ] )}}" class="btn-primary py-2 px-4 rounded-lg mr-2">Modificar</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="detalle{{ $entrada->entradas_id }}" tabindex="-1" role="dialog" aria-labelledby="detalleLabel{{ $entrada->entradas_id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="detalle">Detalle de Entrada</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ¿Estás seguro de que deseas ver el detalle de esta entrada?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn-secondary py-2 px-4 rounded-lg mr-2" data-dismiss="modal">Cerrar</button>
                            <a href="{{ route('entradas.show', ['entradas_id' => $entrada->entradas_id]) }}" class="btn-primary py-2 px-4 rounded-lg mr-2">Ver detalle</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="eliminar{{ $entrada->entradas_id }}" tabindex="-1" role="dialog" aria-labelledby="eliminarLabel{{ $entrada->entradas_id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="eliminarLabel{{ $entrada->entradas_id }}">Confirmar Eliminación</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ¿Estás seguro de que deseas eliminar esta entrada?
                        </div>
                        <div class="modal-footer">
                            <form method="POST" action="{{ route('entradas.destroy', ['entradas_id' => $entrada->entradas_id]) }}">
                                <button type="button" class="btn-secondary py-2 px-4 rounded-lg mr-2" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn-danger py-2 px-4 rounded-lg">Eliminar</button>
                                @csrf
                                @method('delete')
                            </form>
                        </div>
                    </div>
                </div>
            </div>