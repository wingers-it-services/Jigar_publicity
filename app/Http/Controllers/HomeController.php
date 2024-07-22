<?php

namespace App\Http\Controllers;

use App\Models\IndustriesCategorie;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    protected $industriesCategorie;

    public function __construct(IndustriesCategorie $industriesCategorie)
    {
        $this->industriesCategorie = $industriesCategorie;
    }

    public function viewHome()
    {
        $industryCategories = $this->industriesCategorie->get();
        // dd($industryCategories);
        return view('home', compact('industryCategories'));
    }
}
