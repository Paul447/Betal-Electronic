<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use App\Models\admin\Variation;
use App\Models\admin\Variationoption;
use Illuminate\Http\Request;


class VariationoptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Paginator::useBootstrap();
        $data = Variationoption::join('variations', 'variation', '=', 'variations.variation_id')
            ->where('variationoptions.status', '=', 'approved')->Paginate(5);
        return view('admin.variationoption.viewvariationoption')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $url = "/admin/variationoption/";
        $title = "Add Variation Option";
        $variation = Variation::where('status', '=', 'approved')->get();
        $data = compact('url', 'title', 'variation');
        return view('admin.variationoption.variationoption')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate(
        //     [
        //        'variation_name'=>'required|alpha_dash',
        //        'category'=>'required|numeric,'
        //     ]
        //     );
        $addedby = session('user')['id'];
        if (session('user')['role'] == 'Admin') {

            Variationoption::create(array_merge($request->all(), ['addedby' => $addedby, 'approvedby' => $addedby, 'status' => 'approved']));
            session()->put('AdminSuccess', 'New Attribute Option Created');
            return redirect('/admin/variationoption/create');
        } else {
            Variationoption::create(array_merge($request->all(), ['addedby' => $addedby]));
            return redirect('/admin/variationoption/create');
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
        $url = "/admin/variationoption/$id";
        $title = "Update Variation Option";
        $variation = Variation::where('status', '=', 'approved')->get();
        $data = Variationoption::join('variations', 'variation', '=', 'variations.variation_id')->find($id);
       
        return view('admin.variationoption.variationoption')->with(compact('url', 'title', 'variation', 'data'));
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
        $updatedby = session('user')['id'];
        $var = Variationoption::find($id);
        if (session('user')['role'] == 'Admin') {
            $var->update(array_merge($request->all(), ['updatedby' => $updatedby, 'updateapprovedby' => $updatedby, 'updatestatus' => "approved"]));
            session()->put('AdminFaliure', 'Attribute Option Updated');
            return redirect(('admin/variationoption/'));
        } else {
            $var->update(array_merge($request->all(), ['updatedby' => $updatedby, 'updatestatus' => 'pending']));
            return redirect(('admin/variationoption/'));
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
        $var = Variationoption::find($id);
        $var->delete();
        session()->put('AdminFaliure', 'Attribute-Option Deleted');
        return redirect('/admin/variationoption');
    }
}
