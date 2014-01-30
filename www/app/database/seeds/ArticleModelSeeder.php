<?php

class ArticleModelSeeder extends DatabaseSeeder {

	public function run()
	{
		// set-up faker
		$faker = Faker\Factory::create();

		foreach (range(1, 50) as $i) {
			$articles[] = [
				'status_id' => 1, // I'll fix this once I've got the Status model seeder sorted, but this will do for now
				'title'     => $faker->sentence(rand(4, 20)),
				'slug'      => $faker->uuid,
				'excerpt'   => $faker->sentence(rand(30, 100)),
				'content'   => $faker->paragraph(rand(3, 10)),
			];
		}

		// create records
		foreach ($articles as $article) {
			Article::create($article);
		}
	}
}