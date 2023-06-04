<?php
for ($count=2; $count<1000001; $count++){
    $num = $count;
    while($num > 1){
        if ($num % 2 == 0){
            $num = $num / 2;
        } else {
            $num = $num * 3 + 1;
        }
    }
    if($num != 1) {
        echo $num . ":not 1"; 
    }
}
echo $count - 1 . ":end";
?>