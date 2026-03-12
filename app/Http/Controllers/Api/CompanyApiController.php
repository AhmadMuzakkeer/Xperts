<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;

class CompanyApiController extends Controller
{
    // GET /api/companies
    public function index()
    {
        $companies = Company::withCount('employees')->get();

        return response()->json($companies);
    }

    // GET /api/companies/{id}
    public function show($id)
    {
        $company = Company::with('employees')->withCount('employees')->find($id);

        if (!$company) {
            return response()->json([
                'message' => 'Company not found'
            ], 404);
        }

        return response()->json($company);
    }
}