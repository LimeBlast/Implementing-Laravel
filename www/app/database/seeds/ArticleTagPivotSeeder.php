<?php

class ArticleTagPivotSeeder extends DatabaseSeeder {

	public function run()
	{
		$insert = [];

		foreach (range(1, 50) as $i) {
			$insert[] = [
				'article_id' => $i,
				'tag_id'     => rand(1, 5)
			];
		};

		DB::table('articles_tags')->insert($insert);
	}

}