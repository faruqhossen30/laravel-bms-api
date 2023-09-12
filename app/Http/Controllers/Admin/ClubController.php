<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClubController extends Controller
{
    public function index()
    {
        $clubs = User::where('is_club', true)->orderBy('balance', 'DESC')->paginate(15);
        return view('admin.club.index', compact('clubs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.club.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'mobile' => 'required',
            'password' => 'required',
            'club_owner' => 'required',
            'club_mobile' => 'required',
            'club_commission' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'username' => $request->username,
            'password' => $request->password,
            'is_admin' => false,
            'is_club' => true,
            'is_user' => true,
            'club_owner' => $request->club_owner,
            'club_mobile' => $request->club_mobile,
            'club_address' => $request->club_address,
            'club_commission' => $request->club_commission,
            'password' => Hash::make($request->password),
            'status' => $request->status,
        ];

        User::create($data);
        return redirect()->route('club.index');
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
        $club = User::firstWhere('id', $id);
        $totalusers = User::where('club_id', $club->id)->count();
        // return $club;
        return view('admin.club.show', compact('club','totalusers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $club = User::firstWhere('id', $id);
        return view('admin.club.edit', compact('club'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'mobile' => 'required',
            'club_owner' => 'required',
            'club_mobile' => 'required',
            'club_commission' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'username' => $request->username,
            'mobile' => $request->mobile,
            'club_owner' => $request->club_owner,
            'club_mobile' => $request->club_mobile,
            'club_address' => $request->club_address,
            'club_commission' => $request->club_commission,
            'status' => $request->status,
        ];

        $club = User::firstWhere('id', $id)->update($data);
        return redirect()->route('club.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
