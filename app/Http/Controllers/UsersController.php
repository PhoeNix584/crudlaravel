<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\employees;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::paginate(5);
        return view('users.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = employees::get();
        return view('users.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $this->validate($req, [
            'username' => ['required', 'max:250'],
            'password' => ['required', 'max:250'],
            'level' => ['required'],
            'employeId' => ['required'],
        ]);

        $data = [
            'username' => $req->username,
            'password' => bcrypt($req->password),
            'level' => $req->level,
            'employeId' => $req->employeId
        ];

        User::insert($data);

        // $companies->employees()->create([
        //     'name' => $req->name,
        //     'email' => $req->email
        // ]);

        return redirect('users')->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employees = employees::get();
        $users = User::find($id);
        return view('users.edit', compact('employees', 'users'));
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
        $users = User::find($id);

        $users->username = $req->username;
        $users->password = bcrypt($req->password);
        $users->level = $req->level;
        $users->employeId = $req->employeId;

        $users->save();

        return redirect('users')->with('success', 'Berhasil mengedit data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return redirect('users')->with('success', 'Berhasil menghapus data');
    }
}
