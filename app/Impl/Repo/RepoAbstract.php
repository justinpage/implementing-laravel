<?php namespace Impl\Repo;

abstract class RepoAbstract
{
	/**
	 * Make string "slug-friendly" for URLs
	 * @param string $string Human-firendly tag
	 * @return string Computer-friendly tag
	 *
	 */
	protected function slug($string)
	{
		return filter_var(str_replace('', '-', strtolower(trim($string))), FILTER_SANITIZE_URL);
	}
}

