<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	session_start();

	require_once "./miki_components/functions.php";	
	include("./miki_connect/connect.php");
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
						<pre>
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
							$string = randstr(1000);
							echo $string;
							function thousandplus1(){
								global $string;
								$string_lenght = str_split($string);
								$arr_reverse = array_reverse($string_lenght);
								// foreach ($arr_reverse as $ins){
								// 	print_r($ins);
								// }
							}
						?>
						</pre>
						<pre>
							<?php echo thousandplus1(); ?>
						</pre>
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
