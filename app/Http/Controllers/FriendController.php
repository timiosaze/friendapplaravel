<?php

namespace App\Http\Controllers;

use App\Friend;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $friends = Friend::orderBy('id', 'desc')->paginate(5);

        return view('friends.index', ['friends' => $friends]);
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
        //
        $this->FriendValidation();
        
        $friend = new Friend();
        $friend->name = request('name');
        $friend->about = request('about');

        if($friend->save()){
            return redirect('/friends');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function show(Friend $friend)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $friend = Friend::findOrFail($id);

        return view('friends.edit', ['friend' => $friend]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $friend = Friend::findOrFail($id);
        $this->FriendValidation();
        $friend->name = request('name');
        $friend->about = request('about');

        if($friend->save()){
            return redirect('/friends');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $friend = Friend::findOrFail($id);

        if($friend->delete()){
            return redirect('/friends');
        }
    }
    public function FriendValidation(){
        return request()->validate([
            'name' => 'required',
            'about' => 'required'
        ]);
    }
}
