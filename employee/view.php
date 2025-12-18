<?php
$db = (new Database())->connect();
$search = $_GET['search'] ?? '';
$stmt = $db->prepare("SELECT * FROM employees WHERE last_name LIKE :search OR employee_id = :id");
$stmt->execute(['search' => "%$search%", 'id' => $search]);
$employees = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
