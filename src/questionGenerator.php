<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json; charset=UTF-8");

require "classes/Question.php";

$q1 = new Question("Est-ce que cette question existe?", ["A", "B", "C", "D"], 1);
$q2 = new Question("Est-ce que cette question existe aussi?", ["A", "B", "C", "D"], 1);

$questions = array(
    0 => $q1->toArray(),
    1 => $q2->toArray()
);

echo json_encode($questions);