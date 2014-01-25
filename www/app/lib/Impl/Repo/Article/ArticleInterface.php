<?php namespace Impl\Repo\Article;

interface ArticleInterface {

	/**
	 * Get paginated articles.
	 *
	 * @param int $page  Current Page.
	 * @param int $limit Number of articles per page.
	 *
	 * @return object Object with $items and $totalItems for pagination.
	 */
	public function byPage($page = 1, $limit = 10);

	/**
	 * Get single article by URL.
	 *
	 * @param string $slug URL slug or article.
	 *
	 * @return object Object of article information.
	 */
	public function bySlug($slug);

	/**
	 * Get articles by their tag
	 *
	 * @param string $tag   URL slug of tag.
	 * @param int    $page  Current page.
	 * @param int    $limit Number of articles per page.
	 *
	 * @return object Object with $items and $totalItems for pagination.
	 */
	public function byTag($tag, $page = 1, $limit = 10);

}