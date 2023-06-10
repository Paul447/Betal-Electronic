<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= Category::with('ds')
        ->where('status','=','approved')
        ->get();


        return view('admin.Category.ViewCategory')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $url ="/admin/category/";
        $title="Add Category";
         $cat= Category::where('status','=','approved')->get();
        $data = compact('title','url','cat');

        return view('admin.Category.AddCategory')->with($data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //    var_dump($request->input());
        $request->validate(
           [
            'category_name'=>'required|alpha_dash',
             'parent'=>'required|numeric',
           ]
        );
        $addedby = session('user')['id'];
        if (session('user')['role'] == 'Admin' || session('user')['role'] == 'SuperAdmin')
        {

            Category::create(array_merge($request->all(),['addedby'=>$addedby,'approvedby'=>$addedby,'status'=>'approved']));
            return redirect('/admin/category/');
        }
        else
        {
            Category::create(array_merge($request->all(),['addedby'=>$addedby]));
            return redirect('/admin/category/');
        }

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
    public function edit($id)
    {
         $url="/admin/category/$id";
         $title = "Update Category";
         $cat = Category::with('ds')->get();
         $data = Category::find($id);
         return view('admin.Category.AddCategory')->with(compact('url','title','cat','data'));

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
        $request->validate(
            [
             'category_name'=>'required|alpha_dash',
              'parent'=>'required|numeric',
            ]
         );
         $updatedby = session('user')['id'];
         $category = Category::find($id);
         if (session('user')['role'] == 'Admin' || session('user')['role'] == 'SuperAdmin')
         {

             $category->update(array_merge($request->all(), ['updatedby' => $updatedby, 'updateapprovedby' => $updatedby, 'updatestatus' => "approved"]));
             return redirect('/admin/category/');
         }
         else
         {
             Category::create(array_merge($request->all(),['updatedby'=>$updatedby, 'updatestatus' => 'pending']));
             return redirect('/admin/category/');
         }

         $category->update($request->all());
         return redirect('/admin/category/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $category = Category::find($id);

       $category->delete();
       return redirect('/admin/category/');
    }
}
