<?php
date_default_timezone_set("Europe/Berlin");
?>
<div class="panel-body container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <span class="icofont icofont-growth" style="padding-right: 0.5em; color: #5CB85C; font-size: 1.5em;"></span>
            <label>
                Conteo por Mes de Consultas en Sistemas de Información Catastral 
            </label>
            
            <div class="pull-right">
                <a class="btn btn-success" href="<?php echo base_url(); ?>sic/filtro">
                    <span class="fa fa-filter"></span> Filtrado
                </a>
            </div>
        </div>
        <div class="panel-body">
            <div class="table-responsive">

                <table class="table table-bordered" id="reporteSIC">
                    <thead>
                        <tr>
                            <th>Cantidad de Busquedas</th>
                            <th>periodo</th>
                            <th>Busqueda</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($jsonButton->ListaNroResult as $item) {
                            echo "<tr>";
                            echo "<td>" . $item->proTotalBusqueda . "</td>";
                            echo "<td>" . $item->proFecReg . "</td>";
                            echo "<td>" . $item->proTxtBoton . "</td>";
                            echo "</tr>";
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
    
        $('#reporteSIC').DataTable({
            "searching": false,
             "order": [[ 1, "desc" ]],
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
