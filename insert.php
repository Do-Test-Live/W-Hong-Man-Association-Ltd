<?php
require_once('include/dbController.php');
$db_handle = new DBController();
date_default_timezone_set("Asia/Hong_Kong");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $currentDatetime = date('Y-m-d H:i:s');

    $checkedCheckboxes = $_POST['checkedCheckboxes'];

    $agreement1 = 0;
    $agreement2 = 0;
    $agreement3 = 0;
    $agreement4 = 0;
    $agreement5 = 0;
    $agreement6 = 0;

    foreach ($checkedCheckboxes as $value) {
        ${"agreement" . $value} = 1;
    }

    $query = "INSERT INTO `agreement`(`name`, `datetime`, `agreement1`, `agreement2`, `agreement3`, `agreement4`, `agreement5`, `agreement6`, `inserted_at`) 
              VALUES ('$name', '$currentDatetime', '$agreement1', '$agreement2', '$agreement3', '$agreement4', '$agreement5', '$agreement6', '$currentDatetime')";

    $data = $db_handle->insertQuery($query);
    echo "Success";
}