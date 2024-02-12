<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserRequests;
use Closure;
use Illuminate\Http\Request;

class UserRequestsController extends Controller
{
    public function index(Request $request, Closure $next)
    {
        
    }

    public function show($id)
    {
        return UserRequests::find($id);
    }

}
