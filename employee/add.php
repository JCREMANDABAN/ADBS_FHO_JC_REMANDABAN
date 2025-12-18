<?php
require_once "../config/database.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = (new Database())->connect();
    $db->beginTransaction();

    try {
        $sql = "INSERT INTO employees
        (last_name, first_name, middle_name, extension_name, birth_date, birth_place,
        sex, civil_status, citizenship, height, weight, blood_type,
        gsis_no, pagibig_no, philhealth_no, sss_no, tin_no, department, date_hired)
        VALUES
        (:last_name, :first_name, :middle_name, :extension_name, :birth_date, :birth_place,
        :sex, :civil_status, :citizenship, :height, :weight, :blood_type,
        :gsis_no, :pagibig_no, :philhealth_no, :sss_no, :tin_no, :department, :date_hired)";

        $stmt = $db->prepare($sql);
        $stmt->execute($_POST);

        $db->commit();
        echo "Employee record added successfully.";
    } catch (Exception $e) {
        $db->rollBack();
        echo "Error adding employee.";
    }
}
?>
