<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Article extends \Eloquent {
	use SoftDeletingTrait;

	/**
	 * The database table used by the model
	 *
	 * @var string
	 */
	protected $table = 'articles';

	/**
	 * The attributes that are mass assingable
	 *
	 * @var array
	 */
	protected $fillable = [
		'user_id',
		'status_id',
		'title',
		'slug',
		'excerpt',
		'content',
	];

	protected $dates = ['deleted_at'];

	/**
	 * Define a one-to-many relationship
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function author()
	{
		return $this->belongsTo('User');
	}

	/**
	 * Define a one-to-many relationship
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function status()
	{
		return $this->belongsTo('Status');
	}

	/**
	 * Define a many-to-many relationship
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function tags()
	{
		return $this->belongsToMany('Tag', 'articles_tags', 'article_id', 'tag_id')->withTimestamps();
	}
}
