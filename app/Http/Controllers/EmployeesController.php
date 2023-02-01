<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employees;
use App\Models\companies;
use Illuminate\Support\Facades\Session;

class EmployeesController extends Controller
{

    public function index()
    {
        $data = employees::paginate(5);
        Session::put('halaman_url', request()->fullUrl());
        return view('employees.index', compact('data'));
    }

    public function create()
    {

        $companies = companies::get();

        return view('employees.create', ['companies' => $companies]);

        // $data = employees::all();
        // return view('companies.create'[
        //     'data' => $data
        // ]);

        // $companies = companies::all();
        // return view('employees.create', compact('companies'));
    }

    public function store(Request $req)
    {
        $this->validate($req, [
            'name' => ['required', 'max:50'],
            'companyId' => ['required'],
            'email' => ['required', 'max:50'],
        ]);

        $data = [
            'name' => $req->name,
            'companyId' => $req->companyId,
            'email' => $req->email,
        ];

        employees::insert($data);

        // $req->validate([
        //     'name' => 'required',
        //     'email' => 'required'
        // ]);

        // $name = $req->name;
        // $companyId = $req->id;
        // $email = $req->email;

        // employees::create([
        //     'name' => $name,
        //     'companyId' => $companyId,
        //     'email' => $email
        // ]);

        // $companies = companies::findOrFail($req->companyId);

        // $employees = new employees();
        // $employees->name = $req->name;
        // $employees->email = $req->email;

        // $companies->employees()->save($employees);

        // $companies->employees()->create([
        //     'name' => $req->name,
        //     'email' => $req->email
        // ]);

        return redirect('employees')->with('success', 'Berhasil menambahkan data');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {

        // $employees = employees::findOrFail($id);
        // $companies = companies::get()->pluck('name', 'id');

        // return view('employees.create', ['employees' => $employees, 'companies' => $companies]);


        $companies = companies::get();
        $employees = employees::find($id);
        return view('employees.edit', ['companies' => $companies, 'employees' => $employees]);
    }

    public function update(Request $req, $id)
    {
        // $req->validate([
        //     'name' => 'required',
        //     'email' => 'required'
        // ]);

        // $data = [
        //     'name' => $req->name,
        //     'companyId' => $req->companyId,
        //     'email' => $req->email
        // ];

        // employees::find($id)->update($data);

        $this->validate($req, [
            'name' => ['required', 'max:50'],
            'companyId' => ['required', 'max:50'],
            'email' => ['required', 'max:50'],
        ]);

        $employees = employees::find($id);

        $employees->name = $req->name;
        $employees->companyId = $req->companyId;
        $employees->email = $req->email;

        $employees->save();

        // $employees = companies::findOrFail($req->companyId)->employees()->where('id', $companyId)->first();

        // $employees->name = $req->name;
        // $employees->email = $req->email;

        // $employees->update();

        // $companies = companies::findOrFail($req->companyId);
        // $companies->employees()->where('id', $companyId)->update([
        //     'name' => $req->name,
        //     'email' => $req->email,
        // ]);

        if (session('halaman_url')) {
            return redirect(session('halaman_url'))->with('success', 'Berhasil mengedit data');
        }

        return redirect('employees');
    }

    public function destroy($id)
    {
        employees::where('id', $id)->delete();
        return redirect('employees')->with('success', 'Berhasil menghapus data');
    }
}
