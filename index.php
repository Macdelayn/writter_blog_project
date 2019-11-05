<?php

session_start();


require('Controllors/Router.php');

try{

	if (isset($_GET['action'])) {
    	if ($_GET['action'] == 'listArticles') {
        	listArticles();
    	}
        elseif ($_GET['action'] == 'article') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                article();
            }
            else {
                echo 'Erreur : aucun identifiant de billet envoyé';
                }
        }
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['userId']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['userId'], $_POST['comment']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        
	}
	else {
    	listArticles();
	}

}
catch(Exception $e){
	echo 'Erreur :' .$e->getMessage();
}	


?>