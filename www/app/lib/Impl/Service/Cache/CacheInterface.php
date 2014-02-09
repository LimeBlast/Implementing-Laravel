<?php namespace Impl\Service\Cache;


interface CacheInterface {

	/**
	 * Retrieve data from cache
	 *
	 * @param string $key Cache item key
	 *
	 * @return mixed PHP data result of cache
	 */
	public function get($key);

	/**
	 * Add data to the cache
	 *
	 * @param string  $key     Cache item key
	 * @param mixed   $value   The data to store
	 * @param integer $minutes The number of minutes to store the item
	 *
	 * @return mixed $value variable returned for convenience
	 */
	public function put($key, $value, $minutes = null);

	/**
	 * Test if item exists in cache
	 *
	 * @param string $key Cache item key
	 *
	 * @return boolean If cache item exists
	 */
	public function has($key);

}