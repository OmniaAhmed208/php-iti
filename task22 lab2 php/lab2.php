<?php

// header('Content-type: text/plain'); // to make \n work on browser
// echo "Line 1 \n Line 2";

// ORRRRR

echo "<pre>";
echo "Line 1 \nLine 2";
echo "</pre>";

// ______________________________________________________________

echo "<br><br>________ Sum an Avg fron Array ________<br><br>";

$indexed = array(12, 45, 10, 25);

$sum = 0;
$arrLength = count($indexed);

foreach($indexed as $value){

    $sum += $value; 
}
echo "Sum = $sum <br>";
echo "Average = ".$sum / $arrLength." <br>";

// in Original order
echo "<br> array in original order = ";
$rev = ($indexed);
print_r($rev);

// in reverse order
echo "<br> array in reverse order = ";
$rev = array_reverse($indexed);
print_r($rev);

// ______________________________________________________________

echo "<br><br>________ Associative Array ________<br><br>";

// sort() - sort arrays in ascending order
// rsort() - sort arrays in descending order
// asort() - sort associative arrays in ascending order, according to the value
// ksort() - sort associative arrays in ascending order, according to the key
// arsort() - sort associative arrays in descending order, according to the value
// krsort() - sort associative arrays in descending order, according to the key

$assArr = array("Sara"=>31, "John"=>41, "Walaa"=>39, "Ramy"=>40);

echo "<br> Original Array = ( ";
foreach($assArr as $key => $value){
    echo "$key => $value , ";
}
echo ")";
// ###########
echo "<br><br> ascending order by value = (";
asort($assArr);

foreach($assArr as $key => $value){
  echo "$key => $value , ";
}
echo ")";
// ###########
echo "<br><br> ascending order by key = (";
ksort($assArr);

foreach($assArr as $key => $value){
  echo "$key => $value , ";
}
echo ")";
// ###########
echo "<br><br> descending order by value = (";
arsort($assArr);

foreach($assArr as $key => $value){
  echo "$key => $value , ";
}
echo ")";
// ###########
echo "<br><br> descending order by key = (";
krsort($assArr);

foreach($assArr as $key => $value){
  echo "$key => $value , ";
}
echo ")";

// ______________________________________________________________

echo "<br><br>________ Html Table ________<br><br>";

$students = [
    ['name' => 'Alaa', 'email' => 'alaa@test.com', 'status' => 'PHP'],
    ['name' => 'Shamy', 'email' => 'shamy@test.com', 'status' => '.Net'],
    ['name' => 'Youssef', 'email' => 'youssef@test.com', 'status' => 'Testing'],
    ['name' => 'Waleid', 'email' => 'waleid@test.com', 'status' => 'PHP'],
    ['name' => 'Rahma', 'email' => 'rahma@test.com', 'status' => 'Front End'],
];

?>

<table cellspacing = "8">  
<tr>  
<td>Name</td>  
<td>Email</td>  
<td>Status</td>  
</tr>  

<?php

foreach($students as $value){ 
    
        ?> 

        <tr style="<?php echo $value['status'] == 'PHP' ? 'color:red' : '' ?>">
            <td><?php echo $value['name'];?></td>
            <td><?php echo $value['email'];?></td>
            <td><?php echo $value['status'];?></td>
        </tr>

        <?php
}

?>    

</table>

<?php

?>