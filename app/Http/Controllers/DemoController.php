<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemoController extends Controller
{
    public function index()
    {
    return view('home');
    }
    public function index1()
    {
        $name='ZZ';
        return view ('index1',compact('name'));
    }
    public function index2()
    {
        return response()->json([
            'status'=>true,
            'data'=> [
                'prorduct'=>'san pham a1',
                'price'=>150000
            ]
            ]);
}
    public function index3($id)
    {
        return "Id=$id";
    }
    public function index4($id=null)
    {
        return $id==null?"khong co ID " : "Id=$id";
    }

}


