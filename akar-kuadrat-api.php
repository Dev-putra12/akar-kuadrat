<?php
// Menerima input nilai dari POST request
$input = json_decode(file_get_contents('php://input'));
$nilai = $input->nilai;

// Menghitung akar kuadrat
$akar = sqrt($nilai);

// Membuat response JSON
$response = [
    'status' => 'success',
    'result' => $akar
];

// Mengirimkan response
header('Content-Type: application/json');
echo json_encode($response);
