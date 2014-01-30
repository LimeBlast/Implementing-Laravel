<?php

use Impl\Repo\Article\ArticleInterface;

class ContentController extends BaseController {

	protected $article;

	// Class Dependency: Subclass of ArticleInterface
	function __construct(ArticleInterface $article)
	{
		$this->article = $article;
	}

	// Home page route
	public function home()
	{
		$page    = Input::get('page', 1);
		$perPage = 10;

		// Get 10 latest articles with pagination, still get "arrayable" collection of articles
		$paginationData = $this->article->byPage($page, $perPage);

		// Pagination made here, it's not the responsibility of the repository. See section of cacheing layer.
		$articles = Paginator::make(
			$paginationData->items,
			$paginationData->totalItems,
			$perPage
		);

		return $articles;

	}

}