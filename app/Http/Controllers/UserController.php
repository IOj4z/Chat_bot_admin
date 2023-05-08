<?php

namespace App\Http\Controllers;

use App\Models\Moderator;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
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
        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'corporation' => $request->corporation,
            'about' => $request->about,
            'address' => $request->address,
            'moderator' => ($request->moderator == 'on')?1:0,
        ];

        $user = User::findOrFail($id);
        $moderator = Moderator::where('user_id', '=',$user->id)->first();
        $moderator->delete();
        $user->moderator = $data['moderator'];

        $user->update($data);

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

    public function addModerator(Request $request, $user_id ){
        $client = new Client();
        $user = User::find($user_id);
        $user->moderator = 1;
        $user->save();
        $moderators = Moderator::where('user_id', $user_id)->where('status', 0)->first();
        $moderators->status = 1;
        $moderators->save();
        $bot_token = config('services.telegram.token');

        $text = 'Вашу заявку на Модератора подтвердили!';
        $url = 'https://api.telegram.org/bot'.$bot_token.'/sendMessage?text='.$text.'&chat_id='.$user->tg_user_id;

        $client->post($url);
        return redirect()->route('users.show', $user_id)->with('success', 'Данные пользователя обнавлено');
    }
}
