<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Moderator;
use App\Models\User;
use Illuminate\Http\Request;

class UserController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('moderators')->paginate(15);

        return response()->view('pages.users.index', compact('users'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::with('request')->findOrFail($id);
//        dd($user);
        $mod = Moderator::where('user_id', $id)->first();;

        return response()->view('pages.users.show', compact('user','mod'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return response()->view('pages.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {

        $user = User::findOrFail($id);
        return redirect()->route('users.index')->with('success', 'Данные пользователя обнавлено');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('успешно', 'Пользователь удален');
    }

    public function addMod($id){
        dd($id);
    }
}
