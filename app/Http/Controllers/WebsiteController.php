<?php

namespace App\Http\Controllers;

use App\Models\Website;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:websites',
            'url' => 'required|url|unique:websites',
        ]);

        $website = Website::create($request->only('name', 'url'));
        return response()->json($website, 201);
    }

    // Dummy GET method to retrieve all websites
    public function index()
    {
        $websites = Website::all(); // Retrieve all websites
        return response()->json($websites); // Return as JSON
    }
}
