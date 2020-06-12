<?php

function dtBoletim(){
    include "config.php";
    $sql = "SELECT MAX(data_boletim) as t FROM base_corona";
    $query = $mysqli->query($sql);
    $dados = $query->fetch_array();

    return $dados['t'];

}

function qtdeInfectado(){
    include "config.php";
    $sql = "SELECT MAX(casos_confirmados) as t FROM base_corona";
    $query = $mysqli->query($sql);
    $dados = $query->fetch_array();

    return $dados['t'];

}


function qtdeCurados(){
    include "config.php";
    $sql = "SELECT MAX(curados) as t FROM base_corona";
    $query = $mysqli->query($sql);
    $dados = $query->fetch_array();

    return $dados['t'];

}

function qtdeObitos(){
    include "config.php";
    $sql = "SELECT MAX(obitos) as t FROM base_corona";
    $query = $mysqli->query($sql);
    $dados = $query->fetch_array();

    return $dados['t'];

}

function qtdeGastos(){
    include "config.php";
    $sql = "SELECT format(sum(valor),2,'de_DE') as t FROM gastos";
    $query = $mysqli->query($sql);
    $dados = $query->fetch_array();

    return $dados['t'];

}





?>