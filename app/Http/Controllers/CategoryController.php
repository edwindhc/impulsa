<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Category;
use App\User;
use JWTAuth;
use JWTAuthException;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function authenticate(Request $request){
     	$credentials = $request->only('email', 'password');
         $token = null;
         try {
             if (!$token = JWTAuth::attempt($credentials)) {
                 return response()->json([
                     'response' => 'error',
                     'message' => 'invalid_email_or_password',
                 ]);
             }
         } catch (JWTAuthException $e) {
             return response()->json([
                 'response' => 'error',
                 'message' => 'failed_to_create_token',
             ]);
         }
         $email = $request->Input('email');
         $user = User::where('email', $email)->get();
         return response()->json([
             'response' => 'success',
             'result' => [
                 'token' => $token,
                 'user' => $user
             ],
         ]);
     }

     public function register(){
    	$email = request()->email;
    	$name = request()->name;
    	$password = request()->password;

    	$user = User::create([
    		'name' => $name,
    		'email' => $email,
    		'password' => bcrypt($password)
    		]);

    	$token = JWTAuth::fromUser($user);
      $user = JWTAuth::toUser($token);

    	return response()->json(['token' => $token, 'user' => $user], 200);
    }

    public function index()
    {
        $category = Category::all();
        return response()->json(['category' => $category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $title = request()->title;
      $category = Category::create([
        'title' => $title
      ]);
      return response()->json(['message' => 'Categoria Guardada', 'category' => $category]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        return response()->json(['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->title = request()->title;
        $category->update();
        return response()->json([
          'message' => 'Categoria Actualizada',
          'category' => $category
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
