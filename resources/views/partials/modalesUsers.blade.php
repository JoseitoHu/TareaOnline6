 <!-- Creamos un modal para cada operación que podremos realizar con cada registro -->
            <div class="modal fade" id="modificar{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="modificarLabel{{ $user->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modificar">Confirmar Modificación</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ¿Estás seguro de que deseas modificar este Usuario?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn-secondary py-2 px-4 rounded-lg mr-2" data-dismiss="modal">Cancelar</button>
                            <a href="{{route('usuarios.edit',['id'=>$user->id ] )}}" class="btn-primary py-2 px-4 rounded-lg mr-2">Modificar</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="eliminar{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="eliminarLabel{{ $user->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="eliminarLabel{{ $user->id }}">Confirmar Eliminación</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ¿Estás seguro de que deseas eliminar este Usuario?
                        </div>
                        <div class="modal-footer">
                            <form method="POST" action="{{ route('usuarios.destroy', ['id' => $user->id]) }}">
                                <button type="button" class="btn-secondary py-2 px-4 rounded-lg mr-2" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn-danger py-2 px-4 rounded-lg">Eliminar</button>
                                @csrf
                                @method('delete')
                            </form>
                        </div>
                    </div>
                </div>
            </div>