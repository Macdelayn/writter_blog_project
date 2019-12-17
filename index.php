<?php

session_start();


require('Controller/Controller1.php');

$router = new Controller1();

try{

	if (isset($_GET['action'])) {
    	if ($_GET['action'] == 'listArticles') {
        	$router->listArticles();
    	}
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $router->article();
            }
            else {
                echo 'Erreur : aucun identifiant de billet envoyé';
                }
        }
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    $router->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('Aucun identifiezdsdant de billet envoyé');
            }
        }
        
	}
	else {
    	$router->listArticles();
	}

}
catch(Exception $e){
	echo 'Erreur :' .$e->getMessage();
}	


?>
