<?php

Class Auth extends Controller
{
	public function login ()
	{
		return $this->view('auth/auth');
	}

	public function register ()
	{
		$data = ['register' => 'register'];
		return $this->view("auth/auth", $data);
	}

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
		$check = $u_model->getByEmail($_POST['email']);
		if(!empty($check)) {
				return $this->view('auth/auth', ['register' => 'register', 'error' => 'Email already taken!']);	
		}
		//Add user.
		$user = $u_model->add($_POST['name'], $_POST['email'], md5($_POST['password']));
		//Return with sicces message.
		//Initialize session and set cookie.
		$_SESSION['user'] = $user;
		$res = setcookie("user", json_encode($user), time()+ 60 * 60 * 24);
		// Redirect to home page.
		return $this->view('home/index', ['message' => 'Success registration!']);
	}

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
		$pass = md5($_POST['password']);
		$user = $u_model->getByEmailAndPass($_POST['email'], $pass);

		if (empty($user)) {
			return $this->view('auth/auth', ['error' => 'Credentials not much!']);
		}
		//Initialize session and set cookie.
		$_SESSION['user'] = $user;
		$res = setcookie("user", json_encode($user), time()+ 60 * 60 * 24);	
		//Redirect to main page.
		return $this->view('home/index', ['message' => 'Welcome on the site!']);
	}

	public function logout ()
	{	
		unset($_SESSION['user']);
		unset($_COOKIE['user']);
		return $this->view('home/index');
	}
}