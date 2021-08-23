<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Models\Member;
use Facade\Ignition\Exceptions\ViewException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required | min:1 | max:40',
            'age' => 'required | integer | between:1,120',
        ]);
        $store = new Member;
        $store->name = $request->name;
        $store->age = $request->age;
        $store->gender = $request->gender;
        $request->file('img')->storePublicly('img/','public');
        $store->img = $request->file('img')->hashName();
        $store->save();
        return redirect('/')->with('success','Member Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        $genders = Gender::all();
        $edit = $member;
        return view('pages.edit.member',compact('edit','genders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        request()->validate([
            'name' => 'required | min:1 | max:40',
            'age' => 'required | integer | between:1,120',
        ]);
        $store = $member;
        $store->name = $request->name;
        $store->age = $request->age;
        $store->gender = $request->gender;
        Storage::disk('public')->delete('img/'.$store->img);
        $request->file('img')->storePublicly('img/','public');
        $store->img = $request->file('img')->hashName();
        $store->save();
        return redirect('/')->with('success','Member Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        Storage::disk('public')->delete('img/'.$member->img);
        $member->delete();
        return redirect()->back();
    }

    public function download(Member $member)
    {
        return response()->download(public_path('img/'.$member->img));
    }
}
