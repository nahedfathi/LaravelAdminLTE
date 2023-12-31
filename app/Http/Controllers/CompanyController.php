<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;
use App\Models\company;
use App\Mail\NewCompanyNotification;
use Illuminate\Support\Facades\Mail;
class CompanyController extends Controller
{
    public function index()
    {
        $companies = company::paginate(10);

        return view('companies.index', compact('companies'));
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store(CompanyRequest $request)
    {
        $logoPath = time().'.'.$request->logo->extension(); 
        $request->logo->move(public_path('images'), $logoPath);

        $company = company::create([
            'name' => $request['name'],
            'website' => $request['website'],
            'email' => $request['email'],
            'logo' => $logoPath,
        ]);
        Mail::to('nahed581213@gmail.com')->send(new NewCompanyNotification($company));
        return redirect()->route('companies.index', $company->id)
                        ->with('success','Company created successfully');
    }

    public function edit(Request $request)
    {
        $id = $request->query('id');
        $company = company::findOrFail($id);

        return view('companies.edit', ['company' => $company]);
    }

    public function update(CompanyRequest $request, $id)
    {
        $logoPath = time().'.'.$request->logo->extension(); 
        $request->logo->move(public_path('images'), $logoPath);
        $companyData = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'logo' => $logoPath,
            'website' => $request->input('website')
        ];
        company::where('id', $id)->update($companyData);
        return redirect()->route('companies.index')->with('success', 'Company updated successfully.');
    }

    public function delete($id)
    {
        $company = company::findOrFail($id);
        $company->delete();

        return redirect()->route('companies.index')
                        ->with('success','Company deleted successfully');
    }
}
