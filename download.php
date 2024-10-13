<?php

require_once 'vendor/autoload.php';
require_once 'Models/Users/Employees/Employee.php';
require_once 'Helpers/RandomGenerator.php';

// POSTリクエストからパラメータを取得
$count = $_POST['count'] ?? 5;
$salary_min = $_POST['salary_min'] ?? 30000;
$salary_max = $_POST['salary_max'] ?? 80000;
$locations = $_POST['locations'] ?? 3;
$zipcode_min = $_POST['zipcode_min'] ?? 10000;
$zipcode_max = $_POST['zipcode_max'] ?? 99999;
$format = $_POST['format'] ?? 'html';

// パラメータが正しい形式であることを確認
$count = (int)$count;
$salary_min = (float)$salary_min;
$salary_max = (float)$salary_max;
$locations = (int)$locations;
$zipcode_min = (int)$zipcode_min;
$zipcode_max = (int)$zipcode_max;

// 従業員を生成
$employees = Helpers\RandomGenerator::generateEmployees($count, $salary_min, $salary_max, $locations, $zipcode_min, $zipcode_max);

if ($format === 'markdown') {
    header('Content-Type: text/markdown');
    header('Content-Disposition: attachment; filename="employees.md"');
    foreach ($employees as $employee) {
        echo $employee->toMarkdown();
    }
} elseif ($format === 'json') {
    header('Content-Type: application/json');
    header('Content-Disposition: attachment; filename="employees.json"');
    $employeesArray = array_map(fn($employee) => $employee->toArray(), $employees);
    echo json_encode($employeesArray);
} elseif ($format === 'txt') {
    header('Content-Type: text/plain');
    header('Content-Disposition: attachment; filename="employees.txt"');
    foreach ($employees as $employee) {
        echo $employee->toString();
    }
} else {
    // HTMLをデフォルトに
    header('Content-Type: text/html');
    echo "<table><thead><tr><th>ID</th><th>Job Title</th><th>Name</th><th>Salary</th><th>Start Date</th><th>Awards</th></tr></thead><tbody>";
    foreach ($employees as $employee) {
        echo $employee->toHTML();
    }
    echo "</tbody></table>";
}

// 検証
if (is_null($count) || is_null($format)) {
    exit('Missing parameters.');
}

if (!is_numeric($count) || $count < 1 || $count > 100) {
    exit('Invalid count. Must be a number between 1 and 100.');
}

$allowedFormats = ['json', 'txt', 'html', 'markdown'];
if (!in_array($format, $allowedFormats)) {
    exit('Invalid type. Must be one of: ' . implode(', ', $allowedFormats));
}

?>
