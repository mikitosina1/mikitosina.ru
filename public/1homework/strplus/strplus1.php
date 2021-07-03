<?php

function randstr($lenght = 100){
	$numbers_to_string = '0123456789';
	$numb_lenght = strlen($numbers_to_string);
	$randstring ='';
	for ($i = 0; $i < $lenght; $i++) {
		$randstring .= $numbers_to_string[mt_rand(0, $numb_lenght)-1];
	}
	return $randstring;

}

function thousandplus1(){

	global $string;
	$one = '1';
	$maxLen = max(strlen($string), strlen($one));
	$varstring = str_pad($string, $maxLen, '0', 0);
	$varone = str_pad($one, $maxLen, '0', 0); // Дополняет строку другой строкой до заданной длины
	$inMind = 0;
	$strVal = '';

	for ($i = $maxLen - 1; $i >= 0; $i--){
		$x1 = (int)$varstring[$i];
		$x2 = (int)$varone[$i];
		$total = $x1 + $x2;
		$sumFinal = $total + $inMind;

		if ($sumFinal > 9){
			$inMind = 1;
			$sumFinal %= 10;
		}else{
			$inMind = 0;
		}

		$strVal .= strval($sumFinal);
		$total_to_str = strrev($strVal);
	}
	echo $total_to_str;
}
?>