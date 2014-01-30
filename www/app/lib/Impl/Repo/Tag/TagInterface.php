<?php namespace Impl\Repo\Tag;

interface TagInterface {

	/**
	 * Get articles by their tag
	 *
	 * @param string $tag   URL slug of tag.
	 * @param int    $page  Current page.
	 * @param int    $limit Number of articles per page.
	 *
	 * @return object Object with $items and $totalItems for pagination.
	 */
	public function articles();

}