<?php

function removeMaskDinheiro($valor)
{
    $valor = preg_replace("/[.]/", '', $valor);
    $valor = preg_replace("/[,]/", '.', $valor);
    return $valor;
}

function formatDtBd($data)
{
    return date("Y-m-d", strtotime($data));
}

function removeCaract($valor)
{
    return preg_replace("/[\D]/", '', $valor);
}
