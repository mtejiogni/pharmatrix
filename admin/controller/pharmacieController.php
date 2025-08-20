<?php 
require_once '../service.php';

$action= $_GET['action'];

if($action == 'create') {
    try {
        $name= $_POST['name'];
        $phone= $_POST['phone'];
        $location= $_POST['location'];

        $pharmaciedb->create($name, $location, $phone);
        $_SESSION['erreur']= array(
            'type' => 'success',
            'message' => "La pharmacie $name a été ajoutée avec succès"
        );
    }
    catch(Exception $ex) {
        $_SESSION['erreur']= array(
            'type' => 'danger',
            'message' => "ERROR REQUEST : $ex->getMessage()"
        );
    }
    finally {
        header('Location:../index.php?view=pharmacie');
    }
}

?>