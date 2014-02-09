<?php namespace Impl\Service\Cache;

use Illuminate\Cache\CacheManager;

class LaravelCache implements CacheInterface {

	protected $cache;
	protected $cachekey;
	protected $minutes;

	function __construct(CacheManager $cache, $cachekey, $minutes)
	{
		$this->cache    = $cache;
		$this->cachekey = $cachekey;
		$this->minutes  = $minutes;
	}

	/**
	 * Retrieve data from cache
	 *
	 * @param string $key Cache item key
	 *
	 * @return mixed PHP data result of cache
	 */
	public function get($key)
	{
		return $this->cache->section($this->cachekey)->get($key);
	}

	/**
	 * Add data to the cache
	 *
	 * @param string  $key     Cache item key
	 * @param mixed   $value   The data to store
	 * @param integer $minutes The number of minutes to store the item
	 *
	 * @return mixed $value variable returned for convenience
	 */
	public function put($key, $value, $minutes = null)
	{
		if (is_null($minutes)) {
			$minutes = $this->minutes;
		}

		return $this->cache->section($this->cachekey)->put($key, $value, $minutes);
	}

	/**
	 * Test if item exists in cache
	 *
	 * @param string $key Cache item key
	 *
	 * @return boolean If cache item exists
	 */
	public function has($key)
	{
		return $this->cache->section($this->cachekey)->has($key);
	}
}