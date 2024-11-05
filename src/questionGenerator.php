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
                ["Quel est le nom du quiz?", ["QuestionsPourUnChampignon", "The Impossible Quiz", "Projet QCM"], "QuestionsPourUnChampignon"],
                ["Où se situe la Tour Eiffel?", ["Washington", "Paris", "Sydney"], "Paris"],
                ["Le Tigre est-il un animal en voie de disparition?", ["Oui", "Non"], "Oui"],
                ["Quel est la plus haute montagne?", ["Mont Blanc", "Everest", "Mont Fuji"], "Everest"],
                ["1+1 = ?", ["2", "3", "67357"], "2"],
                ["De combien de couleurs est constitué l'arc-en-ciel?", ["3", "2", "6"], "6"],
                ["Quel est le rôle d'un tournevis?", ["Serrer et desserrer des vis", "Planter des clous"], "Serrer et desserrer des vis"],
                ["Trouver le nombre suivant dans la suite de nombres : 1, 2, 3, ?", ["5", "4"], "4"],
                ["Cette question permet-elle de gagner une vie?", ["Oui", "Non"], "Non"],
                ["Quel est la ville la plus peuplée parmi les réponses suivantes?", ["Paris", "Tokyo", "Berlin"], "Tokyo"],
                ["Cette phrase ne contient pas sept mots.", ["Si!", "Non"], "Si!"],
                ["Une pizza est-elle un sandwich?", ["Oui", "Non"], "Non"],
                ["Quel animal miaule?", ["Oiseau", "Chien", "Chat"], "Chat"],
                ["Quel couleur est le soleil vu de la Terre?", ["Jaune", "Bleu", "Rouge"], "Jaune"],
                ["Quel organe du corps humain sert pour respirer?", ["Estomac", "Coeur", "Poumons"], "Poumons"],
                ["Sur quel continent se trouve la France?", ["Océanie", "Asie", "Europe"], "Europe"],
                ["Combien de jours dans une semaine?", ["7", "6"], "7"],
                ["Où se trouve le cerveau?", ["Dans l'abdomen", "Dans la tête"], "Dans la tête"],
                ["Combien d'heures dans une journée?", ["27", "22", "24"], "24"],
                ["Quel est la 20ème lettre de l'alphabet?", ["C", "O", "T"], "T"]
            ];
            break;
        case "easy" :
            $dataQ = [
                ["6x7 = ?", ["47", "43", "41", "42"], "42"],
                ["Où se situe l'Empire State Building?", ["New York", "Seattle", "Los Angeles", "Washington"], "New York"],
                ["En quel année a commencé la 1ère Guerre Mondiale?", ["1918", "1915", "1914", "1912"], "1914"],
                ["Quel est l'intrus?", ["Courgette", "Citrouille", "Maïs", "Tomate"], "Tomate"],
                ["Quel planète est la plus proche du Soleil?", ["Vénus", "Jupiter", "Mercure", "La Terre"], "Mercure"],
                ["Un omnivore mange :", ["Des hommes", "Des plantes et de la viande", "De la viande", "Des OVNIS"], "Des plantes et de la viande"],
                ["En quel année a eu lieu la Révolution Française?", ["1784", "1789", "1788", "1798"], "1789"],
                ["Trouver le nombre suivant dans la suite de nombres : 64, 128, 256, 512, ?", ["1024", "1026", "1025", "1021"], "1024"],
                ["Quel est le carré de 25?", ["3", "9", "5", "25"], "5"],
                ["Qui a peint la Joconde?", ["Léonard de Vinci", "Pablo Picasso", "Rembrandt", "Le Caravage"], "Léonard de Vinci"],
                ["Quel pays n'appartient pas à l'Union Européenne?", ["Espagne", "Suisse", "France", "Bulgarie"], "Suisse"],
                ["Quel est le plus grand pays au monde?", ["Chine", "Etats-Unis", "Portugal", "Russie"], "Russie"],
                ["Quel est la plus grande lune du Système Solaire?", ["Io", "Titan", "La Lune", "Ganymède"], "Ganymède"],
                ["Combien de côtés possède un octogone?", ["8", "7", "5", "10"], "8"],
                ["Combien de touches sur un piano standard?", ["83", "86", "88", "90"], "88"],
                ["La comète Halley reviens tous les :", ["80 ans", "3000 ans", "76 ans", "6 mois"], "76 ans"],
                ["Combien d'os dans un squelette adulte?", ["204", "202", "206", "208"], "206"],
                ["Où se trouve l'humérus?", ["Dans la jambe", "Dans le bras", "Dans l'abdomen", "Dans la main"], "Dans le bras"],
                ["Quel élément chimique est représenté par 'H'?", ["Hydrogène", "Oxygène", "Hassium", "Hélium"], "Hydrogène"],
                ["Qu'est-ce qui se trouve au centre de l'atome?", ["Des électrons", "Le noyau", "Des photons", "Des quarks"], "Le noyau"]
            ];
            break;
        case "medium" :
            $dataQ = [
                ["45×3+27÷3−18 = ?", ["126", "114", "167", "222", "132"], "126"],
                ["Quel pays utilise le Yen? (¥)", ["Corée du Sud", "Chine", "Inde", "Myanmar", "Japon"], "Japon"],
                ["Cérès est :", ["Un asteroïde", "Une planète", "Une lune", "Une planète naine", "Une comète"], "Une planète naine"],
                ["Quel est la capitale de la Russie?", ["Paris", "Moscou", "Prague", "Madrid", "Copenhague"], "Moscou"],
                ["Quel planète est incliné de presque 90° sur son axe?", ["Jupiter", "Vénus", "Mercure", "Uranus", "Mars"], "Uranus"],
                ["Quel est la somme des 3 angles d'un triangle?", ["360°", "270°", "180°", "90°", "On ne peut pas additionner des angles"], "180°"],
                ["Quel est la probabilité de répondre bon à cette question si vous choisissez au hasard?", ["25%", "25%", "50%", "60%", "Euh..."], "Euh..."],
                ["Combien de chiffres après la virgule dans Pi?", ["Infini", "10 000", "100 000", "1 000 000", "10 000 000"], "Infini"],
                ["Quel est l'intrus?", ["Bhoutan", "Turkménistan", "Tonga", "Chine", "Laos"], "Tonga"],
                ["Qui a peint la Naissance de Vénus?", ["Léonard de Vinci", "Van Gogh", "Botticelli", "Hokusai", "Claude Monet"], "Botticelli"],
                ["Qu'est-ce qui contrôle la quantité de sang dans le corps?", ["Moelle osseuse", "Rate", "Amygdales", "Coeur", "Artères"], "Rate"],
                ["Quel est le plus petit pays au monde?", ["Luxembourg", "Andorre", "Vatican", "Lebanon", "Tuvalu"], "Vatican"],
                ["Quel est la plus grande étoile connu à ce jour?", ["Soleil", "Bételgeuse", "VY Canis Majoris", "R136a1", "UY Scuti"], "UY Scuti"],
                ["Combien de diagonales possède un heptagone?", ["11", "16", "12", "14", "9"], "14"],
                ["Quelle est la fréquence du 'La' standard, utilisée pour accorder les instruments dans l'orchestre?", ["400 Hz", "420 Hz", "440 Hz", "480 Hz", "450 Hz"], "440 Hz"],
                ["Combien d'éclipses solaire se produisent par an en moyenne?", ["1", "2", "3", "4", "5"], "2"],
                ["Trouver le nombre suivant dans la suite de nombres : 81, 243, 729, 2187, ?", ["6567", "6563", "6561", "6557", "6570"], "6561"],
                ["Combien de secondes dans 1 heure?", ["2400", "3200", "3600", "3800", "4200"], "3600"],
                ["Quel est la température moyenne de la Terre?", ["12 °C", "11 °C", "14 °C", "18 °C", "15 °C"], "15 °C"],
                ["Quel style de danse est associé aux claquettes?", ["Le Charleston", "Le Jazz", "Les Claquettes Américaines", "La Salsa", "Le Flamenco"], "Les Claquettes Américaines"],
                ["Quel est la langue officielle de l'Algérie?", ["Arabe", "Anglais", "Espagnol", "Français", "Italien"], "Arabe"],
                ["Qui a écrit Le Tartuffe?", ["Molière", "Victor Hugo", "Gustave Flaubert", "Emile Zola", "Jean-Paul Sartre"], "Molière"],
                ["Quel est le plus grand désert au monde?", ["Sahara", "Désert de l'Antartique", "Désert du Gobi", "Désert d'Arabie", "Désert du Kalahari"], "Désert de l'Antartique"],
                ["En quel année Neil Armstrong a marché sur la Lune?", ["1968", "1973", "1966", "1969", "1971"], "1969"],
                ["Qui a découvert la pénicilline?", ["Louis Pasteur", "Marie Curie", "Nikola Tesla", "Alexander Fleming", "Albert Einstein"], "Alexander Fleming"],
                ["Quel est le produit de 12 et 15?", ["180", "120", "225", "210", "200"], "180"],
                ["Que signifie 'guépard' en Anglais?", ["Lion", "Cheetah", "Hyena", "Guepard", "Leopard"], "Cheetah"],
                ["Dans quel état se trouve le parc de Yellowstone?", ["Colorado", "Texas", "Idaho", "Montana", "Wyoming"], "Wyoming"],
                ["Où se trouve le plus haut mont des Etats-Unis?", ["Alaska", "Colorado", "Mississipi", "Hawaï", "Arizona"], "Alaska"],
                ["Combien de fois on peut soustraire 10 de 100?", ["10", "9", "1", "11", "Autant de fois qu'on veut"], "1"],
            ];
            break;
        case "hard" :
            $dataQ = [
                ["Un homme peut-il épouser la soeur de sa veuve?", ["Oui", "Non", "Dans certains pays", "Cela dépend", "Sous certaines conditions"], "Non"],
                ["Quel est la valeur de Pi au millième près?", ["3,141", "3,142", "3,145", "3,147", "3,143"], "3,141"],
                ["Combien de mois ont 28 jours?", ["1", "2", "12", "0", "3"], "12"],
                ["Dans une course, dans quelle position êtes-vous après avoir doublé la personne en 3ème place?", ["1er", "4ème", "2ème", "3ème", "5ème"], "3ème"],
                ["Quel est la capitale de l'Australie?", ["Melbourne", "Perth", "Sydney", "Brisbane", "Canberra"], "Canberra"],
                ["Combien de temps dure une journée sur Terre?", ["23h 56m", "24h", "24h 10m", "23h 50m", "25h"], "23h 56m"],
                ["Lorsque l'on plie une feuille de papier 50 fois, quelle serait son épaisseur finale?", ["Quelques centimètres", "Quelques mètres", "La taille d'une maison", "Aussi haut que l'Everest", "Plus loin que la distance Terre-Lune"], "Plus loin que la distance Terre-Lune"],
                ["Que signifie le symbole suivant en maths? ∈", ["Union", "Si et seulement si", "Contient comme élément", "Appartient à", "Existe"], "Appartient à"],
                ["Que vaux x? 3x+5=20", ["12", "18", "5", "15", "17"], "5"],
                ["Quel est l'intrus?", ["Rouge", "Rose", "Violet", "Vert", "Bleu"], "Rose"],
                ["Combien de côtés possède un pentadécagone?", ["5", "25", "16", "15", "Cette figure n'existe pas"], "15"],
                ["Quel est la somme des angles d'un pentagone?", ["180", "360", "540", "270", "90"], "540"],
                ["Quel est le principal gaz dans l'atmosphère terrestre?", ["Oxygène", "Azote", "Ozone", "Dioxyde de carbone", "Hélium"], "Azote"],
                ["Quel élément chimique est représenté par 'K'?", ["Krypton", "Or", "Carbone", "Calcium", "Potassium"], "Potassium"],
                ["Quel est l'os le plus long du corps humain?", ["Tibia", "Humérus", "Fémur", "Radius", "Crâne"], "Fémur"],
                ["Quel phénomène naturel est mesuré par l'échelle de Richter?", ["Tornade", "Tremblement de Terre", "Tsunami", "Eruption", "Ouragan"], "Tremblement de Terre"],
                ["(1+(5x4-7)x3)+5x(60x3+5x5)-67 = ?", ["1000", "997", "1004", "1013", "998"], "998"],
                ["Quel est la différence entre le produit de 12 et 15 et la somme de 60 et 45 ?", ["72", "80", "70", "75", "77"], "75"],
                ["Dans quel pays est né le reggae?", ["Haïti", "France", "Jamaïque", "Myanmar", "Australie"], "Jamaïque"],
                ["Quel est l'échelle de mesure du volume sonore'?", ["Hertz", "Amplitude", "Décibel", "Lumens", "Centi-grade"], "Décibel"],
                ["Qui était le premier président des Etats-Unis?", ["Abraham Lincoln", "George Washington", "Thomas Jefferson", "John Adams", "James Madison"], "George Washington"],
                ["Quel civilisation ancienne a construit les pyramides?", ["Les Romains", "Les Grecs", "Les Egyptiens", "Les Mayas", "Les Aztèques"], "Les Egyptiens"],
                ["Quel évènement a déclenché la 1ère Guerre Mondiale?", ["L'invasion de la Pologne", "Le bombardement de Pearl Harbor", "La Révolution russe", "La signature du traité de Versailles", "L'assassinat de François-Ferdinand"], "L'assassinat de François-Ferdinand"],
                ["Qu'est-ce qui a causé la course à l'espace?", ["La découverte de nouvelles ressources sur la Lune", "Le besoin d'explorer d'autres planètes", "La recherche d'une nouvelle source d'énergie", "La compétition technologique entre les États-Unis et l'Union soviétique", "Les avancées dans la navigation aérienne"], "La compétition technologique entre les États-Unis et l'Union soviétique"],
                ["Qu'est-ce qu'une clé de sol?", ["Un type de guitare", "Un terme pour désigner un morceau de musique dans le ton de sol", "Une technique de jeu au piano", "Un symbole musical qui indique la hauteur des notes sur une portée", "Un élément de notation utilisé uniquement pour la musique vocale"], "Un symbole musical qui indique la hauteur des notes sur une portée"],
                ["Quel est le symbole du pound?", ["$", "₽", "€", "¥", "£"], "£"],
                ["Qui a peint la Plage de Pourville?", ["Van Gogh", "Claude Monet", "Ludwig Knaus", "Léonard de Vinci", "Pablo Picasso"], "Claude Monet"],
                ["Quel lettre dans la langue française est la moins utilisé?", ["K", "Z", "Y", "W", "X"], "W"],
                ["Que signifie 'cheval' en espagnol?", ["Gato", "Oveja", "Pez", "Conejo", "Caballo"], "Caballo"],
                ["Quel est le principal conducteur dans les fils électriques?", ["Or", "Fer", "Cuivre", "Zinc", "Plastique"], "Cuivre"],
                ["Quel dispositif transforme l'énergie électrique en énergie lumineuse?", ["Résistance", "Condensateur", "Transistor", "Diode", "Ampoule"], "Diode"],
                ["Quelle est la principale source de nourriture pour de nombreux animaux marins dans l'océan?", ["Zooplancton", "Débris organiques", "Plantes aquatiques", "Phytoplancton", "Poisson"], "Phytoplancton"],
                ["Quel est l'impact principal du réchauffement climatique sur les océans?", ["Augmentation des niveaux de la mer", "Diminution des niveaux de salinité", "Acidification des océans", "Augmentation des courants océaniques", "Réduction des tempêtes océaniques"], "Acidification des océans"],
                ["Quel est le plus grand réseau de catacombes au monde?", ["Catacombes de Paris", "Catacombes de Rome", "Catacombes de Naples", "Catacombes de Prague", "Catacombes de Lisbonne"], "Catacombes de Naples"],
                ["Quel événement est célébré à Noël dans le christianisme?", ["La dernière Cène", "L'Ascension de Jésus", "La Pentecôte", "La naissance de Jésus", "La résurrection de Jésus"], "La naissance de Jésus"],
                ["Quel est le nom du livre sacré de l'hindouisme?", ["Les Vedas", "La Bible", "Le Tao Te Ching", "Le Coran", "La Torah"], "Les Vedas"],
                ["Quel est le jeûne sacré observé par les musulmans pendant le mois de Ramadan?", ["Seder", "Sawm", "Carême", "Yom Kippour", "Navratri"], "Sawm"],
                ["Combien de zéros dans le milliard?", ["8", "9", "12", "6", "15"], "9"],
                ["Quel est le plus petit nombre entier qui ne peut être écrit comme la somme de deux nombres premiers?", ["2", "6", "5", "4", "9"], "4"],
                ["Quel jeu de cartes est souvent considéré comme le plus populaire dans les casinos?", ["Rami", "Bridge", "Blackjack", "Poker", "Baccarat"], "Blackjack"],
                ["Quel site archéologique péruvien est souvent considéré comme une des Sept Merveilles du monde moderne?", ["Le Colisée", "Le Christ Rédempteur", "Petra", "Chichen Itza", "Machu Pichu"], "Machu Pichu"],
                ["Quel est la distance moyenne entre la Terre et le Soleil?", ["1 UA", "1,5 UA", "93 millions de kilomètres", "30 millions de kilomètres", "5 UA"], "1 UA"],
                ["Quel est la principale composante du noyau des étoiles?", ["Hydrogène", "Carbone", "Fer", "Hélium", "On ne sait pas"], "Hydrogène"],
                ["Quel est le nom de la première sonde spatiale à avoir quitté notre Système Solaire?", ["Voyager 1", "Voyager 2", "New Horizons", "Pioneer 10", "Aucune sonde n'a quitté le Système Solaire"], "Voyager 1"],
                ["Quel type de galaxies est le plus souvent trouvé dans les groupes de galaxies?", ["Lenticulaires", "Spirales", "Irrégulières", "Elliptiques", "Actions"], "Spirales"],
                ["Quel est le principal moyen utilisé pour détecter les exoplanètes?", ["L'observation directe", "Les mesures de la luminosité", "L'imagerie infrarouge", "La méthode des transits", "L'effet Doppler"], "La méthode des transits"],
                ["Combien de départements dans l'Héxagone?", ["101", "96", "18", "98", "103"], "96"],
                ["Quel partie de la plante est responsable de la photosynthèse?", ["Les fleurs", "La tige", "Les pétales", "Les feuilles", "Les racines"], "Les feuilles"],
                ["Quel est la proportion d'eau salée sur Terre?", ["90%", "80%", "50%", "97%", "99%"], "97%"],
                ["Combien de chambres possède notre coeur?", ["2", "4", "6", "1", "On n'appelle pas ça des chambres"], "4"],
            ];
            break;
        case "impossible" : [
                ["Quel est le tempo le plus rapide?", ["Vivace", "Andante", "Allegro", "Presto", "Adagio"], "Presto"],
                ["Quel est le tempo moyen d'un morceau de tempo 'Allegro'?", ["108-132 BPM", "76-108 BPM", "140-160 BPM", "60-78 BPM", "132-140 BPM"], "108-132 BPM"],
                ["Quel symbole musical représente un volume très doux?", ["MF", "F", "FF", "P", "MP"], "P"],
            ];
            break;
    }

    $questions = [];

    foreach ($dataQ as $index => $q) {
        shuffle($q[1]);
        $question = new Question($q[0], $q[1], $q[2]);
        $questions[$index] = $question->toArray();
    }
    shuffle($questions);

    return $questions;

}