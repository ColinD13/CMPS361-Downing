<?php 
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $num = $_POST["number"];

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
    <form action = "quiz.php" method ="post">
        <label for = "number">Number: </label>
        <input type = "number" name = "number" id = "number"><br>
        <input type = "submit"vlaue = "Submit">
    </form>
</body>
</html>