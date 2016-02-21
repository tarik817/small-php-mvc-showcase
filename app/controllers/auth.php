<?php

Class Auth extends Controller
{
	/**
	 * Get auth view for login.
	 * 
	 * @return view
	 */
	public function login ()
	{
		return $this->view('auth/auth');
	}

	/**
	 * Get auth view for register.
	 * 
	 * @return view
	 */
	public function register ()
	{
		$data = ['register' => 'register'];
		return $this->view("auth/auth", $data);
	}

	/**
	 * Sing up user.
	 * 
	 * @return view
	 */
	public function singup ()
	{
		//Check if all required fields sent.
		if (!$_POST['email']) {
			return $this->view('auth/auth', ['register' => 'register', 'error' => 'Email field is reqiured!']);	
		}
		if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			return $this->view('auth/auth', ['register' => 'register', 'error' => 'Email is not valid!']);	
		}
		if (!$_POST['name']) {
			return $this->view('auth/auth', ['register' => 'register', 'error' => 'Name field is reqiured!']);	
		}
		if (!$_POST['password']) {
			return $this->view('auth/auth', ['register' => 'register', 'error' => 'Password field is reqiured!']);	
		}
		//Instantiate user object.
		$u_model = $this->model('User');
		//check if user with htat email exist.
		$check = $u_model->getByEmail(htmlspecialchars($_POST['email']));
		if(!empty($check)) {
				return $this->view('auth/auth', ['register' => 'register', 'error' => 'Email already taken!']);	
		}
		//Add user.
		$user = $u_model->add(htmlspecialchars($_POST['name']), htmlspecialchars($_POST['email']), 
			md5(htmlspecialchars($_POST['password'])));
		//Return with sicces message.
		//Initialize session and set cookie.
		$this->initialize();
		// Redirect to home page.
		header("Location: " . BASE_URL );
		die();
	}

	/**
	 * Sing -in user.
	 * 
	 * @return view
	 */
	public function singin ()
	{
		//Validate authentication.
		if (!$_POST['email']) {
			return $this->view('auth/auth', ['error' => 'Email field is reqiured!']);	
		}
		if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			return $this->view('auth/auth', ['error' => 'Email is not valid!']);	
		}
		if (!$_POST['password']) {
			return $this->view('auth/auth', ['error' => 'Password field is reqiured!']);	
		}

		$u_model = $this->model('User');
		$pass = md5(htmlspecialchars($_POST['password']));
		$user = $u_model->getByEmailAndPass(htmlspecialchars($_POST['email']), $pass);

		if (empty($user)) {
			return $this->view('auth/auth', ['error' => 'Credentials not much!']);
		}
		//Initialize session and set cookie.
		$this->initialize($user);
		//Redirect to main page.
		header("Location: " . BASE_URL );
		die();
	}

	/**
	 * Log out user.
	 * 
	 * @return view
	 */
	public function logout ()
	{	
		unset($_SESSION['user']);
		if (isset($_COOKIE)) {
      setcookie("user", '', 1); 
      setcookie("user", '', 1, '/');
		}
		header("Location: " . BASE_URL . '/auth/login' );
		die();
	}

	/**
	 * Set session and cookie.
	 * 
	 * @param array $user
	 * 
	 * @return void
	 */
	private function initialize ($user)
	{
		$_SESSION['user'] = $user;
		$domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false;
		setcookie("user", json_encode($user), time()+ 60 * 60 * 24, '/', $domain, false);
		return;
	}
}