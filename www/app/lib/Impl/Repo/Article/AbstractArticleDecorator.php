<?php namespace Impl\Repo\Article;

abstract class AbstractArticleDecorator implements ArticleInterface {

	protected $nextArticle;

	public function __construct(ArticleInterface $nextArticle)
	{
		$this->nextArticle = $nextArticle;
	}

	public function byId($id)
	{
		return $this->nextArticle->byId($id);
	}

	public function byPage($page = 1, $limit = 10, $all = false)
	{
		return $this->nextArticle->byPage($page, $limit, $all);
	}

	public function bySlug($slug)
	{
		return $this->nextArticle->bySlug($slug);
	}

	public function byTag($tag, $page = 1, $limit = 10)
	{
		return $this->nextArticle->byTag($tag, $page, $limit);
	}

}