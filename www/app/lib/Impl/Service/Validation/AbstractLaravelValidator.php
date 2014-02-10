<?php  namespace Impl\Service\Validation;

use Illuminate\Validation\Factory as Validator;

class AbstractLaravelValidator implements ValidableInterface {

	/**
	 * @var \Illuminate\Validation\Factory
	 */
	protected $validator;

	/**
	 * Validation data key => value array
	 *
	 * @var array
	 */
	protected $data = [];

	/**
	 * Validation errors
	 *
	 * @var array
	 */
	protected $errors = [];

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	protected $rules = [];

	/**
	 * Custom validation messages
	 *
	 * @var array
	 */
	protected $messages = [];

	/**
	 * @param Validator $validator
	 */
	function __construct(Validator $validator)
	{
		$this->validator = $validator;
	}

	/**
	 * Set data to the validate
	 *
	 * @param array $data
	 *
	 * @return \Impl\Service\Validation\AbstractLaravelValidator
	 */
	public function with(array $data)
	{
		$this->data = $data;

		return $this;
	}

	/**
	 * Test if validation passes
	 *
	 * @return boolean
	 */
	public function passes()
	{
		$validator = $this->validator->make(
			$this->data,
			$this->rules,
			$this->messages
		);

		if ($validator->fails()) {
			$this->errors = $validator->messages();
			return false;
		}

		return true;
	}

	/**
	 * Retrieve validation errors
	 *
	 * @return array
	 */
	public function errors()
	{
		return $this->errors;
	}
}