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

	public $timestamps = false;
}
