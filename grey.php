<body style='-webkit-filter: grayscale(100%);
    -moz-filter: grayscale(100%);
    filter: grayscale(100%);
    size: landscape;'>

<style type="text/css">.navbar{
    display:none;
}</style>


<?php
$colors = array('#FF0000','#FFA500','#FFFF00','#008000','#0000FF','#800080','#808080','#A52A2A','#000000','#008080');
$colorsLit = array('red','orange','yellow','green','blue','purple','grey','brown','black','teal');
if(isset($_GET['n'])) {
    $n = $_GET['n'];
}
if(isset($_GET['x'])) {
    $x = $_GET['x'];
}

if( isset($_GET['n']) && isset($_GET['x'])){
if($n >=1 && $n <= 26 && $x >= 1 && $x <= 10){
    echo "<table border='1' style='width: 90%;'><br />";
    for ($row2 = 0; $row2 < $x; $row2++) {
        echo "<tr>";
        for ($col2 = 0; $col2 < 2; $col2 ++) {
            if($col2 == 0){
                echo "<td style='column-width:20%;'>",
                $_COOKIE["colors{$row2}"],
                "</td>";
            }
            else{
                echo "<td style='column-width:80%;' id=$row2>",
                $_COOKIE["cells{$row2}"];
                "</td>";
            }
       }
       echo "</tr>";
}
echo "</table>";

}



if($n >=1 && $n <= 26 && $x >= 1 && $x <= 10){
echo "<table border='1'><br />";

for ($row = 0; $row < $n+1; $row ++) {
   echo "<tr>";

   for ($col = 0; $col < $n+1; $col ++) {
        echo "<td style='column-width:20px';>";
        if($col == 0 && $row == 0){
            echo "00", "</td>";
        }
        elseif($col == 0){
            echo $row,"</td>";
        }
        elseif($row == 0){
            echo chr($col + 64),"</td>";
        }
   }

   echo "</tr>";
}
echo "</table>";
}
}
?>
</body>
