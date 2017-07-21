
<?php
$foo = file(base_url() . "/archivos/intranet/banner.txt");
reset($foo);
$id = 0;
?>
<div class="container panel-body">
    <div class="panel panel-default">
        <div class="panel-heading">
            Banner MSI Intranet
        </div>
        <div class="panel-body">
            <?php
            while (list(, $valor) = each($foo)) {
                ?>
                <div class=" panel-body panel panel-default">
                    <form name="<?php echo $id; ?>" class="form-group col-md-8" method="post" >
                        <label>Banner <?php echo $id; ?></label>
                        <input class="form-control" type="hidden" name="id" value="<?php echo $id; ?>">
                        <input class="form-control form-group" type="text" name="url<?php echo $id; ?>" value="<?php echo $valor; ?>">
                        <?php echo form_error("url$id"); ?>
                        <a href="<?php echo base_url(); ?>intranet/eliminarbanner/<?php echo $id; ?>" class="btn btn-danger"><i class="icofont icofont-ui-delete"></i> Eliminar</a>                        
                    </form>
                    <div class="col-md-4 img-responsive">
                        <img src="<?php echo $valor; ?>" width="100%"/>
                    </div>
                </div>
                <?php
                $id++;
            }
            ?>
        </div>
    </div>
    <a class="btn btn-success" href="<?php echo base_url(); ?>intranet/nuevoBanner/<?php echo $id; ?>" id="<?php echo $id; ?>"><i class="icofont icofont-ui-add"></i> Nuevo</a>
</div>

