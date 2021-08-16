<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest('created_at')->paginate(20);

        return view('back.users.index', compact('users'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WithMayo  $withMayo
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if($user->delete()) {
            $flash = ['success' => 'ユーザーを削除しました。'];
        } else {
            $flash = ['error' => 'ユーザーの削除に失敗しました。'];
        }

        return redirect()
            ->back()
            ->with($flash);
    }
}
