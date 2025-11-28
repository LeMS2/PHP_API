<?php

$accessToken = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VySWQiOjI2ODQsInN0b3JlSWQiOjE5NzksImlhdCI6MTc2NDI3MzI2NCwiZXhwIjoxNzY2ODc5OTk5fQ.ZPlK_PpWFdHoRiSGc_4cWzWjTemxQZjVLFZ7t-k8TdQ";
$url = "https://api11.ecompleto.com.br/exams/processTransaction?accessToken={$accessToken}";

$payload = array(
    "external_order_id"      => 98302,
    "amount"                 => 250.74,
    "card_number"            => "5236387041984697",
    "card_cvv"               => "319",
    "card_expiration_date"   => "0822",
    "card_holder_name"       => "Elisa Adriana Barbosa",
    "customer" => array(
        "external_id" => "8796",
        "name"        => "Emanuelly Alice Alessandra de Paula",
        "type"        => "individual",
        "email"       => "emanuellyalice@ecompleto.com.br",
        "documents" => array(
            array(
                "type"   => "cpf",
                "number" => "96446953722"
            )
        ),
        "birthday" => "1988-01-18"
    )
);

$ch = curl_init($url);

curl_setopt_array($ch, array(
    CURLOPT_POST            => true,
    CURLOPT_RETURNTRANSFER  => true,
    CURLOPT_POSTFIELDS      => json_encode($payload),
    CURLOPT_HTTPHEADER      => array("Content-Type: application/json"),
    CURLOPT_SSL_VERIFYPEER  => false,
    CURLOPT_SSL_VERIFYHOST  => false 
));

$response = curl_exec($ch);
$http = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$error = curl_error($ch);
curl_close($ch);

echo "HTTP: $http\n";
echo "Erro CURL: $error\n\n";
echo "Resposta API:\n$response\n";
echo "\nPayload Enviado:\n" . json_encode($payload, JSON_PRETTY_PRINT);
