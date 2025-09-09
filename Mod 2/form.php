<?php
    //iff statement to check if the method from the server was a post
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        //variables 
        $name = $_POST["name"];
        $age = $_POST["age"];

        //printing the message
        echo "Hello, " . $name . "! You are " . $age . " years old.<br>";
    }
?>

<!DOCTYPE html>
<html>
    <!-- html head -->
    <head>
        Name and Age Form
    </head>

    <!-- Form inside of the body, using ids and names for the labels and input fields -->
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