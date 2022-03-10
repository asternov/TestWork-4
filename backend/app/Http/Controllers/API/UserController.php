<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Posts;

use Illuminate\Http\Request;

class UserController extends Controller
{
  /**
	 * Display the posts of a particular user
	 *
	 * @param int $id
	 * @return Response
	 */
  public function logout()
  {
    Auth::logout();
    return redirect('/');
  }
}
