<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::orderBy("created_at","desc")->paginate(10);
        return view("dashboard.tag.index", compact("tags"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy("created_at","desc")->get();
        return view("dashboard.tag.create", compact("categories"));
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
            'text' => 'required',
            'lang' => 'required',

        ]);
        $author_id = auth()->user()->id;

        Tag::create([
            'name' => $request->name,
            'text' => $request->text,
            'category_id' => $request->category_id,
            'lang' => $request->lang,

        ]);
        return redirect()->route('dashboard.tag.index')->with('success','Company has been created successfully.');

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
    public function edit(Tag $tag)
    {
        $categories = Category::orderBy("created_at","desc")->get();   
        return view('dashboard.tag.edit', compact('tag','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $validated = $request->validate([
            'name'       => 'required',
            'category_id'=> 'required',
            'lang'       => 'required',
            'text'       => 'required',
        ]);
    
        // Update article
        $tag->update([
            'name'       => $validated['name'],
            'category_id'=> $validated['category_id'],
            'lang'       => $validated['lang'],
            'text'       => $validated['text'],
        ]);
    
        // Redirect to a given route with flash message
        return redirect()->route('dashboard.tag.index')->with('success', 'Article updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('dashboard.tag.index')->with('success', 'Article deleted successfully.');
    }
}
