<?php

namespace App\Http\Controllers;

use App\Parts;
use Illuminate\Http\Request;

class PartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //load more, then we will call $parts in ajax or jquery
        $parts = Parts::orderBy('created_at','desc')->paginate(4);
        return Response()->json($parts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $parts = Parts::create([
            'name' => $request['name'],
            'description' => $request['description'],
        ]);
//        return redirect(route('faqs.store'));
        return response()->json($parts, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Parts  $parts
     * @return \Illuminate\Http\Response
     */
    public function show(Parts $parts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Parts  $parts
     * @return \Illuminate\Http\Response
     */
    public function edit(Parts $parts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Parts  $parts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parts $parts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Parts  $parts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parts $parts)
    {
        //
    }
}
