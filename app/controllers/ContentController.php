<?php


use Impl\Repo\Article\ArticleInterface;


class ContentController extends \BaseController 
{
	protected $article;

	// Class Dependancy: Sublclass of ArticleInterface
	protected function __construct(ArticleInterface $article)
	{
		$this->article = $article;
	}

	// Home page for content
	public function index()
	{
		$page = Input::get('page', 1);
		$perPage = 10;

		// Get 10 latest articles with pagination
		// Still get "arrayable" collection of articles
		$pagiData = $this->article->byPage($page, $perPage);

		// Pagination made here, it's not the responsibility
		// of the repository. See section on cacheing layer.
		$articles = Paginator::make($pagiData->items, $pagiData->totalItems, $perPage);

		return View::make('content.index')->with('articles', $articles);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /contentcontainer/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /contentcontainer
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /contentcontainer/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /contentcontainer/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /contentcontainer/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /contentcontainer/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
