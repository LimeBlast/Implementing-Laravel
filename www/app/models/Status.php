<?php

/**
 * An Eloquent Model: 'Status'
 *
 * @property integer        $id
 * @property string         $status
 * @property string         $slug
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Status extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'statuses';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = array(
		'status',
		'slug',
	);

}