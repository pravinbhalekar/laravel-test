<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\EditUserRequest;
use App\Model\UserModel;
use App\Model\UserProfileModel;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{

            $UserData =   UserModel::with('userdetails')->orderby('id','desc')->get();

            return view('view',compact('UserData'));

        }catch(\Exception $th){
            
            throw $th;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try{
            
            return view('add-user');

        }catch(\Exception $th){
            
            throw $th;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddUserRequest $request)
    {
        try{
            
            //TRANSACTION BEGIN
            DB::beginTransaction();

            //MAKE INSTANCE OF MODELS
            $User        = new UserModel();
            $UserProfile = new UserProfileModel();

            $User->name     = $request->name;
            $User->mno      = $request->mno;
            $User->email    = $request->email;

            //INSERT TO USER TABLE
            if($User->save()){
                
                //INSERT INTO USER_DETAILS TABLE
                $UserProfile->user_id       = $User->id;//USER ID TAKEN AFTER INSERT INTO USER
                $UserProfile->birth_date    = $request->birth_date;
                $UserProfile->gender        = decrypt($request->gender);
                $UserProfile->qualification = $request->qualification;
                $UserProfile->salary        = $request->salary;
                $UserProfile->address       = $request->address;
                
                if($UserProfile->save()){
                    
                    //COMMIT TRANSACTION
                    DB::commit();
                    
                    return ['status'=>200,'message'=>'User Added Successfully'];
                    
                }

            }
            
        }catch(\Exception $th){
            
            //ROLLBACK TRANSACTION
            DB::rollback();
            
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        try{
            
            return $UserData =   UserModel::where('id',decrypt($request->UserId))->with('userdetails')->first();
            

        }catch(\Exception $th){
            
            throw $th;
        }
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
    public function update(EditUserRequest $request)
    {
        try{

            //FIND USER DETAILS IN USER TABLE
            $User =   UserModel::where('id',$request->userid)->first();

            $User->name     = $request->name;
            $User->mno      = $request->mno;
            $User->email    = $request->email;

            if($User->save()){
                
                //FIND USER DETAILS IN USER PROFILE TABLE
                $UserProfile = UserProfileModel::where('user_id',$request->userid)->first();

                $UserProfile->birth_date    = $request->birth_date;
                $UserProfile->gender        = $request->gender;
                $UserProfile->qualification = $request->qualification;
                $UserProfile->salary        = $request->salary;
                $UserProfile->address       = $request->address;

                if($UserProfile->save()){
                    
                    return ['status'=>200,'message'=>'User Updated Successfully'];
                    
                }

            }

        }catch(\Exception $th){
            
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try{
            
            //FIND USER DETAILS IN USER TABLE
            $User =   UserModel::where('id',decrypt($request->userid))->first();
            
            if($User->delete()){
                
                return ['status'=>200,'message'=>'User Deleted Successfully'];
            }

        }catch(\Exception $th){
            
            throw $th;
        }
    }
}
