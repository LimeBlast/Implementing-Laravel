<?php

use \Impl\Service\Validation\ArticleLaravelValidator;

class ArticleController extends BaseController {

	protected $validator;

	/**
	 * @param ArticleLaravelValidator $validator
	 */
	function __construct(ArticleLaravelValidator $validator)
	{
		$this->validator = $validator;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('articles.create', [
			'input' => Input::old()
		]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if ($this->validator->with(Input::all())->passes()) {
			// todo: code to create new article
		} else {
			return View::make('articles.create')
				->withInput(Input::all())
				->withErrors($this->validator->errors());
		}
	}

}
