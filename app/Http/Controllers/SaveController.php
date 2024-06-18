<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSaveRequest;
use App\Http\Requests\UpdateSaveRequest;
use App\Models\Save;

class SaveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($userId = 0)
    {
        if (intval($userId) > 0) {
            return Save::where('user_id', '=', $userId)->get();
        }
        return Save::all();
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
    public function store(StoreSaveRequest $request)
    {
        $save = $this->validateSave();
        $stored = Save::create($save);
        return $stored;
    }

    /**
     * Display the specified resource.
     */
    public function show(Save $save)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Save $save)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSaveRequest $request, Save $save)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       return Save::destroy(id);
    }

    
    public function validateSave()
    {
        return request()->validate([
            'user_id' => '',
            'type' => '',
            'category' => '',
            'note' => '',
            'make' => '',
            'model' => '',
            'year' => '',
            'price' => '',
            'title' => '',
            'mileage' => '',
            'city' => '',
            'state' => '',
            'timestamp' => '',
            'image' => '',
            'url' => '',
            'latitude' => '',
            'longitude' => '',
            'source' => '',
            'int' => '',
            'status' => ''
        ]);
    }
}
