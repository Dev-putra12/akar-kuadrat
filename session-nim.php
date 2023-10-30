<?php
session_start();

$response = array(
  'nim' => isset($_SESSION['nim']) ? $_SESSION['nim'] : null
);

header('Content-Type: application/json');
echo json_encode($response);
