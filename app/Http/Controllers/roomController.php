<?php

namespace App\Http\Controllers;

use App\Models\rooms;
use Illuminate\Http\Request;

class roomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('room.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('room.file');
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
    public function show(rooms $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(rooms $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, rooms $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(rooms $task)
    {
        //
    }
}
