<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Admin\UserEloquentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct(UserEloquentRepository $userEloquentRepository)
    {
        $this->userEloquentRepository = $userEloquentRepository;
    }

    public function index() {
        $user = $this->userEloquentRepository->find(Auth::user()->id);
        $data = compact(
            'user'
        );

        return view('admin.user.info', $data);
    }

    public function changePassword(Request $request) {
        $data = $request->except('_token');

        $user = Auth::user();

        if (Hash::check($data['password_old'], $user->getAuthPassword())) {

        }
    }
}
