<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $data = Banner::all();

        return view('admin.banner.banners')->with(compact('data'));
    }

    public function create()
    {
        $url = "/admin/banner";
        $title = "Add Banner";
        $data = compact('url', 'title');
        return view('admin.banner.add_banner')->with($data);
    }

    public function store(Request $request)
    {
        $file = $request->file('file');
        $name = $file->getClientOriginalName();
        $file->storeAs("public/banner", $name);

        Banner::create(array_merge($request->all(),['banner_img'=>$name]));

        session()->put('errormessage', "Banner Added Successfully");
        return redirect('/admin/banner');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $url = "/admin/banner/$id";
        $title = "Update Banner Data";
        $data = Banner::find($id);
        $values = compact('url', 'title', 'data');
        return view('admin.banner.add_banner')->with($values);
    }

    public function update(Request $request, $id)
    {
        Banner::find($id)->update($request->all());
        session()->put('errormessage', "Banner Data Updated Successfully");
        return redirect('/admin/banner');
    }

    public function destroy($id)
    {
        $banner = Banner::find($id);
        if (!is_null($banner)) {
            $banner->delete();
            session()->put('errormessage', "Banner Deleted Successfully");
        }
        return redirect('/admin/banner');
    }
}
