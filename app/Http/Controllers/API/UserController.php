<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


//file Upload
use App\Lib\FileUpload;


 
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

      //      $name='$request->imag';
     //      \Image::make($request->imag)->save(public_path('img/profile/').$name);

  

               echo json_encode( array('image'=>$name, 'ami'=>'Jesan') );


           //return ['massage'=>'Pic Controller Called'];
       //   return[$request->imag];
       /* $request->User()->update(['photo'=>$request->imag]);
       $request->User()->photo = $request->imag;
      $request->User()->save();
 
        
         if ($request->hasFile('imag'))
            {
                $file = $request->file('imag');
                $prefix = 'image';
                $path = 'public/img';

                $file_upload = new FileUpload();
                return $upload = $file_upload->upload($file, $prefix, $path);

                if ($upload['status'] == true)
                {
                    $file_name = $upload['file_name'];
                }

            } 
  */
        //return ['massage'=>'Pic Controller Called'];
      // return[$request->imag];
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
