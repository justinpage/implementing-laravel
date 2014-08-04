<?php
use Impl\Repo\Article\ArticleInterface;


class ContentController extends \BaseController 
{
	protected $article;

	// Class Dependancy: Sublclass of ArticleInterface
	public function __construct(ArticleInterface $article)
	{
		$this->article = $article;
	}

	// Home page for content
	public function index()
	{
		// Get page, default to 1 if not present
		$page = Input::get('page', 1);

		// candidate for config item
		$perPage = 3;

		// Include which $page we are currently on
		$pagiData = $this->article->byPage($page);

		$articles = Paginator::make(
			$pagiData->items, 
			$pagiData->totalItems,
			$perPage
		);

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
