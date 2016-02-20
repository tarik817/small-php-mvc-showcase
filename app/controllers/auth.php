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
}