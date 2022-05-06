<head>
    <script> 
        setCookie("TylersCookie", "ChocolateChip", 1);
    </script>
</head>
<?php
 echo Form::open(array(
    "action" => "/index/m1/color.php",
    "method" => "get",
    "id" => "fuel_form"
));
echo Form::label('Colors', 'color');
echo "&nbsp";
echo Form::input('x', '', array('style' => 'border: 2px solid brown; boarder-radius: 4px;'));
echo "<br>";
echo Form::label('Rows and Columns', 'color');
echo "&nbsp";
echo Form::input('n', '', array('style' => 'border: 2px solid brown; boarder-radius: 4px;'));
echo "<br>";
echo Form::submit();
echo Form::close();
?>

<?php
$n = 0; // coordinate dimension
$x = 0; // num colors


if(isset($_GET['n'])) {
    $n = $_GET['n'];
    echo "<script>",
    "setNumRows(", $n, ")",
    "</script>";
}
if(isset($_GET['x'])) {
    $x = $_GET['x'];
    echo "<script>",
    "setNumColors(", $x, ");",
    "initSelectedCells();",
    "</script>";
}
$data = [$n, $x];

echo "<div id='selectColorError'></div>";
if( isset($_GET['n']) && isset($_GET['x'])){
if($n >=1 && $n <= 26 && $x >= 1 && $x <= 10){
    echo "<table border='1' style='width: 90%;'><br />";
    for ($row2 = 0; $row2 < $x; $row2++) {
        echo "<tr>";
        for ($col2 = 0; $col2 < 2; $col2 ++) {
            if($col2 == 0){
                echo "<td style='column-width:20%;'>",$row2+1,"</td>";
            }
            else{
                echo "<td id=\"color", $row2, "\" class='";
                switch ($row2) {
                    case 0:
                        echo "red";
                        break;
                    case 1:
                        echo "orange";
                        break;
                    case 2:
                        echo "yellow";
                        break;
                    case 3:
                        echo "green";
                        break;
                    case 4:
                        echo "blue";
                        break;
                    case 5:
                        echo "purple";
                        break;
                    case 6:
                        echo "grey";
                        break;
                    case 7:
                        echo "brown";
                        break;
                    case 8:
                        echo "black";
                        break;
                    case 9:
                        echo "teal";
                        break;
                }
                echo "'>",
                "<select id='colorOpt", $row2, "' onchange='setColorOpt(value, {$row2})'>";
                echo "<option value='red' "; if ($row2 == 0) echo "selected"; echo ">red</option>";
                echo "<option value='orange' "; if ($row2 == 1) echo "selected"; echo ">orange</option>";
                echo "<option value='yellow' "; if ($row2 == 2) echo "selected"; echo ">yellow</option>";
                echo "<option value='green' "; if ($row2 == 3) echo "selected"; echo ">green</option>";
                echo "<option value='blue' "; if ($row2 == 4) echo "selected"; echo ">blue</option>";
                echo "<option value='purple' "; if ($row2 == 5) echo "selected"; echo ">purple</option>";
                echo "<option value='grey' "; if ($row2 == 6) echo "selected"; echo ">grey</option>";
                echo "<option value='brown' "; if ($row2 == 7) echo "selected"; echo ">brown</option>";
                echo "<option value='black' "; if ($row2 == 8) echo "selected"; echo ">black</option>";
                echo "<option value='teal' "; if ($row2 == 9) echo "selected"; echo ">teal</option>";
                echo "</select>",
                "<input type=\"radio\" name=\"select_color\" value=\"color", $row2, "\" onclick=setColorIndex(", $row2,")";
                if($row2 == 0) echo " checked=\"checked\""; // first row is initially selected
                echo ">",
                "| ",
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
        echo "<td style='column-width:20px'";
        if($col == 0 && $row == 0){
            echo ">00", "</td>";
        }
        elseif($col == 0){
            echo ">", $row,"</td>";
        }
        elseif($row == 0){
            echo ">", chr($col + 64),"</td>";
        }
        else {
            echo "id=\"", chr($col + 64), $row, "\" onclick=\"cellClicked(this);\">";
        }
   }

   echo "</tr>";
}
echo "</table>";
}
}
?>

<a href="grey.php?n=<?php echo $n ?>&x=<?php echo $x ?>"target="_blank"><button type="button" onclick="setAllCookies()">printView</button></a>



