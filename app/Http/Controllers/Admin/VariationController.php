<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Models\Admin\Variation;
use App\Models\Admin\Variationoption;
use App\Models\Admin\Productvariation;
use App\Models\Admin\Product;
use App\Models\Admin\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class VariationController extends Controller
{
    public function index()
    {
        Paginator::useBootstrap();
        $data = Variation::where('status', '=', 'approved')->Paginate(5);
        return view('admin.Varition.ViewVarition')->with(compact('data'));
    }

    public function create()
    {
        $url = '/admin/variation/';
        $title = 'Add Varition';
        $category = Category::where('status', '=', 'approved');
        $data = compact('url', 'title', 'category');
        return view('admin.Varition.AddVarition')->with($data);
    }

    public function store(Request $request)
    {
        // print_r($request->input());
        $request->validate([
            'variation_name' => 'required|alpha_dash',
        ]);

        $addedby = Auth::guard()->user()->id;
        if (Auth::guard()->user()->role == 'Admin') {
            Variation::create(array_merge($request->all(), ['addedby' => $addedby, 'approvedby' => $addedby, 'status' => 'approved']));
            session()->put('AdminSuccess', 'New Attribute Created');
            return redirect('/admin/variation/create');
        } else {
            Variation::create(array_merge($request->all(), ['addedby' => $addedby]));
            return redirect('/admin/variation/');
        }
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $url = "/admin/variation/$id";
        $title = 'Edit Variation';
        $category = Category::where('status', '=', 'approved');
        $data = Variation::find($id);

        return view('admin.Varition.AddVarition')->with(compact('url', 'title', 'category', 'data'));
    }

    public function update(Request $request, $id)
    {
        $updatedby = Auth::guard()->user()->id;
        $variation = Variation::find($id);
        if (Auth::guard()->user()->role == 'Admin') {
            $variation->update(array_merge($request->all(), ['updatedby' => $updatedby, 'updateapprovedby' => $updatedby, 'updatestatus' => 'approved']));
            session()->put('AdminSuccess', 'Attribute Updated');
            return redirect('/admin/variation/');
        } else {
            $variation->update(array_merge($request->all(), ['updatedby' => $updatedby, 'updatestatus' => 'pending']));
            return redirect('/admin/variation/');
        }
    }

    public function destroy($id)
    {
        $variation = Variation::find($id);
        $variation->delete();
        session()->put('AdminFaliure', 'Attribute Delete');
        return redirect('/admin/variation');
    }
}
