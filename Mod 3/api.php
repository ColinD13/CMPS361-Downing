<?php
    $url = "http://localhost:8080/joke?type=dad";

    $urlWithParams = $url;

    $session = curl_init();
    curl_setopt($session, CURLOPT_URL, $urlWithParams);
    curl_setopt($session, CURLOPT_RETURNTRANSFER,true);

    $response = curl_exec($session);

    if($response === false){
        echo "Error - " . curl_error($session);
    }
    else{
        header("Content-Type: application/json");
        echo $response;
    }

    curl_close($session);
?>