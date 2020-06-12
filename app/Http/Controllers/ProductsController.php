<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Products;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProductsController extends Controller
{
    public function index()
    {
        //pagination
        $products = Products::paginate(5);
        return Response()->json($products);

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required|min:3|max:8',
            'description' => 'required'
        ], [
              'name.required' => 'نام کالا را وارد کنید.',
              'description' => 'توضیحات کالا را وارد کنید.'
            ]);
        $products = Products::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'user_id'=> $request['user_id'],
        ]);
        return response()->json($products, 201);
    }

    public function show(Products $products)
    {
        //
    }

    public function edit(Products $products)
    {
        //
    }

    public function update(Request $request, Products $products)
    {
        $data = $request->all();
        $products->update($data);
        return response()->json($products, 200);
    }

    public function destroy(Products $products)
    {
//        $permission = Role::where('name','admin')->get();
        if(Gate::allows('pro_delete', $products)) {
            $products->delete();
            return response()->json($products, 204);        }
        else{
            $data = "شما اجازه دسترسی به این بخش را ندارید!";
            return response()->json(compact('data'),200);
        }
    }
}
