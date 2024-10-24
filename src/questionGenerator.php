<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json; charset=UTF-8");

require "classes/Question.php";

function generateQuestions($difficulty) {
    switch ($difficulty) {
        case "very easy" :
            $dataQ = [
                ["Quel est le nom du quiz?", ["QuestionsPourUnChampignon", "The Impossible Quiz", "Projet QCM"], 0],
                ["Où se situe la Tour Eiffel?", ["Washington", "Paris", "Sydney"], 1],
                ["Le Tigre est-il un animal en voie de disparition?", ["Oui", "Non"], 0],
                ["Quel est la plus haute montagne?", ["Mont Blanc", "Everest", "Mont Fuji"], 1],
                ["1+1 = ?", ["2", "3", "67357"], 0],
                ["De combien de couleurs est constitué l'arc-en-ciel?", ["3", "2", "6"], 2],
                ["Quel est le rôle d'un tournevis?", ["Serrer et desserrer des vis", "Planter des clous"], 0],
                ["Trouver le nombre suivant dans la suite de nombres : 1, 2, 3, ?", ["5", "4"], 1],
                ["Cette question permet-elle de gagner une vie?", ["Oui", "Non"], 1],
                ["Quel est la ville la plus peuplée parmi les réponses suivantes?", ["Paris", "Tokyo", "Berlin"], 1],
                ["Cette phrase ne contient pas sept mots.", ["Si!", "Non"], 0],
                ["Une pizza est-elle un sandwich?", ["Oui", "Non"], 1],
                ["Quel animal miaule?", ["Oiseau", "Chien", "Chat"], 2],
                ["Quel couleur est le soleil vu de la Terre?", ["Jaune", "Bleu", "Rouge"], 0],
                ["Quel organe du corps humain sert pour respirer?", ["Estomac", "Coeur", "Poumons"], 2],
                ["Sur quel continent se trouve la France?", ["Océanie", "Asie", "Europe"], 2],
                ["Combien de jours dans une semaine?", ["7", "6"], 0],
                ["Où se trouve le cerveau?", ["Dans l'abdomen", "Dans la tête"], 1],
                ["Combien d'heures dans une journée?", ["27", "22", "24"], 2],
                ["Quel est la 20ème lettre de l'alphabet?", ["C", "O", "T"], 2]
            ];
    }

    $questions = [];

    foreach ($dataQ as $index => $q) {
        $question = new Question($q[0], $q[1], $q[2]);
        $questions[$index] = $question->toArray();
    }
    shuffle($questions);

    return $questions;

}