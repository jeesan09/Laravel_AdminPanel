<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Lib\FileUpload;
use App\Photo;
use App\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;


 
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
/*    public function __construct()
    {
        $this->middleware('auth');
    }*/

    public function index()
    {
        //
       
        return User::latest()->paginate(5);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //return ['massage'=>'all is good'];
        $this->validate($request,[

            'name'=>'required|string|max:191',
            'email'=>'required|string|email|unique:users|max:255',
            'password'=>'required|string|min:5',
            'type'=>'required',


        ]);



        return User::create([

           'name'=>$request['name'],
           'email'=>$request['email'],
           'bio'=>$request['bio'],
           'type'=>$request['type'],
           
           'password'=>Hash::make($request['password'])
           
           


        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    public function picUpold(Request $request)
    {
        //



            $name = time().'.' . explode('/', explode(':', substr($request->imag, 0, strpos($request->imag, ';')))[1])[1];
            
           \Image::make($request->imag)->save(public_path('img/profile/').$name);

             $Photo= new Photo();
             $Photo->photo_name = $name;
             $Photo->save();



  

               echo json_encode( array('image'=>$name, 'ami'=>'Jesan') );



    }


    public function showpic(){

        $picName=Photo::all()->pluck('photo_name')->last();

      // $picName= Photo::orderBy('created_at', 'desc')->get()->last();
         echo json_encode( array('image_name'=> $picName) );
      //  return $picName;
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
        //

        $user= User::findOrFail($id);

            $this->validate($request,[

            'name'=>'required|string|max:191',
            'email'=>'required|string|email|max:255|unique:users,email,'.$user->id,
            'password'=>'sometimes|string|min:5',
            'type'=>'required',


        ]);
        
        $user->update($request->all());


       // return ['massage'=>'all is good update'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user= User::findOrFail($id);
        $user->delete();
        return ['massage'=>'function called'];
    }
}
