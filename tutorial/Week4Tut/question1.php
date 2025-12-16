<?php
$name="Kritika";
echo "$name<br>";
$date = date("H");
echo date("l jS \of F Y h:i:s A");

if($date<11){
    echo "<br>Morning";
}elseif(($date>11)and($date<16)){
    echo "<br>Afternoon";
}else{
    echo "<br>Evening madameeee";
}


?>