<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	session_start();

	require_once "./miki_components/functions.php";	
	include("./miki_connect/connect.php");

	function randstr($lenght = 100){
		$numbers_to_string = '0123456789';
		$numb_lenght = strlen($numbers_to_string);
		$randstring ='';
		for ($i = 0; $i < $lenght; $i++) {
			$randstring .= $numbers_to_string[mt_rand(0, $numb_lenght)-1];
		}
		return $randstring;

	}
	$string = randstr(10);

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
<!DOCTYPE HTML>
<html lang="ru">
	<?php require_once "./miki_components/head.php";?>
	<body>
		<?php require_once "./miki_components/nav_panel.php";?>
		<div class="container-fluid main_content">
			<div class="row cell_content">
				<div class="col-sm-2 mt-4">
					<div class = "side_user_panel">
						<?php require_once "./miki_components/userpanel.php";?>
					</div>
				</div>
				<div class="col-sm-2"></div>
				<div class="col-sm-4 mt-4 r_side_content">
					<div class="col-sm post__text">
						Lorem, ipsum, dolor sit amet consectetur adipisicing elit. Iusto consequatur, iure expedita. Cumque neque vel ipsam officia expedita animi quia quis maiores tempore ipsa, ad, omnis eveniet totam, rem recusandae.
					</div>
					<div class="col-sm post__text">
						Lorem, ipsum, dolor sit amet consectetur adipisicing elit. Iusto consequatur, iure expedita. Cumque neque vel ipsam officia expedita animi quia quis maiores tempore ipsa, ad, omnis eveniet totam, rem recusandae.
					</div>
					<div class="col-sm post__text">
						Lorem, ipsum, dolor sit amet consectetur adipisicing elit. Iusto consequatur, iure expedita. Cumque neque vel ipsam officia expedita animi quia quis maiores tempore ipsa, ad, omnis eveniet totam, rem recusandae.
					</div>
					<div class="col-sm post__text">
						<div>
							<?php echo $string; ?>
						</div>
						<div>
							<?php echo thousandplus1(); ?>
						</div>
					</div>
				</div>
				<div class="col-sm-4 mt-4 r_side_content">
					<?php require "./miki_components/chat.php";?>
				</div>
			</div>
		</div>
		<?php require_once "./miki_components/footer.php";?>
	</body>
</html>