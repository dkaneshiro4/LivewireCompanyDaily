<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Country;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function create()
    {
        return view('company.create');
    }

    public function edit(Company $company)
    {
        return view('company.edit', compact('company'));
    }
}
