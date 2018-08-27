 <!-- Modal -->
 <div class="modal fade" id="modProceso" role="dialog" aria-labelledby="addLabel">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="addLabel">Agregar Proceso</h4>
      </div>
      <form method="POST" action="../controlador/proceso.php" >
        <div class="modal-body">

       <div class="form-group">
          <label for="id"></label>
          <input type="text" class="form-control" id="id"  name="idproceso" >
        </div>


        <div class="form-group">
          <label for="num">Numero Proceso</label>
          <input type="numeric" class="form-control" id="num"  name="num" >
        </div>

        <div class="form-group">
          <label for="descripcion">Descripcion</label>
          <input type="text" class="form-control" id="descripcion"  name="descripcion" >
        </div>

          <div>
           <div class="form-group">
            <label for="sede">Sede</label>  
            <select class="form-control" id="sede" name="sede" >
              <option>Seleccione</option>
              <option value="Bogota">Bogota</option>
              <option value="Mexico">Mexico</option>
              <option value="Peru">Peru</option>
            </select>
          </div>
        </div> 

     <div class="form-group">
          <label for="presupuesto">Presupuesto</label>
          <input type="boolean" class="form-control" id="presupuesto"  name="presupuesto" >
        </div>

        <div class="modal-footer">
         <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
         <button type="submit"  class="btn btn-default" value="2" name="funcion">Registrar Datos</button>
       </div>
     </form>