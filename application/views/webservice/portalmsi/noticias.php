<?php

$noticias = array();
foreach ($noticia->result() as $fila) {

    $id = $fila->ID;
    $post_date = $fila->post_date;
    $post_status = $fila->post_status;
    $menu_order = $fila->menu_order;
    $post_type = $fila->post_type;
    $post_title = $fila->post_title;
    $post_content = $fila->post_content;
    $guid = $fila->guid;

    $noticias [] = array(
        'ID' => $id,
        'post_date' => $post_date,
        'post_status' => $post_status,
        'menu_order' => $menu_order,
        'post_type' => $post_type,
        'post_title' => $post_title,
        'post_content' => $post_content,
        'guid' => $guid
    );
}
echo json_encode($noticias);
