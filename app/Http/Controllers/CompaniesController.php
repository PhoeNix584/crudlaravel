<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\companies;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class companiesController extends Controller
{

    public function index()
    {
        $data = companies::paginate(5);
        Session::put('halaman_url', request()->fullUrl());
        return view('companies.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {

        // dd($req->logo);
        $this->validate($req, [
            'name' => ['required', 'max:50'],
            'email' => ['required', 'max:50'],
            'logo' => ['required', 'mimes:jpg,jpeg,png|max:2048'],
            'website' => ['required', 'max:50'],
        ]);

        $logo = null;

        if ($req->hasFile('logo')) {
            $logo = $req->file('logo')->store('logos');
        }


        $companies = new companies();

        $companies->name = $req->name;
        $companies->email = $req->email;
        $companies->logo = $logo;
        $companies->website = $req->website;

        $companies->save();

        return redirect('companies')->with('success', 'Berhasil menambahkan data');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = companies::find($id);
        return view('companies.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $this->validate($req, [
            'name' => ['required', 'max:50'],
            'email' => ['required', 'max:50'],
            'logo' => ['mimes:jpe,jpg,png|max:2000'],
            'website' => ['required', 'max:50'],
        ]);


        $companies = companies::find($id);

        $logo = $companies->logo;

        if ($req->hasFile('logo')) {
            if ($logo != null) {
                if (Storage::exists($logo)) {
                    Storage::delete($logo);
                }
            }
            $logo = $req->file('logo')->store('logos');
        }

        $companies->name = $req->name;
        $companies->email = $req->email;
        $companies->logo = $logo;
        $companies->website = $req->website;

        $companies->save();

        if (session('halaman_url')) {
            return redirect(session('halaman_url'))->with('success', 'Berhasil mengedit data');
        }

        return redirect('companies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        companies::where('id', $id)->delete();
        return redirect('companies')->with('success', 'Berhasil menghapus data');
    }
}
