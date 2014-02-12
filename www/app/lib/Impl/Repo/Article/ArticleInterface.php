<?php namespace Impl\Repo\Article;

interface ArticleInterface {

	/**
	 * Retrieve article by id
	 * regardless of status
	 *
	 * @param  int $id Article ID
	 *
	 * @return object Object of article information
	 */
	public function byId($id);

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

	/**
	 * Create a new article
	 *
	 * @param array $data Data to create a new object
	 *
	 * @return boolean
	 */
	public function create(array $data);

	/**
	 * Update an existing article
	 *
	 * @param array $data Data to update an article
	 *
	 * @return boolean
	 */
	public function update(array $data);

}