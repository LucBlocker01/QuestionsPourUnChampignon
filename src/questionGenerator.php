<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json; charset=UTF-8");

require "classes/Question.php";

function generateQuestions() {
    $q1 = new Question("Comment s'appelle ce projet", ["QuestionsPourUnChampignon", "The Impossible Quiz", "Projet", "Test pour débiles"], 0);
    $q2 = new Question("Où se situe la Tour Eiffel?", ["Washington", "Luxembourg", "Paris", "Sydney"], 2);
    $q3 = new Question("Le Tigre est-il un animal en voie de disparition?", ["Oui", "Non"], 0);
    $q4 = new Question("Quel est la plus haute montagne?", ["Mont Blanc", "Everest", "Mont Fuji", "K2"], 1);
    $q5 = new Question("Quel est le nombre du démon?", ["7", "666", "13", "859"], 1);

    $questions = array(
        0 => $q1->toArray(),
        1 => $q2->toArray(),
        2 => $q3->toArray(),
        3 => $q4->toArray(),
        4 => $q5->toArray(),
    );

    shuffle($questions);

    return $questions;

}