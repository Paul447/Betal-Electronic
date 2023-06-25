<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Variation;
use App\Models\Admin\Category;
use Illuminate\Support\Facades\DB;

class VariationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Variation::where('status', '=', 'approved')->get();

        return view('admin.Varition.ViewVarition')->with(compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $url = "/admin/variation/";
        $title = "Add Varition";
        $category = Category::where('status', '=', 'approved');
        $data = compact('url', 'title', 'category');
        return view('admin.Varition.AddVarition')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // print_r($request->input());
        $request->validate(
            [
                'variation_name' => 'required|alpha_dash',
            ]
        );



        $addedby = session('user')['id'];
        if (session('user')['role'] == 'Admin') {

            Variation::create(array_merge($request->all(), ['addedby' => $addedby, 'approvedby' => $addedby, 'status' => 'approved']));
            return redirect('/admin/variation/');
        } else {
            Variation::create(array_merge($request->all(), ['addedby' => $addedby]));
            return redirect('/admin/variation/');
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
        $url = "/admin/variation/$id";
        $title = "Edit Variation";
        $category = Category::where('status', '=', 'approved');
        $data = Variation::find($id);

        return view('admin.Varition.AddVarition')->with(compact('url', 'title', 'category', 'data'));
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
        // $request->validate(
        // [
        //    'variation_name'=>'required|alpha_dash',
        //    'category'=>'required|numeric,'
        // ]
        // );




        $updatedby = session('user')['id'];
        $variation = Variation::find($id);
        if (session('user')['role'] == 'Admin') {

            $variation->update(array_merge($request->all(), ['updatedby' => $updatedby, 'updateapprovedby' => $updatedby, 'updatestatus' => "approved"]));
            return redirect('/admin/variation/');
        } else {
            $variation->update(array_merge($request->all(), ['updatedby' => $updatedby, 'updatestatus' => 'pending']));
            return redirect('/admin/variation/');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $variation = Variation::find($id);
        $variation->delete();
        return redirect('/admin/variation');
    }
}
