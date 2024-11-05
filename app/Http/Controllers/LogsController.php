<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LogsModels;
use Illuminate\Support\Facades\Auth;

class LogsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store($action, $description, $data = [])
    {
        LogsModels::create([
            'user_id' => Auth::user()->id,
            'action' => $action,
            'description' => $description,
            'data' => json_encode($data),
        ]);
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
