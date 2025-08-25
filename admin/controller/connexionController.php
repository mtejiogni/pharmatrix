<?php
require_once '../service.php';

$email= $_POST['email'];
$password= $_POST['password'];

// Recherche pour la connexion en fonction de l'email et
// du mot de passe original
$user= $usersdb->readConnexion2($email, $password);



if($user == false) {
    $_SESSION['erreur']= array(
        'type' => 'danger',
        'message' => 'Echec de connexion'
    );
    header('Location:../../login.php');
}
else {
    $_SESSION['erreur']= array(
        'type' => 'success',
        'message' => "Bienvenue $user->first_name"
    );
    $_SESSION['profil']= $user;

    if($user->role == 'Administrateur') {
        header('Location:../index.php?view=dashboard');
    }
    else if($user->role == 'Pharmacien') {
        header('Location:../index.php?view=pharmacie');
    }
    else {
        $_SESSION['erreur']= array(
            'type' => 'success',
            'message' => "Bienvenue $user->first_name"
        );
        header('Location:../index.php');
    }
    
}

?>