$db = (new Database())->connect();
$stmt = $db->query("SELECT department, COUNT(*) AS total FROM employees GROUP BY department");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
