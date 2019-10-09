<?php

	session_start();

	$bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
	use // Controllors used
		// Requête (as Request)
		// Réponse (as Response)
		// Routeur (as Router)
		//
		//
		//
		//


	$request = new Request;
	$response = new Response;
	$router = new Router($request,$response);


	echo $response;

?>