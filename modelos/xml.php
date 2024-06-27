<?php
    function llamada_xml($fichero){
        $xml = simplexml_load_file("modelos/datos_xml/$fichero.xml");
		$json = json_encode($xml);
		$array_xml = json_decode($json,TRUE);
		return($array_xml);
    }
    function preferidos_xml(){
		$array_xml = llamada_xml("preferidos");
		return($array_xml);
    }
    function usuarios_xml(){
        $array_xml = llamada_xml("archivo");
        return($array_xml);
    }
?>