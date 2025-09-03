<?php
require __DIR__ . '/vendor/autoload.php';

    use Dotenv\Dotenv;

    $dotenv = Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    $apiKey = $_ENV['APIKEY'] ?? null; // Should make an .env then write like this APIKEY=yourAPIKEY in sendgrid
    
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jsonInput = json_decode(file_get_contents("php://input"), true);

    $to = $jsonInput["to"] ?? ($_POST["to"] ?? null);
    $subject = $jsonInput["subject"] ?? ($_POST["subject"] ?? null);    
    $message = $jsonInput["message"] ?? ($_POST["message"] ?? null);

    if (!$to || !$subject || !$message) {
        http_response_code(400);
        echo "Missing required fields. Please provide 'to', 'subject', and 'message'.";
        exit;
    }

    $apiKey = $_ENV["APIKEY"];

    $emailData = [
        "personalizations" => [
            [
                "to" => [
                    ["email" => $to]
                ],
                "subject" => $subject
            ]
        ],
        "from" => [
            "email" => "ehliforeducation@gmail.com", // put your verify gmail here in sendgrid
            "name"  => "SEND-EMAIL-API-GROUP" // name of your email if the receiver received your email
        ],
        "content" => [
            [
                "type"  => "text/plain",
                "value" => $message
            ]
        ]
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
        echo "✅ Email sent successfully!";
    } else {
        echo "❌ Failed to send email.<br>";
        echo "Response Code: $httpCode <br>";
        echo "Response: " . htmlspecialchars($response);
    }
} else {
    echo "⚠ Please use POST method.";
}
