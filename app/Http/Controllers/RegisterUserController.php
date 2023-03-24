<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

use Illuminate\Support\Facades\Auth;
use Image;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\userActivityLog;
use Session;


class RegisterUserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id','desc')->get();
        return view('backEnd.users.index')->with('users', $users);
    }

    public function activity(){
        $activity = userActivityLog::all();
        return view('backEnd.users.activity_log')->with('activity', $activity);
    }

    public function edit($id)
    {
        $user_roles = User::find($id);
        return view('backEnd.users.edit')->with('user_roles', $user_roles);
    }
    public function update(Request $request, $id)
    {
        
        $user = User::find($id);

        if($user->email != $request->email){
            $this->validate($request,[
                'email' => ['required','unique:users'],
            ]);
            $user->email = $request->email;
        }

        if($user->phone != $request->phone){
            $this->validate($request,[
                'phone' => ['required','unique:users'],
            ]);
            $user->phone = $request->phone;
        }

        if( !is_null($request->old_password) && !is_null($request->password) && !is_null($request->password_confirmation)){
            $this->validate($request,[
                'password' => ['string', 'min:8', 'confirmed'],
            ]);


            if(Hash::check($request->old_password, $user->password)){
                $user->password = Hash::make($request->password);
            }else{
                if($request->ajax()){
                    $validator = Validator::make([], []);
                    return $validator->getMessageBag()->add('old_password', 'old password wrong');
                }
                return redirect()->back()->withErrors('old_password','old password wrong');
            }
        }


        $user->name = $request->name;
        $user->lname = $request->lname;
        $user->phone = $request->phone;
        $user->address1 = $request->address1;
        $user->address2 = $request->address2;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->pincode = $request->pincode;
        $user->country = $request->country;
        $user->role_as = $request->role_as;
        $user->updated_at = Carbon::now()->toDateTimeString();

        $this->validate($request,[
            'name' => ['required'],
            'lname' => ['required'],
            'email' => ['required'],
        ]);

        
        if($request->hasFile('avatar')){
            // Delete old image
            $pathImage = 'uploads/avatars/'.$user->avatar;
            if(File::exists($pathImage))
            {
                File::delete($pathImage);
            }
 
            // Store image
            $file = $request->file('avatar');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/avatars/',$filename);
            
            // Save to Datebase
            $user->avatar = $filename;
         }
        
        $td = Carbon::now();
        $todayDate = $td->toDayDateTimeString();


        $activityLog = [
            'user_name' => $user->name,
            'user_lname' =>  $user->lname,
            'email' => $user->email,
            'role_as' => $user->role_as,
            'modify_user' => 'Update Email',
            'date_time' => $todayDate,
        ];

        DB::table('user_activity_logs')->insert($activityLog);
        $user->save();
        return redirect()->back()->with('success', 'Role is Updated.');
    }

    public function userCreate()
    {
        return view('backEnd.users.create');
    }

    public function userStore(Request $request)
    {
       
        $this->validate($request,[
            'name' => ['required'],
            'lname' => ['required'],
            'phone' => ['required'],
            'role_as' => ['required'],
            'email' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if($request->hasFile('avatar'))
        {
            $file = $request->file('avatar');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/avatars/',$filename);
        }

        $user = new User();
        $user->name = $request->name;
        $user->lname = $request->lname;
        $user->phone = $request->phone;
        $user->address1 = $request->address1;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->pincode = $request->pincode;
        $user->country = $request->country;
        $user->role_as = $request->role_as;
        $user->avatar = $filename;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->created_at = Carbon::now()->toDateTimeString();
        $user->save();

        $td = Carbon::now();
        $todayDate = $td->toDayDateTimeString();

        $activityLog = [
            'user_name' => $user->name,
            'user_lname' =>  $user->lname,
            'email' => $user->email,
            'role_as' => $user->role_as,
            'modify_user' => 'Register Email',
            'date_time' => $todayDate,
        ];

        DB::table('user_activity_logs')->insert($activityLog);
        return redirect()->back()->with('success', 'Register User is Success.');
    }  


    public function destroy(Request $request, $id)
    {
        $user = Auth::User();
        Session::put('user',$user);
        /* $user = Session::get('user'); */
        
        $name = $user->name;
        $lname = $user->lname;
        $email = $user->email;
        $role_as = $user->role_as;

        $td = Carbon::now();
        $todayDate = $td->toDayDateTimeString();

        $activityLog = [
            'user_name' => $name,
            'user_lname' => $lname,
            'email' => $email,
            'role_as' => $role_as,
            'modify_user' => 'delete',
            'date_time' => $todayDate,
        ];

       /*  return dd($activityLog); */
        DB::table('user_activity_logs')->insert($activityLog);

        $user = User::find($id);
        $user->delete();
        
        return redirect()->back()->with('error', 'User Deleted Successfully');
    }


    public function userChart(){
        return view('backEnd.dashboard.index');
    }

    public function profile($id){
        $profile = User::find($id);
        return view('backEnd.users.profile')->with('profile', $profile);
    }

    public function profileEdite($id){
        $profile = User::find($id);
        
        return view('backEnd.users.profileEdit')->with('profile', $profile);
    }

    public function profileUpdate(Request $request, $id)
    {
        
        $user = User::find($id);

        $user->name = $request->first_name;
        $user->lname = $request->last_name;
        $user->address1 = $request->address1;
        $user->phone = $request->phone;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->country = $request->country;
        $user->pincode = $request->pincode;


        $name = $request->first_name;
        $lname = $request->last_name;
        $email = $request->email;
        $role_as = $request->role_as;
        $isban = $request->isban;

        $td = Carbon::now();
        $todayDate = $td->toDayDateTimeString();


        $activityLog = [
            'user_name' => $name,
            'user_lname' => $lname,
            'email' => $email,
            'role_as' => null,
            'modify_user' => 'update',
            'date_time' => $todayDate,
        ];

        DB::table('user_activity_logs')->insert($activityLog);


    if($request->hasFile('avatar')){
        // Delete old avatar
       $pathImage = 'uploads/avatars/'.$user->avatar;
       if(File::exists($pathImage))
       {
           File::delete($pathImage);
       }

       // Store avatar
       $file = $request->file('avatar');
       $ext = $file->getClientOriginalExtension();
       $filename = time().'.'.$ext;
       $file->move('uploads/avatars/',$filename);
       
       // Save to Datebase
       $user->avatar = $filename;
    }

    if(!$user->save()){
        return redirect()->back()->with('error', 'Sorry, there\' a problem while updating promotions.');
    }
    return redirect()->back()->with('success', 'User is Updated.');
  }

  public function updateRole(Request $request){
      
    $userId = $request->userID;
    $role_val = $request->role_val;

    $upd_role = DB::table('users')->where('id', $userId)->update(['role_as' => $role_val]);

    if($upd_role){
        echo "role is updated.";
    }
  }

  
    public function updateBan(Request $request,$id=null){
        $data = $request->all();
        User::where('id',$data['id'])->update(['isban'=>$data['isban']]);
        return redirect()->back()->with('success','User Ban updated successfully!');
    }

    public function destroyActivity(Request $request, $id)
    {
        $activityLog = userActivityLog::find($id);
        $activityLog->delete();
        
        return redirect()->back()->with('error', 'ActivityLog Deleted Successfully');
    }

    public function customerindex(){
        $customer = User::all();

        return view('backEnd.customer.index')->with('customer', $customer);

    }
  
}
