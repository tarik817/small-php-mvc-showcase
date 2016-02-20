<?php 

Class User
{
	/**
	 * Function all() geting all records. from user table.
	 *
	 * @return array
	 */
	public function all () 
	{
		$db = Connection:: prepare ( "SELECT id, name, email, updated_at, created_at
		 from users;" ) ;
		$db->execute();
		$users = $db -> fetchAll();
		$db -> closeCursor();

		return $users;
	}

	/**
	 * Get user.
	 *
	 * @param string $email User name.
	 * @param string $pass User hashed password.
	 *
	 * @return array
	 */
	public function getByEmailAndPass ($email, $pass) 
	{
		$db = Connection:: prepare ( "SELECT id, name, email, updated_at, created_at 
			FROM users WHERE email = :email AND password = :pass;" );
		$db->bindParam(':email', $email);
		$db->bindParam(':pass', $pass);
		$email = $email;
		$pass = $pass;
		$db->execute();
		$user = $db -> fetchAll();
		$db -> closeCursor();

		return $user;
	}

	/**
	 * Get user by email
	 *
	 * @return array
	 */
	public function getByEmail ($email) 
	{
		$db = Connection:: prepare ( "SELECT id, name, email, updated_at, created_at 
			FROM users WHERE email = :email" );
		$db->bindParam(':email', $email);
		$email = $email;
		$res = $db->execute();
		$user = $db -> fetchAll();
		$db -> closeCursor();

		return $user;
	}

	/**
	 * Get user by id
	 *
	 * @return array
	 */
	public function getById ($id) 
	{
		$db = Connection:: prepare ( "SELECT id, name, email, updated_at, created_at 
			FROM users WHERE id = :id" );
		$db->bindParam(':id', $id);
		$id = $id;
		$res = $db->execute();
		$user = $db -> fetchAll();
		$db -> closeCursor();

		return $user;
	}

	/**
	 * Function all() geting all records. from user table.
	 *
	 * @param string $name user name.
	 * @param string $email user email.
	 * @param string $pass user password.
	 *
	 * @return mixed
	 */
	public function add ($name, $email, $pass) 
	{
		$date = new DateTime();
		$db = Connection:: prepare ( "INSERT INTO users (name,email,password,updated_at,created_at) 
			VALUES (:name,:email,:password,:updated_at,:created_at);" ) ;
		
		$db->bindParam(':name', $name);
		$db->bindParam(':email', $email);
		$db->bindParam(':password', $pass);
		$db->bindParam(':updated_at', $time);
		$db->bindParam(':created_at', $time);

		$name = $name;
		$email = $email;
		$pass = $pass;
		$time = $date->format('Y-m-d H:i:s');

		$res = $db->execute();
		$id = Connection::lastInsertId();
		$user = $this->getById($id);
		$db -> closeCursor();

		return $user;
	}
}