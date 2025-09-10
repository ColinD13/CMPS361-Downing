<?php 
    //checks if the server method was a post from the submit button
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $num = $_POST["number"];

        //using modulus to check the remainder to determine if the nmber is even or odd
        if($num%2 ==0){
            echo "Even number";
        }
        else{
            echo "Odd number";
        }
    }
?>

<!DOCTYPE html>
<head>
    Bonus Quiz
</head>
<body>
    <br>
    <!--form using ids and names for the labels and inputs-->
    <form action = "quiz.php" method ="post">
        <label for = "number">Number: </label>
        <input type = "number" name = "number" id = "number"><br>
        <input type = "submit"vlaue = "Submit">
    </form>
</body>
</html>