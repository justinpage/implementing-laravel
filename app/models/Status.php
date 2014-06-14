<?php

class Status extends \Eloquent {
	/**
	 * The attributes that are mass assigned
	 *
	 * @var array
	 */
	protected $fillable = ['status', 'slug'];

	/**
	 * The database table used by the model
	 *
	 * @var string
	 */
	protected $table = 'statuses';

	/**
	 * Define a many-to-many relationship
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function articles()
	{
		return $this->belongsToMany('Article', 'articles_tags', 'tag_id', 'article_id')->withTimestamps();
	}
}
