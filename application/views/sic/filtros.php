<?php
date_default_timezone_set("Europe/Berlin");
?>
<div class="panel-body container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <span class="icofont icofont-growth" style="padding-right: 0.5em; color: #5CB85C; font-size: 1.5em;"></span>
            <label>
                Reporte de Consultas en Sistemas de Información Catastral
            </label>
             <div class="pull-right">
                <a class="btn btn-success" href="<?php echo base_url(); ?>sic/busquedas">
                    <span class="icofont icofont-listing-number"></span> Busqueda
                </a>
            </div>
       
        </div>
        <div class="panel-body">
            <form class="row" action="<?php echo base_url(); ?>sic/filtro" method="post">
                <div class="form-group  row col-sm-8"> 
                    <div id="event_period ">
                        <div class="col-sm-6">

                            <label>Desde:</label>
                            <input type="text" class="form-control actual_range" name="inicio" value="<?php echo $inicio; ?>" placeholder="Ingrese Fecha de Incio" required="">
                        </div>
                        <div class="col-sm-6">
                            <label>Hasta:</label>
                            <input type="text" class="form-control actual_range" name="fin" value="<?php echo $fin; ?>" placeholder="Ingrese Fecha de Fin">
                        </div>
                    </div>
                </div>
                <div class="form-group  col-md-4">
                    <label class="control-label" for="email">Tipo de Busqueda:</label>
                    <select class="form-control" name="busqueda">
                        <?php
                        foreach ($options as $i => $value) {
                            if ($options[$i] == $busqueda) {
                                echo '<option selected="selected">' . $options[$i] . '</option>';
                            } else {
                                echo '<option>' . $options[$i] . '</option>';
                            }
                        }
                        ?>
                    </select>                      
                </div>
                <div class="form-group col-md-12 text-center">
                    <button class="btn btn-success "><span class="fa fa-filter"></span> Filtrar</button>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-bordered" id="reporteSIC">
                    <thead>
                        <tr>
                            <th>cod</th>
                            <th>Fecha</th>
                            <th>Busqueda</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($jsonButton->ListaResult as $item) {
                            if ($item->proTxtBoton == $busqueda or $busqueda == 'TODOS') {
                                $valjson = formatoFecha($item->proFecReg);
                                $val2 = $inicio;
                                $val3 = $fin;

                                $datetimejson = new DateTime($valjson);
                                $datetime2 = new DateTime($val2);
                                $datetime3 = new DateTime($val3);

                                //var_dump($datetime1->diff($datetime2));
                                if ($datetimejson >= $datetime2 && $datetimejson <= $datetime3) {
                                    ?>
                                    <tr>
                                        <?php
                                        echo "<td>" . $item->proCodBusqueda . "</td>";
                                        echo "<td>";
                                        echo formatoFecha($item->proFecReg);
                                        echo "</td>";
                                        echo "<td>" . $item->proTxtBoton . "</td>";
                                        ?>
                                    </tr>
                                    <?php
                                } else {
                                    
                                }
                            }
                        }
                        ?>
                    </tbody>
                </table>


            </div>
        </div>
    </div>
</div>   

<?php

function formatoFechaingresada($date) {
    $fecha = date_create_from_format('d-m-Y', $date);
    return date_format($fecha, 'd-m-Y');
}

function formatoFecha($date) {
    $fecha = date_create_from_format('d/m/Y h:i:s A', $date);
    return date_format($fecha, 'd-m-Y');
}
?>

<script>

    $(document).ready(function () {
        $('#event_period').datepicker({
            inputs: $('.actual_range').datepicker({
                format: 'dd-mm-yyyy',
                endDate: '+1d'
            })
        });
        $('#reporteSIC').DataTable({
            "searching": false,
            "language": {
                "url": "<?php echo base_url(); ?>archivos/dataTables/Spanish.json"
            },
            dom: 'Bfrtip',
            lengthMenu: [
                [10, 25, 50, -1],
                ['10 Filas', '25 Filas', '50 Filas', 'Mostrar Todos']
            ],
            buttons: [
                'pageLength', 'excel', 'pdf'
            ]
        });
    });
</script>
