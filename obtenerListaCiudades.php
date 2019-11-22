<?php

    // Obtenemos el contenidos del JSON
    $strJsonFileContents = file_get_contents("data-1.json");
    // Se convierte a un array
    $array = json_decode($strJsonFileContents, true);
    $todosTipos = array("");

    foreach ($array as &$valor) {
      array_push($todosTipos,$valor['Ciudad']);
    }

    $result = array_unique($todosTipos);
    $strFinal = "";
    foreach ($result as &$tipo) {
       $strFinal .= $tipo.',';
    }

    $strFinal = substr_replace($strFinal ,"",-1);
    $strFinal = substr($strFinal,1);

    echo $strFinal;

?>
