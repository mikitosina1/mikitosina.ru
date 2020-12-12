<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

function plusOne(string $str) {

	if (empty($str) || !intval($str))
		return '1';

	$i = strlen($str) - 1;

	while(true) {
		
		if ($i == -1) {
			$str = '1' . $str;

			break;
		}

		if ($str[$i] != '9') {
			$str[$i] = $str[$i] + 1;

			break;
		}

		$str[$i] = '0';
		$i--;
	}

	return $str;
}

$origStr = '999';
$newStr = plusOne($origStr);

echo 'origStr: ' . $origStr;
echo '<br>';
echo 'newStr: '. $newStr;