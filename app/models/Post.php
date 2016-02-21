<?php

class Post
{
	/**
	 * Get all records from posts table.
	 *
	 * @return array
	 */
	public function all () 
	{
		$db = Connection:: prepare ( "SELECT users.name, posts.user_id, posts.description, posts.file, 
			posts.updated_at, posts.updated_at, posts.types, posts.id	FROM posts INNER JOIN users 
			ON posts.user_id=users.id;");
		$db->execute();
		$users = $db -> fetchAll();
		$db -> closeCursor();

		return $users;
	}

	/**
	 * Add new posts.
	 *
	 * @param string $name user name.
	 * @param string $email user email.
	 * @param string $pass user password.
	 *
	 * @return mixed
	 */
	public function add ($user_id, $desc, $file, $types)
	{
		$date = new DateTime();
		$db = Connection:: prepare ( "INSERT INTO posts (user_id,description,file,updated_at,created_at,types) 
			VALUES (:user_id,:description,:file,:updated_at,:created_at,:types);" ) ;
		
		$db->bindParam(':user_id', $user_id);
		$db->bindParam(':description', $desc);
		$db->bindParam(':file', $file);
		$db->bindParam(':updated_at', $time);
		$db->bindParam(':created_at', $time);
		$db->bindParam(':types', $types);

		$user_id = $user_id;
		$desc = $desc;
		$file = $file;
		$time = $date->format('Y-m-d H:i:s');
		$types = $types;
		
		$db->execute();
		$id = Connection::lastInsertId();
		$post = $this->getById($id);
		$db -> closeCursor();

		return $post;
	}

	/**
	 * Get post by id
	 *
	 * @param int/string $id post id.
	 *
	 * @return array
	 */
	public function getById ($id) 
	{
		$db = Connection:: prepare ( "SELECT *
			FROM posts WHERE id = :id" );
		$db->bindParam(':id', $id);
		$id = $id;
		$res = $db->execute();
		$user = $db -> fetchAll();
		$db -> closeCursor();

		return $user;
	}

	/**
	 * Remove post by id;
	 *
	 * @param int/string $id post id.
	 *
	 * @return boolean
	 */
	public function remove ($id) 
	{
		$db = Connection:: prepare ( "DELETE FROM posts WHERE id=:id;" );
		$db->bindParam(':id', $id);
		$id = $id;
		$res = $db->execute();
		$db -> closeCursor();

		return $res;
	}
}