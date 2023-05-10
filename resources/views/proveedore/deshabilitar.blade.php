 <!-- Modal para deshabilitar registro-->
 <div class="modal fade" id="modal-deshabilitar-{{ $proveedore->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
     tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
         <form action="{{ route('prov.destroy', $proveedore->id) }} " method="POST">
             @csrf
             @method('DELETE')

             <div class="modal-content">
                 <div class="modal-header">
                     <h1 class="modal-title fs-5 text-danger" id="staticBackdropLabel">
                         Deshabilitar Registro del Proveedor</h1>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body">
                     ¿Desea deshabilitar el registro No.
                     {{ $proveedore->id . ', del Proveedor: ' . $proveedore->nombre }}?
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-primary bg-gradient"
                         data-bs-dismiss="modal">Cancelar</button>
                     <button type="submit" class="btn btn-danger bg-gradient">Deshabilitar</button>
                 </div>
             </div>
         </form>
     </div>
 </div>
