<?php
require  __DIR__ . '/Config.php';
require  __DIR__ . '/DB_Connect.php';

$stmt = DB_Connect::dbConnect()->prepare("
    SELECT el.prenom, el.nom, el.login, el.password, eleinfo.rue, eleinfo.cp, eleinfo.ville, eleinfo.pays
    FROM eleve AS el
    INNER JOIN eleve_information AS eleinfo ON el.information_id = eleinfo.id


    
");

if ($stmt->execute()) {
    foreach ($stmt->fetchAll() as $value) {
        foreach ($value as $key => $student) {
            echo "$key --> $student <br>";
        }
    }
}

$stmt = DB_Connect::dbConnect()->prepare("
    SELECT  elComp.niveau, comp.titre, comp.description
    FROM eleve_competence AS elComp
    INNER JOIN competence AS comp ON elComp.competence_id = comp.id
");

if ($stmt->execute()) {
    foreach ($stmt->fetchAll() as $value) {
        foreach ($value as $key => $student) {
            echo "$key --> $student <br>";
        }
        echo "<br>";
    }
}




