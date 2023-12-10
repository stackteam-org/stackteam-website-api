<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy("created_at","desc")->paginate(10);
        return view("dashboard.category.index", compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.category.create");
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

        Category::create([
            'name' => $request->name,
            'text' => $request->text,
            'lang' => $request->lang,

        ]);
        return redirect()->route('dashboard.category.index')->with('success','Company has been created successfully.');

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
    public function edit(Category $category)
    {
        return view('dashboard.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name'       => 'required',
            'lang'       => 'required',
            'text'       => 'required',
        ]);
        
        // Update article
        $category->update([
            'name'       => $validated['name'],
            'lang'       => $validated['lang'],
            'text'       => $validated['text'],
        ]);
    
        // Redirect to a given route with flash message
        return redirect()->route('dashboard.category.index')->with('success', 'Article updated successfully.');
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('dashboard.category.index')->with('success', 'Article deleted successfully.');
    }
}
