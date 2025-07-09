<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function create()
    {
        $countries = Country::all();

        return view('company.create', compact('countries'));
    }
}
