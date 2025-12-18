<?php
require_once "../config/database.php";

$db = (new Database())->connect();

// Get employee_id from URL
$employee_id = $_GET['id'];

// Fetch employee record
$stmt = $db->prepare("SELECT * FROM employees WHERE employee_id = :id");
$stmt->execute(['id' => $employee_id]);
$employee = $stmt->fetch(PDO::FETCH_ASSOC);
?>
