<?php

// echo date('d/m/Y');
// classe date - difícil de manipular os dados
// classe DateTime

$data = new DateTime();
echo $data->format('d-m-Y H:i:s');
// var_dump($data);

$data1 = new DateTime();
$intervalo = new DateInterval('PT5M');
// adicionar um período de tempo (PT) de 5 minutos (5M)
$data1->add($intervalo);

// $intervalo = new DateInterval('P5Y10M5DT10H50M10S');
// $data1->sub($intervalo);

var_dump($data1);