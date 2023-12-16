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

        
        if ($request->has('lang')) {
            $articlesQuery->where('lang',$request->input('lang') );
        }else{
            $articlesQuery->where('lang','en');
        }

        if ($request->has('popular') && $request->input('popular') == 'true') {
            $articlesQuery->orderBy('visit', 'desc');
        }

        $count = $request->input('count', 10); 
        $pagination = $articlesQuery->with(['author', 'category', 'tags'])
                                  ->paginate($count);

         // return response()->json($articles);
        // تفکیک اطلاعات پیجینیشن

    $response = [
        'data' => $pagination->items(),
        'meta' => [
            'current_page' => $pagination->currentPage(),
            'last_page'    => $pagination->lastPage(),
            'per_page'     => $pagination->perPage(),
            'total'        => $pagination->total(),
            'from'         => $pagination->firstItem(),
            'to'           => $pagination->lastItem(),
        ],
        'links' => [
            'first_page_url' => $pagination->url(1),
            'last_page_url'  => $pagination->url($pagination->lastPage()),
            'next_page_url'  => $pagination->nextPageUrl(),
            'prev_page_url'  => $pagination->previousPageUrl(),
        ]
    ];

    return response()->json($response);

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

    public function getArticlesByCategory(Request $request)
    {
    
        $category = TechnologyCategory::where('id',$request ->category_id)
            ->with('Technologies')
            ->get();

        if (!$category)
            return response()->json(['error' => 'Category not found.'], 404);
        
        return response()->json($category);
    }
   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::with(['author','category','tags'])->findOrFail($id);
        $article->visit();
        return response()->json($article);
    }

}
