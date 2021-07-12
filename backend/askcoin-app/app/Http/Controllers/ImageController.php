<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // error_log($request);
        // $allusers = DB::table('users')->where('id', $request->userId)->get();

        $find = User::find($request->userId);

        if ($find) {
            # code...
            $a = $request->myFile->getClientOriginalName();
            $ext = strtolower(pathinfo($a, PATHINFO_EXTENSION));
                $sub = time().".".$ext;
    
    
                $request->myFile->storeAs('images', $sub,  'public');
    
    
                $find->image = $sub;
    
                $find->save();

                return ["message"=>"uploaded successfully", "image"=>$find->image];
        } else {
            return ["message"=>"cant upload"];
        }


        // return $allusers;
        // return ["res"=>$request->userId];
        // return ["error"=>false, "data"=>$allusers];

        // return $a;
    }


    public function send(Request $request)
    {
        return 'j';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        
        // $allusers = DB::table('users')->where('id', $id)->get();
        $find = User::find($request);

        return $find;
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
        //
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
