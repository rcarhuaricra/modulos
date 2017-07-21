
<?php
$foo = file(base_url() . "/archivos/intranet/banner.txt");
reset($foo);
$id = 0;
?>

<div id="myCarousel" class="carousel slide" data-ride="carousel"  data-interval="3500">
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <?php
        while (list(, $valor) = each($foo)) {
            ?>
            <div class = "item <?php
            if ($id == 0) {
                echo "active";
            } 
            ?>">
                <img src = "<?php echo $valor; ?>" alt = "Chania" width="100%">
                <div class = "carousel-caption">
                    <h3></h3>
                    <p></p>
                </div>
            </div>
            <?php
            $id++;
        }
        ?>
    </div>
    <!--Left and right controls -->
    <a class = "left carousel-control" href = "#myCarousel" role = "button" data-slide = "prev">
        <span class = "glyphicon glyphicon-chevron-left" aria-hidden = "true"></span>
        <span class = "sr-only">Previous</span>
    </a>
    <a class = "right carousel-control" href = "#myCarousel" role = "button" data-slide = "next">
        <span class = "glyphicon glyphicon-chevron-right" aria-hidden = "true"></span>
        <span class = "sr-only">Next</span>
    </a>
</div>