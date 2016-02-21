<?php 

Class Home extends Controller 
{
	/**
	 * Home view. 
	 *  
	 * @return view
	 */
	public function index ()
	{
		$post = $this->model('Post');
		$posts = $post->all();
		$posts = array_reverse($posts);
		return $this->view('home/index', ['posts' => $posts]);
	}

	/**
	 * Add new post. 
	 *  
	 * @return array
	 */
	public function add ()
	{
		if(!\Core\Auth::check()){
			return http_response_code(401);
		}
		//Create folder for files if not exist.
		$uploads_dir = BASE_PATH . '/files';
		$relative_path = BASE_URL . '/files';
		if (!file_exists( $uploads_dir )) {
	    mkdir( $uploads_dir, 0777, true);
		}
		//Upload files on the server.
		if (isset($_FILES['files'])){
			foreach ($_FILES["files"]["error"] as $key => $error) {
		    if ($error == UPLOAD_ERR_OK) {
	        $tmp_name = $_FILES["files"]["tmp_name"][$key];
	        $name = rand(1000) . $_FILES["files"]["name"][$key];
	        move_uploaded_file($tmp_name, "$uploads_dir/$name");
	        $paths[] = "$relative_path/$name";
	        $types[] = $_FILES["files"]["type"][$key];;
		    }
		    else{
		    	$paths = [];
					$types = [];
		    }
			}
		}
		//Add new post with data.
		$post = $this->model('Post');
		$added_post = $post->add(htmlspecialchars($_POST['user_id']), 
			htmlspecialchars($_POST['description']), json_encode($paths), json_encode($types));

		return $added_post;
	}

	/**
	 * Delete post record. 
	 *  
	 * @return boolean
	 */
	public function remove ()
	{
		if(!\Core\Auth::check()){
			return http_response_code(401);
		}
		$user = \Core\Auth::user();
		if($_POST['user_id'] != $user['id']){
			return false;
		}
		//Add new post with data.
		$post = $this->model('Post');
		$bool = $post->remove(htmlspecialchars($_POST['post_id']));
		return $bool;
	}
}