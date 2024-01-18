<?php

namespace App\Http\Controllers;

use App\Models\Meet;
use Illuminate\Http\Request;

class MeetsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('chats.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Meet $sala)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Meet $sala)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Meet $sala)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Meet $sala)
    {
        //
    }
}
