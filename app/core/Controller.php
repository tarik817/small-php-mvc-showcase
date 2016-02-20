<?php

class Controller 
{
	/**
	 * Default method.
	 * 
	 * @return void.
	 */
	public function index()
	{
		return $this->view('errors/404');
	}

	/**
	 * Open model.
	 * 
	 * @param string case sencetive name of the class.
	 * 
	 * @return object.
	 */
	public function model($model)
	{
		//Check if given model exist. 
		if( file_exists('../app/models/' . $model . '.php')){
			//Plug DB access class.
			require_once '../app/database/connection.php';
			//Plug model.
			require_once '../app/models/' . $model . '.php';
			return new $model;
		}
		//If model does not exist - throw exeption.
		throw new Exception('You have not model with name ' . $model );
	}

	/**
	 * Open view.
	 * 
	 * @param string case sencetive name of the class.
	 * @param array $data array of parameters.
	 * 
	 * @return void
	 */
	public function view($view, $data = [])
	{
		//Check if given view exist. 
		if( file_exists('../app/views/' . $view . '.php')){
			require_once '../app/views/' . $view . '.php';
			return;
		}
		//If view does not exist - throw exeption.
		throw new Exception('You have not view with name ' . $view );
	}

}