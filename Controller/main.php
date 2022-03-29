<?php
// require_once "Model/H5AI.class.php";
$centerSec = new H5AI('./');
$mainArr = [];
$sizefolder = [];
$dateArr =[];
$Newurl = "." . URI;
$uri = URI;
$chevron_right = " <i class='fa fa-chevron-right' aria-hidden='true'></i>";
$ariane = str_replace('/', $chevron_right, $uri);
// var_dump($ariane);
// var_dump($Newurl);
$main = $centerSec->getFiles($Newurl, $mainArr, false, $sizefolder, $dateArr);
$explode = $centerSec->typeOfFile('hello.png');