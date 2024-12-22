<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function index()
    {
        // Retrieve all vendors from the database
        $vendors = Vendor::all();

        // Return the view with the vendors data
        return view('profile', compact('vendors'));
    }
}
