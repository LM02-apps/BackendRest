<?php


if ($_SERVER['REQUEST_METHOD'] === 'GET') 
{
    echo "metodo get richiamato";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    echo "metodo post richiamato";
}

if($_SERVER['REQUEST_METHOD'] === 'DELETE')
{
    echo "metodo delete richiamato";
}

if ($_SERVER['REQUEST_METHOD'] === 'PUT')
{
    echo "metodo put richiamato";
}
?>