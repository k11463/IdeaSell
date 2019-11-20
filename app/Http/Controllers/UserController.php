<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserLoginRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function store(UserStoreRequest $request)
    {
        $passwordHashed = Hash::make($request->password, [
            'rounds' => 12
        ]);
        $user = new User;
        $user->fill($request->all());
        $user->password = $passwordHashed;
        $user->rank = "幼稚園小班";
        $user->save();

        return redirect('/');
    }

    public function login(UserLoginRequest $request, User $user)
    {
        $findUser = $user->where('email', '=', $request->account)->orWhere('username', '=', $request->account)->firstOrFail()->get();
        return $findUser;
        // return $findUserWithUsername;
        // if (Hash::check($findUser->password, $request->password)) {
        //     return "123";
        // }
        // Log::info($findUser);
        // return $findUser;
    }

    public function show(User $user)
    { }

    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
