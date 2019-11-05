<?php

class Admin{

	private $id;
	private $pseudo;
	private $email;
	private $pass;

	public function hydrate(array $donnees){
    	foreach ($donnees as $key => $value){
   			$method = 'set'.ucfirst($key);
      
      		if (method_exists($this, $method))
      		{
        		$this->$method($value);
      		}
    	}
  	}
  	//getters

  	public function getId(){
  		return $this->id
  	};

  	public function getPseudo(){
  		return $this->pseudo
  	};

  	public function getEmail(){
  		return $this->email
  	};

  	public function getPass(){
  		return $this->pass
  	};

  	//setters

  	public function setId($id){
  		$id = (int) $id ;
  		if($id > 0){
  			$this->id = $id ;
  		}
  	};

  	public function setPseudo($pseudo){
  		if(is_string($pseudo)){
  			$this->pseudo = $pseudo;
  		}
  	};

  	public function setEmail($email){
  		if(is_string($pseudo)){
  			$this->email = $email;
  		}
  	};

	public function setPass($pass){
		if(is_string($pseudo)){
			$this->pass = $pass;  
		}
	}
  		
}