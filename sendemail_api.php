<?php
require __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$apiKey = $_ENV['APIKEY'] ?? null;

header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jsonInput = json_decode(file_get_contents("php://input"), true);

    $to = $jsonInput["to"] ?? ($_POST["to"] ?? null);
    $subject = $jsonInput["subject"] ?? ($_POST["subject"] ?? null);    
    $message = $jsonInput["message"] ?? ($_POST["message"] ?? null);

    if (!$to || !$subject || !$message) {
        http_response_code(400);
        echo json_encode([
            "success" => false,
            "error"   => "Missing required fields. Provide 'to', 'subject', and 'message'."
        ]);
        exit;
    }

    $emailData = [
        "personalizations" => [[
            "to" => [["email" => $to]],
            "subject" => $subject
        ]],
        "from" => [
            "email" => "ehliforeducation@gmail.com", // Input your Verify Account in SendGrid       
            "name"  => "SEND-EMAIL-API-GROUP" // Input your name in Sending Email
        ],
        "content" => [[
            "type"  => "text/plain",
            "value" => $message
        ]]
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.sendgrid.com/v3/mail/send");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($emailData));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Authorization: Bearer " . $apiKey,
        "Content-Type: application/json"
    ]);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode == 202) {
        echo json_encode([
            "success" => true,
            "message" => "Email sent successfully!"
        ]);
    } else {
        echo json_encode([
            "success" => false,
            "error"   => "Failed to send email.",
            "code"    => $httpCode,
            "response"=> $response
        ]);
    }
} else {
    http_response_code(405);
    echo json_encode([
        "success" => false,
        "error"   => "Please use POST method." 
    ]);
}
