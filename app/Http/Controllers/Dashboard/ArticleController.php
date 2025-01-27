<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::withoutglobalScopes()->orderBy("created_at","desc")->paginate(10);
        return view("dashboard.article.index", compact("articles"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy("created_at","desc")->get();
        $tags = Tag::orderBy("created_at","desc")->get();
        return view("dashboard.article.create", compact("categories","tags"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'subtext' => 'required',
            'text' => 'required',
            'category_id' => 'required',
            'read_time' => 'required',
            'lang' => 'required',

        ]);
        $textArray = json_encode($request->text, true); // تبدیل JSON به آرایه انجام می‌شود
        $author_id = auth()->user()->id;
   

        $article = Article::create([
            'name' => $request->name,
            'title' => $request->title,
            'subtext' => $request->subtext,
            'text' => $request->text,
            'category_id' => $request->category_id,
            'read_time' => $request->read_time,
            'lang' => $request->lang,
            'author_id' =>  $author_id ,
            'published' => $request->status

        ]);
        $article->tags()->attach($request->tags);

        if ($request->hasFile('avatar')) {
            $filename = $article->id . '.' . $request->file('avatar')->getClientOriginalExtension();
            $request->file('avatar')->storeAs('articles', $filename, 'public');
        }


        return redirect()->route('dashboard.article.index')->with('success','Company has been created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $categories = Category::orderBy("created_at","desc")->get();
        $tags = Tag::orderBy("created_at","desc")->get();
        return view('dashboard.article.edit', compact('article','categories',"tags"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        // Validate data
        $validated = $request->validate([
            'name'       => 'required',
            'title'      => 'required',
            'category_id'=> 'required',
            'lang'       => 'required',
            'read_time'  => 'required',
            'subtext'    => 'required',
            'text'       => 'required',
            'status'     => 'required',
        ]);
        // Update article
        $article->update([
            'name'       => $validated['name'],
            'title'      => $validated['title'],
            'category_id'=> $validated['category_id'],
            'lang'       => $validated['lang'],
            'read_time'  => $validated['read_time'],
            'subtext'    => $validated['subtext'],
            'text'       => $validated['text'],
            'published'  => $validated['status'],
        ]);
        // Redirect to a given route with flash message
        return redirect()->route('dashboard.article.index')->with('success', 'Article updated successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::withoutglobalScopes()->find( $id );
        $article->delete();
        return redirect()->route('dashboard.article.index')->with('success', 'Article deleted successfully.');
    }
}
