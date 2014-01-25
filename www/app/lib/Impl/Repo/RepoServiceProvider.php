<?php namespace Impl\Repo;

use Article;
use Impl\Repo\Tag\EloquentTag;
use Impl\Repo\Article\EloquentArticle;
use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider {

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind('Impl\Repo\Tag\TagInterface', function ($app) {
			return new EloquentTag(new Tag);
		});

		$this->app->bind('Impl\Repo\Article\ArticleInterface', function ($app) {
			return new EloquentArticle(
				new Article,
				$app->make('Impl\Repo\Tag\TagInterface')
			);
		});
	}
}