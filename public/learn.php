
<?php
// каждый 10й не выводить, каждый 5й красный, каждый 3й зелёный
function every5and10 (){
    for($x = 1;; $x++){
        if($x >= 11){
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

}
?>
