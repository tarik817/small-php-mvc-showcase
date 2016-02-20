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
		$db = Connection:: prepare ( "SELECT * from users;" ) ;
		$db->execute();
		$users = $db -> fetchAll();
		$db -> closeCursor();

		return $users;
	}

	/**
	 * Function all() geting all records. from user table.
	 *
	 * @return array
	 */
	public function getByNameAndPass ($name, $pass) 
	{
		$db = Connection:: prepare ( "SELECT from users WHERE name = :name AND password = :pass;" );
		$db->bindParam(':name', $name);
		$db->bindParam(':pass', $pass);
		$db->execute();
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

		$db = Connection:: prepare ( "INSERT INTO users (name,email,password) 
			VALUES (:name,:email,:password,:updated_at,:created_at);" ) ;
		
		$db->bindParam(':name', $name);
		$db->bindParam(':email', $email);
		$db->bindParam(':password', $pass);
		$db->bindParam(':updated_at', $date);
		$db->bindParam(':created_at', $date);

		$user = $db -> fetchAll();
		$db -> closeCursor();

		return $user;
	}
}