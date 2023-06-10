<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Municipality;

class AddressController extends Controller
{
    public function district($id)
    {
        $districts = District::where('province', $id)->get();
        if (!is_null($districts)) {
            return response()->json(array('districts' => $districts), 200);
        } else {
            return response()->json(array('Error' => "No Records Found"), 404);
        }
    }

    public function municipality($id)
    {
        $municipalitites = Municipality::where('district', $id)->get();
        if (!is_null($municipalitites)) {
         
            return response()->json(array('municipalitites' => $municipalitites), 200);
        } else {
            return response()->json(array('Error' => "No Records Found"), 404);
        }
    }
}
