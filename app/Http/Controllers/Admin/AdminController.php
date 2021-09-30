<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use DB;
use App\User;

class AdminController extends Controller
{

    public function __construct() {
        $this->middleware(['auth','verified', 'admin']);
    }

    public function index(Request $request) {
        return view('admin.index');
    }
}
