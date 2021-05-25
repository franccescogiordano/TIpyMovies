  <?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        return view('user.profile', [
            'user' => User::findOrFail($id)
        ]);

      /*   return view('user.profile', [
            'user' => User::findOrFail($username,$password)
        ]);*/
    }

   /* public function index(){
    	$p=User::all();
    	return response()->json($p,200);
    }
      public function store(Request $request){
    	$p=new User ($request->all());
    	$p->save();
    	return response()->json($p,200);
    }*/
}
