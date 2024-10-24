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
            case "easy" :
                $dataQ = [
                    ["6x7 = ?", ["47", "43", "41", "42"], 3],
                    ["Où se situe l'Empire State Building?", ["New York", "Seattle", "Los Angeles", "Washington"], 0],
                    ["En quel année a commencé la 1ère Guerre Mondiale?", ["1918", "1915", "1914", "1912"], 2],
                    ["Quel est l'intrus?", ["Courgette", "Citrouille", "Maïs", "Tomate"], 3],
                    ["Quel planète est la plus proche du Soleil?", ["Vénus", "Jupiter", "Mercure", "La Terre"], 2],
                    ["Un omnivore mange :", ["Des hommes", "Des Plantes et de la viande", "De la viande", "Des OVNIS"], 1],
                    ["En quel année a eu lieu la Révolution Française?", ["1784", "1789", "1788", "1798"], 1],
                    ["Trouver le nombre suivant dans la suite de nombres : 64, 128, 256, 512, ?", ["1024", "1026", "1025", "1021"], 0],
                    ["Quel est le carré de 25?", ["3", "9", "5", "25"], 2],
                    ["Qui a peint la Joconde?", ["Léonard de Vinci", "Pablo Picasso", "Rembrandt", "Le Caravage"], 0],
                    ["Quel pays n'appartient pas à l'Union Européenne?", ["Espagne", "Suisse", "France", "Bulgarie"], 1],
                    ["Quel est le plus grand pays au monde?", ["Chine", "Etats-Unis", "Portugal", "Russie"], 3],
                    ["Quel est la plus grande lune du Système Solaire?", ["Io", "Titan", "La Lune", "Ganymède"], 3],
                    ["Combien de côtés possède un octogone?", ["8", "7", "5", "10"], 0],
                    ["Combien de touches sur un piano standard?", ["83", "86", "88", "90"], 2],
                    ["La comète Halley reviens tous les :", ["80 ans", "3000 ans", "76 ans", "6 mois"], 2],
                    ["Combien d'os dans un squelette adulte?", ["204", "202", "206", "208"], 2],
                    ["Où se trouve l'humérus?", ["Dans la jambe", "Dans le bras", "Dans l'abdomen", "Dans la main"], 1],
                    ["Quel élément chimique est représenté par 'H'?", ["Hydrogène", "Oxygène", "Hassium", "Hélium"], 0],
                    ["Qu'est-ce qui se trouve au centre de l'atome?", ["Des électrons", "Le noyau", "Des photons", "Des quarks"], 1]
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