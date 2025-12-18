<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Role mapping
$roles = [
    1 => 'Employee',
    2 => 'HR Staff',
    3 => 'HR Head'
];

$role_name = $roles[$_SESSION['role_id']];

?>

<!DOCTYPE html>
<html>
<head>
    <title>HRMIS Dashboard</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h2 { color: #333; }
        ul { list-style: none; padding: 0; }
        li { margin: 10px 0; }
        a { text-decoration: none; color: #007bff; }
        a:hover { text-decoration: underline; }
        .logout { margin-top: 20px; }
    </style>
</head>
<body>

<h2>Welcome, <?= $_SESSION['full_name']; ?>!</h2>
<p>Role: <strong><?= $role_name; ?></strong></p>

<h3>Menu</h3>
<ul>
    <?php if ($_SESSION['role_id'] == 1): // Employee ?>
        <li><a href="view_employee.php?id=<?= $_SESSION['employee_id']; ?>">View My Record</a></li>
        <li><a href="edit_employee.php?id=<?= $_SESSION['employee_id']; ?>">Edit My Record</a></li>

    <?php elseif ($_SESSION['role_id'] == 2): // HR Staff ?>
        <li><a href="add_employee.php">Add Employee</a></li>
        <li><a href="view_employees.php">View Employees</a></li>
        <li><a href="edit_employee.php">Edit Employee</a></li>
        <li><a href="delete_employee.php">Delete Employee</a></li>
        <li><a href="reports.php">Generate Reports</a></li>

    <?php elseif ($_SESSION['role_id'] == 3): // HR Head ?>
        <li><a href="add_employee.php">Add Employee</a></li>
        <li><a href="view_employees.php">View Employees</a></li>
        <li><a href="edit_employee.php">Edit Employee</a></li>
        <li><a href="delete_employee.php">Delete Employee</a></li>
        <li><a href="reports.php">Generate Reports</a></li>
        <li><a href="manage_users.php">Manage Users</a></li>
    <?php endif; ?>
</ul>

<div class="logout">
    <a href="logout.php">Logout</a>
</div>

</body>
</html>
