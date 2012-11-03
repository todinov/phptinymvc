<?php

class Controller {
	protected $vars;

	function __construct()
	{
		$this->vars = array();
	}

	public function assign($name, $value) {
		$this->vars[$name] = is_object($value) ? $value->fetch() : $value;
	}

	public function view($view)// include a view
	{
		if (is_array($this->vars)) 
		{
			extract($this->vars); // pass variables to the view
		}
		$target = APPPATH.'views/'.$view.'.php';
		if (file_exists($target))
		{
			include $target;
		}
	}

	public function model($model)// include a model
	{
		$target = APPPATH.'models/'.$model.'.php';
		if (file_exists($target))
		{
			include $target;
		}
	}
}