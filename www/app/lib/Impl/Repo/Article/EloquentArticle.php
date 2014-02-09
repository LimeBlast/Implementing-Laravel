<?php namespace Impl\Repo\Article;

use Illuminate\Database\Eloquent\Model;
use Impl\Repo\Tag\TagInterface;

class EloquentArticle implements ArticleInterface {
	/**
	 * Retrieve article by id
	 * regardless of status
	 *
	 * @param  int $id Article ID
	 *
	 * @return object Object of article information
	 */
	public function byId($id)
	{
		return $this->article->with('status')
			->with('tags')
			->where('id', $id)
			->first();
	}

	protected $article;
	protected $tag;

	// Class dependency: Eloquent model and implementation of TagInterface
	public function __construct(Model $article, TagInterface $tag)
	{
		$this->article = $article;
		$this->tag     = $tag;
	}

	/**
	 * Get paginated articles.
	 *
	 * @param int $page  Current Page.
	 * @param int $limit Number of articles per page.
	 *
	 * @return object Object with $items and $totalItems for pagination.
	 */
	public function byPage($page = 1, $limit = 10)
	{
		$result = new \StdClass;

		$result->page       = $page;
		$result->limit      = $limit;
		$result->totalItems = 0;
		$result->items      = [];

		$articles = $this->article
			->with('tags')
			->where('status_id', 1)
			->orderBy('created_at', 'desc')
			->skip($limit * ($page - 1))
			->take($limit)
			->get();

		// Create object to return data useful for pagination
		$result->items      = $articles->all();
		$result->totalItems = $this->totalArticles();

		return $result;
	}

	/**
	 * Get single article by URL.
	 *
	 * @param string $slug URL slug or article.
	 *
	 * @return object Object of article information.
	 */
	public function bySlug($slug)
	{
		// Include tags using Eloquent relationships
		return $this->article
			->with('tags')
			->where('status_id', 1)
			->where('slug', $slug)
			->first();
	}

	/**
	 * Get articles by their tag
	 *
	 * @param string $tag   URL slug of tag.
	 * @param int    $page  Current page.
	 * @param int    $limit Number of articles per page.
	 *
	 * @return object Object with $items and $totalItems for pagination.
	 */
	public function byTag($tag, $page = 1, $limit = 10)
	{
		$foundTag = $this->tag
			->where('slug', $tag)
			->first();

		$result = new \StdClass;

		$result->page       = $page;
		$result->limit      = $limit;
		$result->totalItems = 0;
		$result->items      = [];

		if (! $foundTag) {
			return $result;
		}

		$articles = $this->tag->articles()
			->where('articles.status_id', 1)
			->orderBy('articles.created_at', 'desc')
			->skip($limit * ($page - 1))
			->take($limit)
			->get();

		$result->totalItems = $this->totalByTag($tag);
		$result->items      = $articles->all();

		return $result;
	}

	/**
	 * Get total article count
	 *
	 * @return int Total articles
	 */
	protected function totalArticles()
	{
		return $this->article
			->where('status_id', 1)
			->count();
	}

	/**
	 * Get total articles count per tag
	 *
	 * @param string $tag Tag slug
	 *
	 * @return int Total articles per tag
	 */
	protected function totalByTag($tag)
	{
		return $this->tag
			->bySlug($tag)
			->articles()
			->where('status_id', 1)
			->count();
	}
}