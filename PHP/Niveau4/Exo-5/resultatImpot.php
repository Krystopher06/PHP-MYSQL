<?php



/* 
include('impot.php');
$n= $_POST['nom'];
$r = $_POST['revenu'];

$client = new Impot($n,$r);
$client->calculeImpot();
$client->afficheImpot(); */
include('impot.php');
$n= $_GET['nom'];
$r = $_GET['revenu'];

$client = new Impot($n,$r);
/* $client->calculeImpot(); */ //On fait appelle à cette fonction avec la première version de la fonction calculeImpot() de impot.php
$client->afficheImpot();




?>