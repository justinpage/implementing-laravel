<?php namespace Impl\Repo\Tag;

use Impl\Repo\RepoAbstract;
use Illuminate\Database\Eloquent\Model;
use Impl\Service\Cache\CacheInterface;

class EloquentTag extends RepoAbstract implements TagInterface {

	protected $tag;
	protected $cache;

	public function __construct(Model $tag, CacheInterface $cache)
	{
		$this->tag = $tag;
		$this->cache = $cache;
	}

	/**
	 * Find exisitng tags or create if they don't exist
	 *
	 * @param array $tags Array of strings, each representing a tag
	 * @return array	  Array or Arrayable collection of Tag objects
	 */
	public function findOrCreate(array $tags)
	{
		$foundTags = $this->tag->whereIn('tag', $tags)->get();
		$returnTags = [];

		if ($foundTags) {
			foreach ($foundTags as $tag) {
				$pos = array_search($tag->tag, $tags);

				// Add returned tags to array
				if ($pos !== false) {
					$returnTags[] = $tag;
					unset($tags[$pos]);
				}
			}
		}

		foreach ($tags as $tag) {
			$returnTags[] = $this->tag->create([
				'tag' => $tag,
				'slug' => $this->slug($tag),
			]);
		}

		return $returnTags;
	}
}
