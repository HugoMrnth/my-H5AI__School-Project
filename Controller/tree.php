<?php
    // require_once "Model/H5AI.class.php";
    $h5ai = new H5AI('./');
    $ourArr = [];
    
    $inserstuff = $h5ai->getFiles('./', $ourArr, true);

    $link = "";
    
?>