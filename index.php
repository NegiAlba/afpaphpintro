<?php

// Exercice 1 :
// 1.	Déclarer 2 variables nom et age.
// 2.	Assigner a ces variables respectivement un nom et un age (Attention aux types de vos variables !)

/**
 * @var int
 */
$age = 27;

/**
 * @var string
 */
$nom = 'Axel';
// 3.	Créer une variable ageDouble qui contiendra le double de la valeur de la variable age.

/**
 * @var int
 */
$ageDouble = $age * 2;

// 4.	Afficher ces variables dans un texte mis en forme (Exemple : Je m’appelle Axel et j’ai 25 ans)

echo "Je m'appelle ${nom} et j'ai ${age} ans <br/>";

// 5.	Créer une condition qui vérifie l’age du visiteur, si il a plus de 25 ans alors la condition affiche « Le visiteur est plus agé que notre prof », et « Le visiteur est plus jeune que notre prof » dans le cas inverse.

if ($age > 25) {
    echo 'Le visiteur est plus agé que le prof <br/>';
} else {
    echo 'Le visiteur est plus jeune que le prof <br/>';
}
// 6.	Créer une nouvelle variable ville auquel vous assignerez une ville de votre choix. Créer une condition qui affichera conditionnellement si le visiteur peux voter à la mairie de Bordeaux en fonction de son age et de sa ville. (Exemple d’affichage « Vous pouvez voter à la mairie de Bordeaux car vous êtes majeur et Bordelais »). S’il ne peux pas car il n’est pas de Bordeaux ou n’est pas majeur alors afficher quelque chose en conséquence.

$ville = 'Bordeaux';

if ('Bordeaux' == $ville) {
    if ($age > 18) {
        echo 'Vous pouvez voter à la mairie de Bordeaux car vous êtes majeur et bordelais <br/>';
    } else {
        echo 'Vous êtes trop jeune pour voter, mais une fois la majorité atteinte vous pourrez voter à la mairie de Bordeaux <br/>';
    }
} else {
    echo "Vous n'êtes pas bordelais <br/>";
}
// 7.	Créer une condition switch qui retournera :
// a.	« Vous n’avez pas le droit de voter » si l’age du visiteur est inférieur à 16 ans.
// b.	« Bientôt le droit de vote » si l’age du visiteur est 16 ou 17 ans.
// c.	« Vous pourrez voter pour la première fois » si l’age du visiteur est 18 ans
// d.	« Vous avez probablement déjà voté » si l’age du visiteur est supérieur à 25 ans.
// e.	« Je n’ai pas de message particulier » dans le cas par défaut.
switch ($age) {
    case $age < 16:
        echo "Vous n'avez pas le droit de voter";
        break;
    case 16 == $age || 17 == $age:
        echo 'Bientôt le droit de vote';
        break;
    case 18 == $age:
        echo 'Vous pourrez voter pour la première fois';
        break;
    case $age > 25:
        echo 'Vous avez probablement déja voté';
        break;
    default:
        echo "Je n'ai pas de message particulier";
}

// PARTIE 2 : TEMPERATURES

// Avec mon array prédéfini

$temperatures = [-15,-10,10,20,25,45];

/**
 * Returns the closest temperature to zero
 *
 * @param Array $array
 * @return int
 */
function procheDeZero($array) {
    
    // PREMIERE VALIDATION : Si mon array est vide je retourne 0
    if (!count($array)){
        return 0;
    }
    
    
    // Je classe mon tableau afin de faciliter l'itération
    sort($array);

    // Je déclare ma variable closest qui va contenir le résultat qu'il faudra retourner à la fin, par défaut on considère que c'est le premier élément du tableau une fois qu'on a utilisé la fonction sort()
    $closest = $array[0];

    // On fera une boucle sur l'array pour vérifier certaines conditions

    foreach ($array as $temperature) {
        // Le nombre le plus proche de zéro est par définition celui dont la valeur absolue est la plus proche de zéro.

        // Je vais donc vérifier dans mon tableau organisé deux par deux les valeurs absolues de mes éléments en partant de l'élément que j'ai désigné au départ. Si il est le plus proche de zéro des deux alors il ne changera pas, sinon il prendra la valeur du chiffre le plus proche.
        if(abs($temperature) < abs($closest)){
            $closest = $temperature;
        }

        // Enfin je vais englober mon cas négatif : Si on possède deux valeur équidistantes de zéro, mais que l'une est négative et l'autre pas alors on va conserver la positive.
        if(abs($closest) == abs($temperature) && $temperature > 0){
            $closest = $temperature;
        }

        // BONUS : Vous remarquerez que le code à l'intérieur des deux if est identique : On peut donc le factoriser
        // Etant donné que nos deux if sont non cumulatifs (comprenez, on ne peut pas être dans les deux cas de figures à la fois) alors on va utiliser un || pour les combiner.

        // if(abs($temperature) < abs($closest) || (abs($closest) == abs($temperature) && $temperature > 0)){
        //     $closest = $temperature;
        // }

    }

    // Je retourne enfin le dernier nombre retenu par la fonction.
    return $closest;

}

echo $procheDeZero($temperatures);
