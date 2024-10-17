<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json; charset=UTF-8");

require "classes/Question.php";

$question = new Question("Est-ce que cette question existe?", ["A", "B", "C", "D"], 1);

$questions = array(
    "q1" => $question->toArray(),
    "q2" => $question->toArray()
);

echo json_encode($questions);