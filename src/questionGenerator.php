<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json; charset=UTF-8");

require "classes/Question.php";

function generateQuestions() {
    $q1 = new Question("Quel est le nom du quiz?", ["QuestionsPourUnChampignon", "The Impossible Quiz", "Projet QCM"], 0);
    $q2 = new Question("Où se situe la Tour Eiffel?", ["Washington", "Paris", "Sydney"], 1);
    $q3 = new Question("Le Tigre est-il un animal en voie de disparition?", ["Oui", "Non"], 0);
    $q4 = new Question("Quel est la plus haute montagne?", ["Mont Blanc", "Everest", "Mont Fuji"], 1);
    $q5 = new Question("1+1 = ?", ["2", "3", "11", "67357"], 0);
    $q6 = new Question("De combien de couleurs est constitué l'arc-en-ciel?", ["3", "2", "6"], 2);
    $q7 = new Question("Quel est le rôle d'un tournevis?", ["Serrer et desserrer des vis", "Planter des clous"], 0);
    $q8 = new Question("Trouver le nombre suivant dans la suite de nombres : 1, 2, 3, ?", ["5", "4"], 1);
    $q9 = new Question("Cette question permet-elle de gagner une vie?", ["Oui", "Non"], 1);
    $q10 = new Question("Quel est la ville la plus peuplée parmis les réponses suivantes?", ["Paris", "Tokyo", "Berlin"], 1);
    $q11 = new Question("Cette phrase ne contient pas sept mots.", ["Si!", "Non"], 0);
    $q12 = new Question("Une pizza est-elle un sandwich?", ["Oui", "Non"], 1);
    $q13 = new Question("Quel animal miaule?", ["Oiseau", "Chien", "Chat"], 2);
    $q14 = new Question("Quel couleur est le soleil vu de la Terre?", ["Jaune", "Bleu", "Rouge"], 0);
    $q15 = new Question("Quel organe du corps humain sert pour respirer?", ["Estomac", "Coeur", "Poumons"], 2);
    $q16 = new Question("Sur quel continent se trouve la France?", ["Océanie", "Asie", "Europe"], 2);
    $q17 = new Question("Combien de jours dans une semaine?", ["7", "6"], 0);
    $q18 = new Question("Où se trouve le cerveau?", ["Dans l'abdomen", "Dans la tête"], 1);
    $q19 = new Question("Combien d'heures dans une journée?", ["27", "22", "24"], 2);
    $q20 = new Question("Quel est la 20ème lettre de l'alphabet?", ["C", "O", "T"], 2);
    

    $questions = array(
        0 => $q1->toArray(),
        1 => $q2->toArray(),
        2 => $q3->toArray(),
        3 => $q4->toArray(),
        4 => $q5->toArray(),
        5 => $q6->toArray(),
        6 => $q7->toArray(),
        7 => $q8->toArray(),
        8 => $q9->toArray(),
        9 => $q10->toArray(),
        10 => $q11->toArray(),
        11 => $q12->toArray(),
        12 => $q14->toArray(),
        13 => $q13->toArray(),
        14 => $q15->toArray(),
        15 => $q16->toArray(),
        16 => $q17->toArray(),
        17 => $q18->toArray(),
        18 => $q19->toArray(),
        19 => $q20->toArray(),
    );

    shuffle($questions);

    return $questions;

}