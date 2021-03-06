<?php

function rechercheUtilParLoginMdp($login, $mdp) {
    $pdo = dbConnexion();
    return $pdo->query("SELECT * FROM util WHERE login='$login' AND mdp='$mdp'")->fetchAll(); 
}

//definir 2 constantes car on va utiliser partout pour connexions
define("DB_CHAINE_CONNEXION", "mysql:host=localhost;dbname=streaming");
define("DB_USER", "root");

function dbAjouterFilm($titre, $anneeProd, $synopsis) {
    $pdo = dbConnexion();
    $pdo->exec("INSERT INTO film (titre,annee_prod,synopsis) VALUES('$titre',$anneeProd,'$synopsis')");
}

function dbConnexion(): PDO { //:PDO pour typage retournera un objet PDO...
    try {
        $pdo = new PDO(DB_CHAINE_CONNEXION, DB_USER);
        return $pdo;
    } catch (Exception $ex) {
        die("ERREUR: " . $ex->getMessage()); // sortie du script et affichage exception erreur
    }
}

//function dbCheckLogin();
function lister() {
    $pdo = new PDO(DB_CHAINE_CONNEXION, DB_USER);
    $statement = $pdo->query("SELECT * FROM film ORDER BY titre");
    $resultat = $statement->fetchAll();
    return $resultat;
}

function supprimerFilm($id) {
    $pdo = new PDO(DB_CHAINE_CONNEXION, DB_USER);
//    $pdo->exec("INSERT INTO film (titre,annee_prod,synopsis) VALUES('$titre',$anneeProd,'$synopsis')");
    $pdo->exec("DELETE FROM film WHERE id=$id");

//    $resultat = $statement->fetchAll();
//    return $resultat;
}

//sql command ds mysql
//INSERT INTO film (titre,annee_prod,synopsis) VALUES('kungfu panda',2000,'tataat')