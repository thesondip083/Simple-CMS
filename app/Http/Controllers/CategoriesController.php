<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use Session;
use App\Post;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.admin.categories.allcategories')->with('all_category',category::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('auth.admin.categories.category_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request,[
           'cat_name'=>'required'
        ]);
        $cat=new category;
        $cat->name=$request->cat_name;
        $cat->save();
        Session::flash('msg','Cool!!You just created a new category!');
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=category::find($id);

        return view('auth.admin.categories.update_cat_name')->with('data',$data);
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

       

        $this->validate($request,[
           'updatedname'=>'required'
        ]);

        $category=category::find($id);
        $category->name=$request->updatedname;
        $category->save();
        Session::flash('msg','Awesome!!You just Updated a name!');
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del=category::find($id);
        foreach ($del->posts as $post) { //category na thakleeee post thakbe naaaa...allahhh
            $post->forceDelete();
        }


        $del->delete();
        Session::flash('del_msg','You just deleted a category!');
        return redirect()->route('category.index');   
    }
}
