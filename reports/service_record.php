$db = (new Database())->connect();
$stmt = $db->query("SELECT first_name, last_name, department, date_hired FROM employees ORDER BY date_hired");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
