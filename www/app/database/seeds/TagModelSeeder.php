<?php

class TagModelSeeder extends DatabaseSeeder {

	public function run()
	{
		$tags = [];

		foreach (range(1, 5) as $i) {
			$tags[] = [
				'tag'  => "Tag {$i}",
				'slug' => "tag-{$i}"
			];
		};

		// create records
		foreach ($tags as $tag) {
			Tag::create($tag);
		}
	}
}