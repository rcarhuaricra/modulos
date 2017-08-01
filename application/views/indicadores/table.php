<?php

/*
  while ($nombre_fruta = current($data[0])) {
  echo key($data[0]) . '<br />';
  next($data[0]);
  } */
$db = $this->load->database('indicadores', TRUE);
        echo $db->['database'];

echo "<br>";

echo "<br>";

$i = 0;
while ($i < count($data)) {
    while (current($data[$i])) {
        echo key($data[$i]) . '<br />';
        next($data[$i]);
    }
    print_r($data[$i]);
    echo "<br>";
    $i++;
}
$tabla = $data[0];
foreach ($tabla as $row) {
    while ($nombre_fruta = current($tabla)) {
        $col = key($tabla);
        echo $row->$col;
        next($tabla);
    }
    echo "<br>";
}

echo "<br>-------------------------<br>";
while ($nombre_fruta = current($data[0])) {
    echo key($data[0]) . '<br />';
    next($data[0]);
}
?>