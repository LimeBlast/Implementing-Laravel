<?php namespace Impl\Repo;

use Article;
use Impl\Repo\Article\CacheDecorator;
use Impl\Repo\Tag\EloquentTag;
use Impl\Repo\Article\EloquentArticle;
use Illuminate\Support\ServiceProvider;
use Impl\Service\Cache\LaravelCache;

class RepoServiceProvider extends ServiceProvider {

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$app = $this->app;

		$app->bind('Impl\Repo\Article\ArticleInterface', function($app){
			// assign the article repo to a variable
			$article = new EloquentArticle(
				new Article,
				$app->make('Impl\Repo\Tag\TagInterface')
			);

			return new CacheDecorator(
				$article,
				// our new cache service class
				new LaravelCache($app['cache'], 'articles', 10)
			);
		});

		$app->bind('Impl\Repo\Tag\TagInterface', function ($app) {
			return new EloquentTag(new Tag);
		});
	}
}