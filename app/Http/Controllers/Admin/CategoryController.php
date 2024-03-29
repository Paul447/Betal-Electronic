<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Models\Admin\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Paginator::useBootstrap();
        $data = Category::with('ds')
            ->where('status', '=', 'approved')
            ->Paginate(5);

        return view('admin.Category.ViewCategory')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $url = "/admin/category/";
        $title = 'Add Category';
        $cat = Category::where('status', '=', 'approved')->get();
        $data = compact('title', 'url', 'cat');

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
        $request->validate([
            'category_name' => 'required|alpha_dash',
            'parent' => 'required|numeric',
        ]);
        $addedby = Auth::guard()->user()->id;
        if (Auth::guard()->user()->role == 'Admin') {
            $file = $request->file('categorythumbnail');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/categorythumbnail', $filename);
            Category::create(array_merge($request->all(), ['categorythumbnail' => $filename, 'addedby' => $addedby, 'approvedby' => $addedby, 'status' => 'approved', 'slug' => Str::slug($request->category_name)]));
            session()->put('AdminSuccess', 'Category Added');
            return redirect('/admin/category/');
        } else {
            $file = $request->file('categorythumbnail');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/storage/categorythumbnail/', $filename);
            Category::create(array_merge($request->all(), ['categorythumbnail' => $filename, 'addedby' => $addedby]));
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
        $url = "/admin/category/$id";
        $title = 'Update Category';
        $cat = Category::with('ds')->get();
        $data = Category::find($id);
        return view('admin.Category.AddCategory')->with(compact('url', 'title', 'cat', 'data'));
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
        $request->validate([
            'category_name' => 'required|',
            'parent' => 'required|numeric',
        ]);
        $updatedby = Auth::guard()->user()->id;
        $category = Category::find($id);
        if (Auth::guard()->user()->role == 'Admin') {
            $file = $request->file('categorythumbnail');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/storage/categorythumbnail/', $filename);
            $image_name = Category::where('categorys_id', $id)->value('categorythumbnail');
            $image_path = public_path('/storage/categorythumbnail/' . $image_name);
            if (file_exists($image_path)) {
                unlink($image_path);
            }
            $category->update(array_merge($request->all(), ['categorythumbnail' => $filename, 'updatedby' => $updatedby, 'updateapprovedby' => $updatedby, 'updatestatus' => 'approved']));
            session()->put('AdminFaliure', 'Category Updated');
            return redirect('/admin/category/');
        } else {
            $file = $request->file('categorythumbnail');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/storage/categorythumbnail/', $filename);

            $image_name = Category::where('categorys_id', $id)->value('categorythumbnail');
            $image_path = public_path('/storage/categorythumbnail/' . $image_name);
            if (file_exists($image_path)) {
                unlink($image_path);
            }
            Category::create(array_merge($request->all(), ['categorythumbnail' => $filename, 'updatedby' => $updatedby, 'updatestatus' => 'pending']));
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
        $image_name = Category::where('categorys_id', $id)->value('categorythumbnail');
        $image_path = public_path('/storage/categorythumbnail/' . $image_name);
        if (file_exists($image_path)) {
            unlink($image_path);
        }
        $category->delete();
        session()->put('AdminFaliure', 'Category Deleted');
        return redirect('/admin/category/');
    }

    public function hidecategory($id)
    {
        $category = Category::find($id);
        $category->is_visible = 1;
        $category->save();
        return back();
    }

    public function showcategory($id)
    {
        $category = Category::find($id);
        $category->is_visible = 0;
        $category->save();
        return back();
    }
}
