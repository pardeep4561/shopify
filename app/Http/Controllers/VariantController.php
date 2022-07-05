<?php

namespace App\Http\Controllers;

use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VariantController extends Controller
{

    function index($id)
    {
        return Variant::where('product_id', '=', $id)->get();
    }

    function store(Request $request)
    {
        $validator = Validator::make($request->input(), [
            'product_id' => "required",
            'name' => "required",
            'value' => "required",
        ]);

        if ($validator->fails())
            return ['success' => false, 'erros' => $validator->errors()];

        $variant = Variant::where('product_id', $request->product_id)->latest()->first();
        $insert = $request->only('product_id', 'name', 'value');
        $insert['sequence'] = $variant ? (int) $variant->sequence + 1 : 100;
        $create = Variant::create($insert);

        if ($create)
            return ['success' => true, 'variant' => $create];
        else
            return ['success' => false, 'errors' => ['something went wrong']];
    }
}
