<div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            
            <h4 class="modal-title">Agregar Banner</h4>
        </div>
        <div class="modal-body">
            <form method="post" class="row panel-body" action="<?php echo base_url(); ?>intranet/nuevoBanner/">
                <div class="input-group">
                    <input type="text" class="form-control" name="url" placeholder="Ingrese URL de Imagen">                    
                    <span class="input-group-btn">
                        <button class="btn btn-success" type="submit"><i class="icofont icofont-save"></i> Guardar</button>
                    </span>
                </div>                
            </form>
            <?php echo form_error("url"); ?>
        </div>
        <div class="modal-footer">
            <a class="btn btn-danger" href="<?php echo base_url();?>intranet/banner"><i class="icofont icofont-close-circled"></i> Cancelar</a>
        </div>
    </div>

</div>