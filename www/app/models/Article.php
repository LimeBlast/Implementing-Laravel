<?php

/**
 * An Eloquent Model: 'Article'
 *
 * @property integer        $id
 * @property integer        $user_id
 * @property integer        $status_id
 * @property string         $title
 * @property string         $slug
 * @property string         $excerpt
 * @property string         $content
 * @property \Carbon\Carbon $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Article extends Eloquent {

}