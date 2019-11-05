<?php

public function UserManager{
	private $bdd;

	public function __construct($bdd){
		$this->bdd = $bdd;
	}

	public function add(User $user){
		$q = $this->bdd->prepare('ISERT INTO user(pseudo) VALUES(:pseudo)');

		$q->bindValue(':pseudo', $user->pseudo());

		$q->execute();

		$user->hydrate([
			'id' => $this->bdd->lastInsertId()
		]);
	}

	public function delete(User $user){
		$this->bdd->exec('DELETE FROM user WHERE id = '.$user->id());
	}
}