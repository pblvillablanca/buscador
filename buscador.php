<?php

      $ciudad = $_POST['ciudad'];
      $tipo = $_POST['tipo'];
      $precio = $_POST['precio'];

      // Obtenemos el contenidos del JSON
      $strJsonFileContents = file_get_contents("data-1.json");
      // Se convierte a un array
      $array = json_decode($strJsonFileContents, true);

      $filtrado = array();

      //Si vienen ambos filtros
      if($ciudad != "" && $tipo != ""){

        foreach ($array as &$valor) {
            if($valor['Ciudad'] == $ciudad && $valor['Tipo'] == $tipo){

                $precioCasa = $valor['Precio'];
                $precioCasaFinal = str_replace("$", "",$precioCasa);

                $splitPrecio=explode(";",$precio);

                $precioMin = $splitPrecio[0];
                $precioMax = $splitPrecio[1];

                if($precioCasaFinal >= $precioMin && $precioCasaFinal <= $precioMax)
                  array_push($filtrado,$valor['Id']);
            }
        }

      }

      //Si solo viene la ciudad
      if($ciudad != "" && $tipo == ""){

        foreach ($array as &$valor) {
            if($valor['Ciudad'] == $ciudad ){

                $precioCasa = $valor['Precio'];
                $precioCasaFinal = str_replace("$", "",$precioCasa);

                $splitPrecio=explode(";",$precio);

                $precioMin = $splitPrecio[0];
                $precioMax = $splitPrecio[1];

                if($precioCasaFinal >= $precioMin && $precioCasaFinal <= $precioMax)
                  array_push($filtrado,$valor['Id']);
            }
        }

      }

      //Si solo viene el tipo
      if($ciudad == "" && $tipo != ""){

        foreach ($array as &$valor) {
            if($valor['Tipo'] == $tipo ){

                $precioCasa = $valor['Precio'];
                $precioCasaFinal = str_replace("$", "",$precioCasa);

                $splitPrecio=explode(";",$precio);

                $precioMin = $splitPrecio[0];
                $precioMax = $splitPrecio[1];

                if($precioCasaFinal >= $precioMin && $precioCasaFinal <= $precioMax)
                  array_push($filtrado,$valor['Id']);
            }
        }

      }

      //Si no vienen ninguno de los dos

      if($ciudad == "" && $tipo == ""){

        foreach ($array as &$valor) {

                $precioCasa = $valor['Precio'];
                $precioCasaFinal = str_replace("$", "",$precioCasa);

                $splitPrecio=explode(";",$precio);

                $precioMin = $splitPrecio[0];
                $precioMax = $splitPrecio[1];

                if($precioCasaFinal >= $precioMin && $precioCasaFinal <= $precioMax)
                  array_push($filtrado,$valor['Id']);

        }

      }


      //var_dump($filtrado);
      echo json_encode($filtrado);
 ?>
