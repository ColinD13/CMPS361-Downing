<?php
    //grade variable for testing
    $grade = 81;

    //if structure to test the grade, added edge case testing for under 0 and over 100
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