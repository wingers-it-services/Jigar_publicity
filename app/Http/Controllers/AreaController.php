<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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

        return redirect()->route('areaList')->with('success', 'Gym deleted successfully!');
    }

    public function updateArea(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'uuid' => 'required',
                'area_name' => 'required'
            ]);
            $uuid = $request->uuid;
            $this->areas->updateArea($validatedData, $uuid);
    
            return redirect()->back()->with('status', 'success')->with('message', 'Area updated successfully.');
        } catch (\Exception $e) {
            Log::error('[IndustriesCategorieController][updateCategory] Error updating category. Request=' . $request . ', Exception=' . $e->getMessage());
            return redirect()->back()->with('status', 'error')->with('message', 'Error while updating category.');
        }
    }

    
}
