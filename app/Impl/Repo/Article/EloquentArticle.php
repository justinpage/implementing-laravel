<?php namespace Impl\Repo\Article;

use Impl\Repo\RepoAbstract;
use Impl\Repo\Tag\TagInterface;
use Illuminate\Database\Eloquent\Model;

class EloquentArticle extends RepoAbstract implements ArticleInterface {

	protected $model;
	protected $tag;

	// Class dependency: Eloquent model and
	// implementation of TagInterface
	public function __construct(Model $article, TagInterface $tag)
	{
		$this->article = $article;
		$this->tag = $tag;
	}

	/**
	 * Get paginated articles
	 *
	 * @param int Current Page
	 * @param int Number of articles per page
	 * @return StdClass Object with $items and $totalItems for pagination
	 */
	public function byPage($page=1, $limit=10)
	{
		$result = new \StdClass;
		$result->page = $page;
		$result->limit = $limit;
		$result->totalItems = 0;
		$result->items = [];

		$articles = $this->article->with('tags')
			->where('status_id', 1)
			->orderBy('created_at', 'desc')
			->skip($limit * ($page - 1))
			->take($limit)
			->get();

		// Create object to return data useful
		// for pagination
		$result->items = $articles->all();
		$result->totalItems = $this->totalArticles();

		return $result;
	}

	/**
	 * Get single article by URL
	 *
	 * @param string URL slug of article
	 * @return object Object of article information
	 */
	public function bySlug($slug)
	{
		return $this->article->with('tags')
			->where('status_id', 1)
			->where('slug', $slug)
			->first();
	}

	/**
	 * Get articles by their tag
	 *
	 * @param string URL slug of tag
	 * @param int Current Page
	 * @param int Number of articles per page
	 * @return object Object with $items and $totalItems for pagination
	 */
	public function byTag($tag, $page=1, $limit=10)
	{
		$foundTag = $this->tag->where('slug', $tag)->first();

		$result = new \StdClass;
		$result->page = $page;
		$result->limit = $limit;
		$result->totalItems = 0;
		$result->items = [];

		if(!$foundTag)
		{
			return $result;
		}
		$articles = $this->tag->articles()
			->where('articles.status_id', 1)
			->orderBy('articles.created_at', 'desc')
			->skip($limit * ($page - 1))
			->take($limit)
			->get();

		// Create object to return data useful
		// for pagination
		$result->items = $articles->all();
		$result->totalItems = $this->totalByTag($tag);

		return $result;

	}

	/**
	 * Get total article count
	 *
	 * @return int Total articles
	 */
	protected function totalArticles()
	{
		return $this->article->where('status_id', 1)->count();
	}

	/**
	 * Get total article count per tag
	 *
	 * @return int Total articles
	 */
	protected function totalByTag($tag)
	{
		return $this->tag->bySlug($tag)
			->articles()
			->where('status_id', 1)
			->count();
	}
}
