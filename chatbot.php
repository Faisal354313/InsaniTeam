<?php
session_start();
$apiKey = "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"; // ganti dengan API key kamu

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $prompt = $_POST['message'] ?? '';

    $data = [
        "model" => "gpt-3.5-turbo",
        "messages" => [
            ["role" => "user", "content" => $prompt]
        ]
    ];

    $ch = curl_init('https://api.openai.com/v1/chat/completions');
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => [
            'Content-Type: application/json',
            'Authorization: ' . 'Bearer ' . $apiKey
        ],
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => json_encode($data),
    ]);

    $response = curl_exec($ch);
    $result = json_decode($response, true);
    $botReply = $result['choices'][0]['message']['content'] ?? 'Maaf, tidak bisa menjawab.';

    // Simpan riwayat ke session
    $_SESSION['chat_history'][] = [
        'user' => $prompt,
        'bot' => $botReply
    ];

    echo json_encode(['response' => $botReply]);
}
