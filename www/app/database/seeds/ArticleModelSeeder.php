<?php

class ArticleModelSeeder extends DatabaseSeeder {
	public function run()
	{
		// set-up faker users
		$faker = Faker\Factory::create();

		for ($i = 0; $i < rand(10, 50); $i ++) {
			$articles[] = [
				'title'   => $faker->sentence(rand(4, 20)),
				'slug'    => $faker->uuid,
				'excerpt' => $faker->sentence(rand(30, 100)),
				'content' => $faker->paragraph(rand(3, 10)),
			];
		}

		// create users
		foreach ($articles as $article) {
			Article::create($article);
		}
	}
}