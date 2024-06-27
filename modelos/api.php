<?php
    function decodificar($fichero){
        $url = $fichero;  
        $data = file_get_contents($url);
        $array = json_decode($data,true);        
        return $array;
    }
    function datos_recurso($ficha){
        $array = decodificar("https://www.omdbapi.com/?apikey=fe8a7565&i=$ficha");
        return $array;
    
    }
    function datos_busqueda($titulo, $year, $tipo){
        $array = decodificar("https://www.omdbapi.com/?apikey=fe8a7565&s=$titulo&y=$year&type=$tipo");
        return $array;
    
    }
?>