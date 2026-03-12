<?php
namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index(Request $request)
{
    $query = Company::query();

    if ($request->filled('search')) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    $companies = $query->paginate(10)->withQueryString();

    return view('companies.index', compact('companies'));
}

    public function create()
    {
        return view('companies.create');
    }

   public function store(Request $request)
{
    $request->validate([
        'name' => 'required|unique:companies,name',
        'email' => 'nullable|email|unique:companies,email',
        'logo' => 'nullable|image|dimensions:min_width=100,min_height=100'
    ]);

    $logo = null;

    if ($request->hasFile('logo')) {
        $logo = $request->file('logo')->store('logos','public');
    }

    Company::create([
        'name' => $request->name,
        'email' => $request->email,
        'website' => $request->website,
        'logo' => $logo
    ]);

    return redirect()->route('companies.index')
        ->with('success','Company created successfully');
}

    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

   public function update(Request $request, Company $company)
{
    $request->validate([
        'name' => 'required|unique:companies,name,' . $company->id,
        'email' => 'nullable|email|unique:companies,email,' . $company->id,
        'logo' => 'nullable|image|dimensions:min_width=100,min_height=100'
    ]);

    if ($request->hasFile('logo')) {
        $logo = $request->file('logo')->store('logos','public');
        $company->logo = $logo;
    }

    $company->name = $request->name;
    $company->email = $request->email;
    $company->website = $request->website;

    $company->save();

    return redirect()->route('companies.index')
        ->with('success','Company updated successfully');
}

    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index');
    }
}



