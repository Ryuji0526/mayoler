<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Models\WithMayo;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function __construct()
    {
      $this->middleware(['auth', 'verified'])->only(['edit', 'update']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $with_mayos = WithMayo::where('user_id', $id)
            ->orderBy('created_at', 'desc')
            ->with(['likes', 'mayo_tags'])
            ->paginate(10);
        return view('front.users.show', compact('user', 'with_mayos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = \Auth::user();

        return view('front.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request)
    {
        $user = \Auth::user();
        $myEmail = \Auth::user()->email;

        $request->validate([
            'email' => [Rule::unique('users', 'email')->whereNot('email', $myEmail)]
          ]);

        if ($user->update($request->all())) {
            $flash = ['success' => 'ユーザー情報を更新しました。'];
        } else {
            $flash = ['error' => 'ユーザー情報の更新に失敗しました'];
        }
     
        return redirect()
            ->route('front.users.show', $user->id)
            ->with($flash);
    }
}
