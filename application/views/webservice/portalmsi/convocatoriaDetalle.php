<style>
    .titulo-detalle{
        text-align: right;
        font-weight: bold;
    }
</style>


<?php
foreach ($convocatoria->result() as $fila1) {
    
}
?>
<div class="modal-dialog">
    <div class="panel panel-default">
        <div class="panel-heading">
            <label>
                Detalle Convocatoria CAS Nº <?php echo $codigo = $fila1->codigo; ?>
            </label>
        </div>
        <div class="panel-body">
            <table class="table table-hover ">
                <tr>
                    <td class="titulo-detalle">
                        código:
                    </td>
                    <td>
                        <?php
                        echo $codigo = $fila1->codigo;
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="titulo-detalle">
                        Descripción:
                    </td>
                    <td>
                        <?php
                        echo $descripcion = $fila1->descripcion;
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="titulo-detalle">
                        Área Solicitante:
                    </td>
                    <td>
                        <?php
                        echo $area_solicitante = $fila1->area_solicitante;
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="titulo-detalle">
                        Convocatoria:
                    </td>
                    <td>
                        <?php
                        if ($fila1->convocatoria == NULL) {
                            
                        } else {
                            ?>
                            <a href = "<?php
                            echo $convocatoria = $fila1->convocatoria;
                            ?>"><img src = "http://www.msi.gob.pe/portal/wp-content/uploads/2013/11/ico_pdf.gif"> Descargar</a>
                           <?php }
                           ?>

                    </td>
                </tr>
                <tr>
                    <td class="titulo-detalle">
                        Resultado Curricular:
                    </td>
                    <td>
                        <?php
                        if ($fila1->resultado_curricular == NULL) {
                            
                        } else {
                            ?>
                            <a href = "<?php
                            echo $resultado_curricular = $fila1->resultado_curricular;
                            ?>"><img src = "http://www.msi.gob.pe/portal/wp-content/uploads/2013/11/ico_pdf.gif"> Descargar</a>
                               <?php
                           }
                           ?>

                    </td>
                </tr>
                <tr>
                    <td class="titulo-detalle">
                        Otras Evaluaciones:
                    </td>
                    <td>
                        <?php
                        if ($fila1->otras_evaluaciones == NULL) {
                            
                        } else {
                            ?>
                            <a href = "<?php
                            echo $otras_evaluaciones = $fila1->otras_evaluaciones;
                            ?>"><img src = "http://www.msi.gob.pe/portal/wp-content/uploads/2013/11/ico_pdf.gif"> Descargar</a>
                               <?php
                           }
                           ?>                        
                    </td>
                </tr>
                <tr>
                    <td class="titulo-detalle">
                        Publicación Final:
                    </td>
                    <td>
                        <?php
                        if ($fila1->publicacion_final == NULL) {
                            
                        } else {
                            ?>
                            <a href = "<?php
                            echo $publicacion_final = $fila1->publicacion_final;
                            ?>"><img src = "http://www.msi.gob.pe/portal/wp-content/uploads/2013/11/ico_pdf.gif"> Descargar</a>
                               <?php
                           }
                           ?>
                    </td>
                </tr>
                <tr>
                    <td class="titulo-detalle">
                        Comunicados:
                    </td>
                    <td>
                        <?php
                        if ($fila1->comunicados == NULL) {
                            
                        } else {
                            ?>
                            <a href = "<?php
                            echo $comunicados = $fila1->comunicados;
                            ?>"><img src = "http://www.msi.gob.pe/portal/wp-content/uploads/2013/11/ico_pdf.gif"> Descargar</a>
                               <?php
                           }
                           ?>


                    </td>
                </tr>
                <tr>
                    <td class="titulo-detalle">
                        Observaciones:
                    </td>
                    <td>
                        <?php
                        echo $observaciones = $fila1->observaciones;
                        ?>
                    </td>
                </tr>

            </table>
        </div>
    </div>
    <h2></h2>

</div>  