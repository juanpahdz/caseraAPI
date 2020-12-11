<?php namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	public $animalPost =[
		'nombre' => 'required|alpha',
		'tipo' => 'required',
		'edad' => 'required',
		'descripcion' => 'required',
		'comida' => 'required',
		'imagen' => 'required'
	];

	public $animalPUT = [
		'nombre' => 'required|alpha',
		'edad' => 'required',
		'descripcion' => 'required',
		'comida' => 'required',
		'tipo' => 'required',
	];
	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
}
