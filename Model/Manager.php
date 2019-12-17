<?php

class Manager {
	protected function dbConnect()
	{
        $bdd = new PDO('mysql:host=localhost;dbname=blog2;charset=utf8', 'root', '');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        return $bdd;
        
	}
    
}
