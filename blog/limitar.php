<?php
	
	function limString($string, $value, $clean){
		if($clean == true){
			$string = stripp_tags($string);
		} 
		if(strlen($string) <= $value){
			return $string;
		}
		// Corte do texto no corpo do post
		$lim_String = substr($string, 0, $value);
		$last = strrpos($lim_String, ' '); // Procurar o ultimo espaco em branco (evitando cortar palavras ao meio)
		return substr($string, 0, $last);
	}
?>

