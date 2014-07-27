<?php

class Tag extends \Eloquent {

	/**
	 * The attributes that are mass assigned
	 *
	 * @var array
	 */
	protected $fillable = ['tag', 'slug'];

	/**
	 * The database table used by the model
	 *
	 * @var string
	 */
	protected $table = 'tags';

	/**
	 * Indicates if the model should be timestamped
	 *
	 * @var bool
	 */
	public $timestamps = false;

	/**
	 * Define a many-to-many relationship
	 *	 
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function articles()
	{
		return $this->belongsToMany('Article', 'articles_tags', 'tag_id',
			'article_id');
	}
}
