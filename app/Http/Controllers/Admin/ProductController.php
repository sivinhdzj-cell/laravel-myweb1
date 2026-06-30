<?php

namespace App\Http\Controllers\Admin;
use App\Models\Product; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category; 
use App\Models\Brand;      

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    
    public function test1()
    {
        return redirect()->route('admin.home');
    }
       public function test2()
    {
        return redirect('/admin/dashboard');
    }
    public function index()
    {
        $limit = 10;

        $list = Product::with([
            'category:cateid,catename',
            'brand:id,brandname'
        ])
        ->select(
            'id',
            'productname',
            'price',
            'image',
            'status',
            'cateid',
            'brandid'
        )
        ->orderBy('productname')
        ->paginate($limit);
    
        return view('admin.products.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select('cateid', 'catename')->get();
        $brands = Brand::select('id', 'brandname') ->get();

        return view('admin.products.create',compact('categories','brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            Product::create([
                'productname'    => $request->productname,
                'slug'           => $request->slug,
                'cateid'         => $request->cateid,
                'brandid'        => $request->brandid,
                'price'          => $request->price,
                'pricediscount'  => $request->pricediscount ?? 0,
                'description'    => $request->description,
                'status'         => $request->status,
            ]);
    
            return redirect()
                ->route('admin.products.index')
                ->with('success', 'Thêm sản phẩm thành công');
    
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with('error', $e->getMessage());
        }
        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}