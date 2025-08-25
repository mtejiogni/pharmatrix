<?php 
require_once '../service.php';

// Chemin vers les images de profil utilisateur
$path_dest= './files/user/'; 

$action= $_GET['action'];

if($action == 'create') {
    try {
        $first_name= $_POST['first_name'];
        $last_name= $_POST['last_name'];
        $phone= $_POST['phone'];
        $location= $_POST['location'];
        $email= $_POST['email'];
        $password= $_POST['password'];
        $password_h= password_hash($_POST['password'], PASSWORD_DEFAULT);
        $role= $_POST['role'];
        $photo= '';

        // Recherche pour la connexion en fonction de l'email et
        // du mot de passe original
        $data= $usersdb->readConnexion2($email, $password);

        if($data != false) {
            $_SESSION['erreur']= array(
                'type' => 'warning',
                'message' => "Email et mot de passe déjà existant"
            );
        }
        else {
            if(isset($_FILES['photo']) == true && $_FILES['photo']['size'] > 0) {
                $photo= $package->upload_image($_FILES['photo'], 'user', 300, 300, $path_dest);
            }

            // On crée l'utilisateur avec le mot de passe hashé : $password_h
            $usersdb->create($first_name, $last_name, $phone, $location, $email, $password_h, $role, $photo);
            $_SESSION['erreur']= array(
                'type' => 'success',
                'message' => "L'utilisateur $first_name $last_name a été ajoutée avec succès"
            );
        }
    }
    catch(Exception $ex) {
        $_SESSION['erreur']= array(
            'type' => 'danger',
            'message' => "ERROR REQUEST : $ex->getMessage()"
        );
    }
    finally {
        header('Location:../index.php?view=user');
    }
}


if($action == 'read') {
    header('Content-Type: application/json');
    try {
        $users_id= $_GET['users_id'];
        $data= $usersdb->read($users_id);
        http_response_code(200);
        echo json_encode($data);
    }
    catch(Exception $ex) {
        http_response_code(500);
        echo json_encode(array(
            'type' => 'danger',
            'message' => "ERROR REQUEST : $ex->getMessage()"
        ));
    }
}



if($action == 'update') {
    try {
        $users_id= $_POST['users_id'];
        $user= $usersdb->read($users_id);

        $first_name= $_POST['first_name'];
        $last_name= $_POST['last_name'];
        $phone= $_POST['phone'];
        $location= $_POST['location'];
        $email= $_POST['email'];
        $password= $_POST['password'];
        $password_h= password_hash($_POST['password'], PASSWORD_DEFAULT);
        $role= $_POST['role'];
        $photo= $user->photo;

        $data= $usersdb->readConnexion2($email, $password);

        if($data != false && $data->users_id != $user->users_id) {
            $_SESSION['erreur']= array(
                'type' => 'warning',
                'message' => "Email et mot de passe déjà existant"
            );
        }
        else {
            if(isset($_FILES['photo']) == true && $_FILES['photo']['size'] > 0) {
                unlink($path_dest . $user->photo);
                $photo= $package->upload_image($_FILES['photo'], 'user', 300, 300, $path_dest);
            }

            $usersdb->update($users_id, $first_name, $last_name, $phone, $location, $email, $password_h, $role, $photo);
            $_SESSION['erreur']= array(
                'type' => 'success',
                'message' => "L'utilisateur $first_name $last_name a été modifiée avec succès"
            );
        }
    }
    catch(Exception $ex) {
        $_SESSION['erreur']= array(
            'type' => 'danger',
            'message' => "ERROR REQUEST : $ex->getMessage()"
        );
    }
    finally {
        header('Location:../index.php?view=user');
    }
}




if($action == 'delete') {
    try {
        $users_id= $_GET['users_id'];
        $user= $usersdb->read($users_id);

        unlink($path_dest . $user->photo);
        $usersdb->delete($users_id);
        $_SESSION['erreur']= array(
            'type' => 'success',
            'message' => "L'utilisateur $first_name $last_name a été supprimée avec succès"
        );
    }
    catch(Exception $ex) {
        $_SESSION['erreur']= array(
            'type' => 'danger',
            'message' => "ERROR REQUEST : $ex->getMessage()"
        );
    }
    finally {
        header('Location:../index.php?view=user');
    }
}




?>