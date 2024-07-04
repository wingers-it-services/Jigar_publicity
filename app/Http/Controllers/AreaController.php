<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{

    private $areas;

    public function __construct(
        Area $areas
    ) {
        $this->areas = $areas;
    }

    public function areaList()
    {
        $areas = $this->areas->all();

        return view('admin.area-list', compact('areas'));
    }

    public function createIndustriesArea(Request $request)
    {
        $this->areas->create([
            'area_name' => $request->area_name
        ]);
        return back()->with('status', 'success')->with('message', 'Area Added Succesfully');
    }

    public function deleteIndustriesArea($uuid)
    {
        $industriesArea = $this->areas->where('uuid', $uuid)->firstOrFail();
        $industriesArea->delete();

        return redirect()->back()->with('success', 'Gym deleted successfully!');
    }

    
}
