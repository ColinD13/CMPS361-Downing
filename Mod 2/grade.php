<?php
    $grade = 81;

    if($grade >= 90 && $grade <= 100){
        echo "A";
    }
    else if($grade >= 80 && $grade < 90){
        echo "B";
    }
    else if($grade >= 70 && $grade < 80){
        echo "C";
    }
    else if($grade >= 0 && $grade < 70){
        echo "Fail";
    }
    else{
        echo "Invalid Grade";
    }
?>