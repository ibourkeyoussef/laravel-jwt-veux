<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UsersResource;

class UserController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth:api');
    }

    public function index()
    {
     return UsersResource::collection(User::latest()->paginate(5));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request,User $user)
    {
        // dd($request->all());
        $user=User::create(
            [
                'name'=> $request->name,
                'email'=> $request->email,
                'password'=> bcrypt($request->password),
            ]
        );
        return response()->json(['status'=> 2001]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return new UsersResource($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $user)
    {
        // dd($request->all());
        // $user->id;


        $this->validate($request,[
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users,email,'.$user->id,
            'password' => 'sometimes|required|min:8'
        ]);

        $user->update([
            'name'=> $request->name,
                'email'=> $request->email,
                'password'=> bcrypt($request->password),
        ]);
        if ($user) {
            # code...
            return response()->json(['status'=>202, 'msg'=>'updated','user' => auth()->user()]);
        }
        return response()->json(['errors'=> errors]);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['mesg'=>'del','status'=> 204]);
    }
}
