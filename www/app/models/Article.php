<?php

/**
 * An Eloquent Model: 'Article'
 *
 * @property integer                                              $id
 * @property integer                                              $user_id
 * @property integer                                              $status_id
 * @property string                                               $title
 * @property string                                               $slug
 * @property string                                               $excerpt
 * @property string                                               $content
 * @property \Carbon\Carbon                                       $deleted_at
 * @property \Carbon\Carbon                                       $created_at
 * @property \Carbon\Carbon                                       $updated_at
 * @property-read \User                                           $author
 * @property-read \Status                                         $status
 * @property-read \Illuminate\Database\Eloquent\Collection|\Tag[] $tags
 */
class Article extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'articles';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = array(
		'user_id',
		'status_id',
		'title',
		'slug',
		'excerpt',
		'content',
	);

	/**
	 * Indicates if the model should soft delete.
	 *
	 * @var bool
	 */
	protected $softDelete = true;

	/**
	 * Define a one-to-one relationship.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function author()
	{
		return $this->belongsTo('User');
	}

	/**
	 * Define a one-to-one relationship.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function status()
	{
		return $this->belongsTo('Status');
	}

	/**
	 * Define a many-to-many relationship.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function tags()
	{
		return $this->belongsToMany('Tag', 'articles_tags', 'article_id', 'tag_id');
	}

}