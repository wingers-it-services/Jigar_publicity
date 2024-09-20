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
        // Fetch industry categories and pass them to the view if user is not authenticated
        $industryCategories = $this->industriesCategorie->get();

        return view('home', compact('industryCategories'));
    }
}
