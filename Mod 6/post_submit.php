<?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $data =[
            "category" => $_POST["category"],
            "joke" => $_POST["joke"],
            "punchline" => $_POST["punchline"]
        ];

        $url = "http://localhost:8080/joke";

        $options =[
            "http" => [
                "header" => "Content-Type: aplication/json\r\n",
                "method" => "POST",
                "content" => json_encode($data),
            ],
        ];

        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        header("Location: api_connection_sort.php");
        exit;
    }
?>