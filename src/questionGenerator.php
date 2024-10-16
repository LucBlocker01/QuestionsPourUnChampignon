<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json; charset=UTF-8");

require "classes/Question.php";

$question = new Question("test", ["A", "B", "C", "D"], 1);

$question = array("question" => $question->toArray());

echo json_encode($question);