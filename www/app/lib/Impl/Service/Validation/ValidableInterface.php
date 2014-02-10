<?php namespace Impl\Service\Validation;

interface ValidableInterface {

	/**
	 * Set data to the validate
	 *
	 * @param array $input
	 *
	 * @return \Impl\Service\Validation\ValidableInterface
	 */
	public function with(array $input);

	/**
	 * Test if validation passes
	 *
	 * @return boolean
	 */
	public function passes();

	/**
	 * Retrieve validation errors
	 *
	 * @return array
	 */
	public function errors();

}