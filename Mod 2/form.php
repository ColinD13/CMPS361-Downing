<?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $name = $_POST["name"];
        $age = $_POST["age"];

        echo "Hello, " . $name . "! You are " . $age . " years old.<br>";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        Name and Age Form
    </head>

    <body>
        <form action = "form.php" method = "post">
            <label for="name">Name: </label>
            <input type="text" id ="name" name ="name"><br>
            <label for ="age">Age: </label>
            <input type="number" id ="age" name ="age"><br>
            <input type ="submit" value= "Submit">
        </form>
    </body>
</html>