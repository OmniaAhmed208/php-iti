<?php

define("WEBSITE", "Day 1"); //Use constant => website name which mustn’t change across your pages
echo "<span style='font-weight:bold'> Website Name: </span>".WEBSITE.'<br><br>';

// echo "<pre>";
// print_r($_SERVER);
// echo "<pre>";

echo "<span style='font-weight:bold'> Server Name: </span>".$_SERVER [ 'SERVER_NAME' ].'<br><br>'; //server name

echo "<span style='font-weight:bold'> Address: </span>".$_SERVER['SERVER_ADDR'].'<br><br>'; // address

echo "<span style='font-weight:bold'> Port: </span>".$_SERVER['SERVER_PORT'].'<br><br>'; // port

echo "<span style='font-weight:bold'> File Name: </span>".$_SERVER['SCRIPT_NAME'].'<br><br>'; //filename

echo "<span style='font-weight:bold'> Path: </span>".__FILE__.'<br><br>'; //path.

//Switch Case
echo "<br><br>________ Switch Case________<br><br>";

$age = 10;

switch ($age){
    case  $age < 5 :
        echo "Stay at Home"."<br>";
        break;
    case $age == 5 : 
        echo "Go to Kindergarden"."<br>";   
        break;
    case $age >= 6 || $age <= 12 :
        echo "Go to grade : ".($age - 6)."<br>"; 
        break;
    default:
        echo "No Result"."<br>";    
        break;
}
  
// Trace for,while,do while fn code from demo file   

echo "<br><br>________ Trace for,while,do while fn code from demo file________<br><br>";

//for loop
$a = 0;
$b = 0;

for( $i = 0; $i<5; $i++ ) {
   $a += 10;
   $b += 5;
}

echo "for loop ==> a = $a, b = $b <br><br>";
//At the end of the loop a = 50 and b = 25

//******************************/

//while loop
$i = 0;
$num = 50;

while( $i < 10) {
   $num--;
   $i++;
}

echo "while loop ==> i = $i, num = $num <br><br>";
//Loop stopped at i = 10 and num = 40

//******************************/

//do...while
$i2 = 0;
$num = 0;
         
do {
    $i2++;
}
while( $i2 < 10 );

echo "do...while ==> i = $i2 <br><br>";
//Loop stopped at i = 10

//******************************/

//break
$i3 = 0;
         
while( $i3 < 10) {
    $i3++;
    if( $i3 == 3 )break;
}

echo "break ==> i = $i3 <br><br>";
//Loop stopped at i = 3

?>