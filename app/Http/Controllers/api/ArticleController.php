<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\TechnologyCategory;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $articlesQuery = Article::query();

        if ($request->has('author')) {
            $articlesQuery->whereHas('author', function ($query) use ($request) {
                $query->where('id', $request->input('author'));
            });
        }

        if ($request->has('category')) {
            $articlesQuery->whereHas('category', function ($query) use ($request) {
                $query->where('id', $request->input('category'));
            });
        }

        if ($request->has('tags')) {
            $tags = explode(',', $request->input('tags'));
            $articlesQuery->whereHas('tags', function ($query) use ($tags) {
                $query->whereIn('id', $tags);
            });
        }

        if ($request->has('popular') && $request->input('popular') == 'true') {
            $articlesQuery->orderBy('visit', 'desc');
        }

        $count = $request->input('count', 10); 
        $articles = $articlesQuery->with(['author', 'category', 'tags'])
                                  ->paginate($count);

        return response()->json($articles);

    }


    public function searchArticles(Request $request)
    {
        if (!$request->has('search')) {
            return response()->json(['message' => 'No query provided'], 400);
        }

        $searchTerm = $request->query('search');

        $articles = Article::where('title', 'LIKE', '%' . $searchTerm . '%')
                            ->orWhere('text', 'LIKE', '%' . $searchTerm . '%')
                            ->get();

        return response()->json($articles);
    }

    public function setLike(Request $request)
    {
        $articleId = $request->article_id;

        if (!is_numeric($articleId) || $articleId <= 0) {
            return response()->json(['success' => false], 400);
        }

        $article = Article::find($articleId);
        if (!$article) {
            return response()->json(['success' => false], 404);
        }

        $likeSet = $article->like(); 
        return response()->json(['success' => $likeSet]);
    }

    public function getArticlesByCategory($category_id)
    {
        //$category = TechnologyCategory::find($category_id)->articles()->get();
        // $articles = Article::select(['id', 'name'])
        // ->with('technologies')
        // ->get();

        $category = TechnologyCategory::find($category_id)
            ->with('articles')
            ->get();

        return response()->json($category);


        if (!$category)
            return response()->json(['error' => 'Category not found.'], 404);
        
        return response()->json($category);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return response()->json($article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
