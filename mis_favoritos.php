<?php 
      session_start();
      if(!isset($_SESSION["perfil"])){header('Location: salir.php');}

      include "modelos/bbdd/preferidos.php";
      include "modelos/bbdd/perfiles.php";
      include "modelos/api.php"; 
      
      $id_usuario = $_SESSION["id"];
      
      $array_preferidos = preferidos_listado();
      $array_final = [];
      $n = 0;

      foreach($array_preferidos as $preferido) {
        //var_dump($preferido); aqui el array entero de $preferido 
          if ($preferido["id_usuario"] == $id_usuario){
            $array = datos_recurso($preferido["id_recurso"]);
            $array_final[$n]["Title"] = $array["Title"];
            $array_final[$n]["Year"] = $array["Year"];
            $array_final[$n]["Type"] = $array["Type"];
            $n++;
            
          }
      }

      
      include "vistas/preferidos.html";
?>