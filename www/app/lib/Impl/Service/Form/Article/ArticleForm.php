<?php namespace Impl\Service\Form\Article;

use Impl\Service\Validation\ValidableInterface;
use Impl\Repo\Article\ArticleInterface;

class ArticleForm {

	/**
	 * Form data
	 *
	 * @var array
	 */
	protected $data;

	/**
	 * Validator
	 *
	 * @var ValidableInterface
	 */
	protected $validator;

	/**
	 * Article repository
	 *
	 * @var ArticleInterface
	 */
	protected $article;

	/**
	 * @param ValidableInterface $validator
	 * @param ArticleInterface   $article
	 */
	public function __construct(ValidableInterface $validator, ArticleInterface $article)
	{
		$this->validator = $validator;
		$this->article   = $article;
	}

	/**
	 * Create a new article
	 *
	 * @param array $input
	 *
	 * @return boolean
	 */
	public function save(array $input)
	{
		if (! $this->valid($input)) {
			return false;
		}

		return $this->article->create($input);
	}

	/**
	 * Update an existing article
	 *
	 * @param array $input
	 *
	 * @return boolean
	 */
	public function update(array $input)
	{
		if (! $this->valid($input)) {
			return false;
		}

		return $this->article->update($input);
	}

	/**
	 * Return any validation errors
	 *
	 * @return array
	 */
	public function errors()
	{
		// TODO: code
	}

	/**
	 * Test if form validator passes
	 *
	 * @param array $input
	 *
	 * @return bool
	 */
	protected function valid(array $input)
	{
		return $this->validator->with($input)->passes();
	}

}