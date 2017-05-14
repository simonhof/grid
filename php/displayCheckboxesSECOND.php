<?php
/**
 * Created by PhpStorm.
 * User: simon.hofmann
 * Date: 31/03/2017
 * Time: 21:12
 */

session_start();
$_SESSION['sites'] = array("bigTable_5_10.php", "bigTable_10_15.php", "bigTable_15_20.php");


function displayFirstRow($persons){
    echo "<tr>";
    echo "<td class=\"firsttd\">Beschreibung</td>";
    echo "<td class=\"firsttd\">Gegenteil</td>";

    $counter = 0;
    foreach ($persons as $item) {
        if ($counter>=8 && $counter<=12){
            allTypesInFirstRow($item);
        }
        if ($counter>=13){
            echo "</tr>";
            $_SESSION['counter'] = $counter;
            return $persons;
        }
        $counter++;
    }
}

function allTypesInFirstRow($type){
    echo "<td class=\"persons\">".$type."</td>";
}

function displayTableForInput($attributes){
    for ($i=0; $i<=11; $i++){
        echo "<tr>";
        $attributes = displayAttributeItem($attributes);
        displayInputs($i);
        echo "</tr>";
    }
}

function displayAttributeItem($attributes){
    echo "<td>".array_shift($attributes)."</td>";
    echo "<td>".array_shift($attributes)."</td>";
    return $attributes;
}

function displayInputs($row){
    for ($i=0; $i<=4; $i++){
        echo "<td class='checkboxBig'>";
        echo "<input type=\"checkbox\" name=\"".$row.$i."\">";
        echo "</td>";
    }
}

$tempAttributes = $_SESSION['attributes'];
$tempPersons = $_SESSION['persons'];

echo "<form action=\"../view/bigTable_10_15.php\"><table border='1'>";
$tempPersons = displayFirstRow($tempPersons);
displayTableForInput($tempAttributes);
echo "</table><input type='submit' value='submit' class='button'>";
echo "</form>";
