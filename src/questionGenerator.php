<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json; charset=UTF-8");

require "classes/Question.php";

function generateQuestions($difficulty) {
    switch ($difficulty) {
        case "veryeasy" :
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
            break;
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
            break;
        case "medium" :
            $dataQ = [
                ["45×3+27÷3−18 = ?", ["126", "114", "167", "222", "132"], 0],
                ["Quel pays utilise le Yen? (¥)", ["Corée du Sud", "Chine", "Inde", "Myanmar", "Japon"], 4],
                ["Cérès est :", ["Un asteroïde", "Une planète", "Une lune", "Une planète naine", "Une comète"], 3],
                ["Quel est la capitale de la Russie?", ["Paris", "Moscou", "Prague", "Madrid", "Copenhague"], 1],
                ["Quel planète est incliné de presque 90° sur son axe?", ["Jupiter", "Vénus", "Mercure", "Uranus", "Mars"], 3],
                ["Quel est la somme des 3 angles d'un triangle?", ["360°", "270°", "180°", "90°", "On ne peut pas additionner des angles"], 2],
                ["Quel est la probabilité de répondre bon à cette question si vous choisissez au hasard?", ["25%", "25%", "50%", "60%", "Euh..."], 4],
                ["Combien de chiffres après la virgule dans Pi?", ["Infini", "10 000", "100 000", "1 000 000", "10 000 000"], 0],
                ["Quel est l'intrus?", ["Bhoutan", "Turkménistan", "Tonga", "Chine", "Laos"], 2],
                ["Qui a peint la Naissance de Vénus?", ["Léonard de Vinci", "Van Gogh", "Botticelli", "Hokusai", "Claude Monet"], 2],
                ["Qu'est-ce qui contrôle la quantité de sang dans le corps?", ["Moelle osseuse", "Rate", "Amygdales", "Coeur", "Artères"], 1],
                ["Quel est le plus petit pays au monde?", ["Luxembourg", "Andorre", "Vatican", "Lebanon", "Tuvalu"], 2],
                ["Quel est la plus grande étoile connu à ce jour?", ["Soleil", "Bételgeuse", "VY Canis Majoris", "R136a1", "UY Scuti"], 4],
                ["Combien de diagonales possède un heptagone?", ["11", "16", "12", "14", "9"], 3],
                ["Quelle est la fréquence du 'La' standard, utilisée pour accorder les instruments dans l'orchestre?", ["400 Hz", "420 Hz", "440 Hz", "480 Hz", "450 Hz"], 2],
                ["Combien d'éclipses solaire se produisent par an en moyenne?", ["1", "2", "3", "4", "5"], 1],
                ["Trouver le nombre suivant dans la suite de nombres : 81, 243, 729, 2187, ?", ["6567", "6563", "6561", "6557", "6570"], 2],
                ["Combien de secondes dans 1 heure?", ["2400", "3200", "3600", "3800", "4200"], 2],
                ["Quel est la température moyenne de la Terre?", ["12 °C", "11 °C", "14 °C", "18 °C", "15 °C"], 4],
                ["Quel style de danse est associé aux claquettes?", ["Le Charleston", "Le Jazz", "Les Claquettes américaines", "La Salsa", "Le Flamenco"], 2],
                ["Quel est la langue officielle de l'Algérie?", ["Arabe", "Anglais", "Espagnol", "Français", "Italien"], 0],
                ["Qui a écrit Le Tartuffe?", ["Molière", "Victor Hugo", "Gustave Flaubert", "Emile Zola", "Jean-Paul Sartre"], 0],
                ["Quel est le plus grand désert au monde?", ["Sahara", "Désert de l'Antartique", "Désert du Gobi", "Désert d’Arabie", "Désert du Kalahari"], 1],
                ["En quel année Neil Armstrong a marché sur la Lune?", ["1968", "1973", "1966", "1969", "1971"], 3],
                ["Qui a découvert la pénicilline?", ["Louis Pasteur", "Marie Curie", "Nikola Tesla", "Alexander Fleming", "Albert Einstein"], 3],
                ["Quel est le produit de 12 et 15?", ["180", "120", "225", "210", "200"], 0],
                ["Que signifie 'guépard' en Anglais?", ["Lion", "Cheetah", "Hyena", "Guepard", "Leopard"], 1],
                ["Dans quel état se trouve le parc de Yellowstone?", ["Colorado", "Texas", "Idaho", "Montana", "Wyoming"], 4],
                ["Où se trouve le plus haut mont des Etats-Unis?", ["Alaska", "Colorado", "Mississipi", "Hawaï", "Arizona"], 0],
                ["Combien de fois on peut soustraire 10 de 100?", ["10", "9", "1", "11", "Autant de fois qu'on veut"], 2],
            ];
            break;
    }

    $questions = [];

    foreach ($dataQ as $index => $q) {
        $question = new Question($q[0], $q[1], $q[2]);
        $questions[$index] = $question->toArray();
    }
    shuffle($questions);

    return $questions;

}