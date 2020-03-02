<html>
<head>
<title>mikitosina's blog :D</title> <!-- название сайта -->
<meta charset="UTF-8">
</head>
<body>
	
<?php
phpinfo();
$limit = 10;

// $x = 0;
// while (++$x <= $limit) {
// 	echo "$x. " . rand() . '<br/>';
// }

// for($x = 1; $x <= $limit; $x++){
// 	echo "$x. " . rand() . '<br/>';

// каждый 10й не выводить, каждый 5й красный, каждый 3й зелёный}

for($x = 1;; $x++){
	if($x >= 20){
		break;
	}

	if ($x % 10 == 0) continue;
		$color = 'black';
	if ($x % 5 == 0) {
		$color = 'red';
	}
	if ($x % 3 == 0) {
		$color = 'green';
	}
	echo "<span style='color: {$color}'>$x. " . rand() . '</span><br/>';

}
?>


</body>