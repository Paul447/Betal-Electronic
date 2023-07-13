<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Models\Admin\Brand;
use App\Models\Admin\User;


class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Paginator::useBootstrap();

        $data = Brand::join('users', 'brands.addedby', '=', 'users.id')
            ->where('brands.status', '=', 'approved')
            ->Paginate(5);


        // print_r($data);
        // die();
        return view('admin.Brand.ViewBrand')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $url = "/admin/brand/";
        $title = "Add Brand";
        $data = compact('title', 'url');
        return view('admin.Brand.AddBrand')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //     $brand_name = $request->get('Brandname');

        //     Brand;
        // $brand = new brand;
        // $brand->name = $request->Brandname;
        // if($brand->save()){
        //

        // }
        // $request->validate(
        //     [
        //        'name'=>'required|alpha_dash',
        //     ]
        //     );


        $addedby = Auth::guard()->user()->id;
        if (Auth::guard()->user()->role == 'Admin') {
            $file = $request->file('Brandfile');
            $filename = $file->getClientOriginalName();
            $file->move(public_path() . '/storage/brands/', $filename);

            Brand::create(array_merge($request->all(), ['brand_image' => $filename, 'addedby' => $addedby, 'approvedby' => $addedby, 'status' => "approved"]));
            session()->put('AdminSuccess', 'Brand Added');
            return redirect('/admin/brand/');
        } else {
            Brand::create(array_merge($request->all(), ['addedby' => $addedby]));
            return redirect('/admin/brand/');
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
        $url = "/admin/brand/$id";
        $title = "Update Brand";
        $data = Brand::where('brands_id', '=', $id)->first();
        return view('admin.Brand.AddBrand')->with(compact('data', 'title', 'url'));
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
        //     [
        //        'name'=>'required|alpha_dash',
        //     ]
        //     );

        if (Auth::guard()->user()->role == 'Admin') {
            $file = $request->file('Brandfile');

            if ($request->Brandfile) {
                $filename = $file->getClientOriginalName();
                $file->move(public_path() . '/storage/brands/', $filename);
            } else {
                $filename = $request->previousFile;
            }
            $brand =  Brand::find($id);
            $updatedby = Auth::guard()->user()->id;
            $brand->update(array_merge($request->all(), ['brand_image' => $filename, 'updatedby' => $updatedby, 'updateapprovedby' => $updatedby, 'updatestatus' => "approved"]));
            session()->put('AdminFaliure', 'Brand Updated');
            return redirect('/admin/brand/');
        }
        $brand =  Brand::find($id);
        $updatedby = Auth::guard()->user()->id;
        $brand->update(array_merge($request->all(), ['updatedby' => $updatedby, 'updateapprovedby' => $updatedby, 'updatestatus' => 'pending']));
        return redirect('/admin/brand/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand =  Brand::find($id);
        $brand->delete();
        return redirect('/admin/brand/');
    }
}
