<?php

namespace App\Http\Controllers\Admin;

use App\Models\AffiliationSetting;
use App\Models\Tax;
use App\Models\UserCryptochil;
use Carbon\Carbon;
use Hash,Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\kyc;
use Illuminate\Routing\Controller;
use App\Models\Subscription;
use App\Models\Deposit;
use Spatie\Permission\Models\Role;
use App\Models\Package;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Support\Renderable;
use Spatie\MediaLibrary\Support\MediaStream;
use App\Models\Transactions;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public $successStatus = 200;
    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(){
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();

            $now = \Carbon\Carbon::now();
            if ($user->p_subscriptions()->where('expire_at', '>', $now)->count() <= 0) {
                $plan_status = 0;
            } else {
                $plan_status = 1;
            }

            $accessToken = $user->createToken('MyLaravelApp')->plainTextToken;

            $success['id'] = $user->id;
            $success['usertype'] = 'User';
            $success['name'] = $user->name;
            $success['user_image'] = '';
            $success['plan_status'] = $plan_status;
            $success['api_token'] = $accessToken;
            $success['profiles'] = $user->profiles;

            return response()->json([ 'data' => $success], $this->successStatus);
        }
        else{
            $errors = [];
            $errors[]['email'][0] = 'Email or password not valid';
            return response()->json(['errors'=>$errors], 401);
        }
    }

    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        $input = $request->except('c_password');
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        $now = \Carbon\Carbon::now();
        if ($user->p_subscriptions()->where('expire_at', '>', $now)->count() <= 0) {
            $plan_status = 0;
        } else {
            $plan_status = 1;
        }

        $accessToken = $user->createToken('MyLaravelApp')->plainTextToken;

        $success['id'] = $user->id;
        $success['usertype'] = 'User';
        $success['name'] = $user->name;
        $success['user_image'] = '';
        $success['plan_status'] = $plan_status;
        $success['api_token'] = $accessToken;
        $success['profiles'] = $user->profiles;

        return response()->json(['data' => $success], $this-> successStatus);
    }

    /**
     * details api
     *
     * @return \Illuminate\Http\Response
     */
    public function userDetails()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this-> successStatus);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $roles = Role::where('name','!=','super_admin')->get();
        $users=User::whereHas('roles', function ($query) {
            $query->where('name','!=', 'super_admin');
        })->get();
        return view('admin.user.index',compact('users','roles'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $subscriptions = Subscription::all();
        $roles = Role::where('name','!=','super_admin')->get();
        return view('admin.user.create', compact('subscriptions', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required',
        ]);
        $user = User::create(['name' => $request->name, 'email' => $request->email, 'password' => Hash::make($request->password)]);
        $user->roles()->sync($request->roles);
        $user->createAsStripeCustomer();

        $subscriptions = $request->subscriptions;
        $data = [];
        if ($subscriptions){
            foreach ($subscriptions as $subscription_id){
                $subscription = Subscription::find($subscription_id);
                if($subscription->recurring == 1){
                    $expire_at = Carbon::now()->addDays($subscription->days)->format('Y.m.d H:i:s');
                }else{
                    $expire_at = Carbon::now()->addYears(10)->format('Y.m.d H:i:s');
                }

                $data[$subscription_id] = ['expire_at' => $expire_at];
            }
        }
        $user->p_subscriptions()->sync($data);
        return back()->with('success','User added Successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function detail(User $user)
    {
        $users = User::get();
        $subscriptions = Subscription::all();
        return view('admin.user.detail',compact('user', 'users', 'subscriptions'));
    }
    public function accounts(User $user)
    {
        return view('admin.user.accounts',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('admin.user.edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request)
    {
        $user=User::find($request->id);
        $user->name=$request->name;
        $user->ref_by= $request->ref_by;
        $user->referral =$request->referral;
        
        $user->a_cash =$request->a_cash;
        $user->balance =$request->balance;
        if($request->password){
            $user->password=Hash::make($request->password);
        }
        $user->save();
        $user->roles()->sync($request->roles);

        $subscriptions = $request->subscriptions;
        $data = [];
        if ($subscriptions){
            foreach ($subscriptions as $subscription_id){


                $subscription = Subscription::find($subscription_id);
                if($subscription->recurring == 1){
                    $expire_at = Carbon::now()->addDays($subscription->days)->format('Y.m.d H:i:s');
                }else{
                    $expire_at = Carbon::now()->addYears(10)->format('Y.m.d H:i:s');
                }

                $data[$subscription_id] = ['expire_at' => $expire_at];
            }
        }
        $user->p_subscriptions()->sync($data);

        return back()->with('success','Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.all')->with('delete','User Deletd Successfully!');
    }
    public function profile(){
        $user = Auth::user();
        return view('admin.user.profile', compact('user'));
    }
    public function affiliation(User $user = null){
        if (!$user){
            $user = Auth::user();
        }
        $refarals = User::where('ref_by',Auth::user()->id)->get();

        return view('admin.user.affiliation', compact('user','refarals'));
    }

    public function profileUpdate(Request $request){
        $user=Auth::user();
        $user->name=$request->name;
        if($request->password){
            $user->password=Hash::make($request->password);
        }
        $user->save();
        return redirect('/dashboard')->with('success','Updated');
    }

    public function business(User $user){
        if($user->email){
            $user = User::find($user->id);
        }else{
            $user = Auth::user();
        }
        $initiatives = json_decode($user->initiatives);
        if(is_null($initiatives)){
            $initiatives = [];
        }
        return view('admin.user.business', compact('user', 'initiatives'));
    }
    public function businessUpdate(Request $request){
        $user= User::find($request->user_id);
        $user->update($request->except('_token', 'user_id'));
        return back()->with('success','Updated');
    }
    public function user_affiliation(User $user)
    {
        $referals = User::where('ref_by',$user->id)->get();
        return view('admin.user.user_affiliation',compact('user','referals'));
    }
    public function user_agreement(User $user)
    {
        return view('admin.user.user_agreement',compact('user'));
    }
    public function transactions(User $user)
    {
        // dd($user);
        $transactions = Transactions::where('user_id',$user->id)->get();
        return view('admin.user.transactions',compact('user','transactions'));
    }
    public function add_user(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required',
            'cpassword' => 'required|same:password',
            'role' => 'required',
        ]);
        // dd($request);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $password = $request->password;
        $cpassword = $request->cpassword;
        if ($password == $cpassword)
        {
            $user->password = Hash::make($password);
        }
        $user->save();
        $user->assignRole($request->role);
        return redirect()->route('user.all')->with('add','User Added Successfully');

    }
    public function affliation_setting()
    {
        $affliation = AffiliationSetting::first();
        $tax = Tax::first();
        return view('admin.user.affliation_setting',compact('affliation', 'tax'));
    }
    public function affliation_add_update(Request $request)
    {
        $request->validate([
            'percentage'=>'required',
            'recurring'=>'required|integer'
        ]);
        $affliation = AffiliationSetting::first();
        if (!$affliation) {
            AffiliationSetting::create($request->except('_token'));
        }
        else{
            $affliations = $affliation::first();
            $affliations->update($request->except('_token'));
        }
        return redirect()->route('affliation.setting')->with('add','Affliation Setting Updated Successfully!');
    }
    public function tax_add_update(Request $request)
    {

        $tax = Tax::first();
        if (!$tax) {
            Tax::create($request->except('_token'));
        }
        else{
            $tax = $tax::first();
            $tax->update($request->except('_token'));
        }
        return redirect()->route('affliation.setting')->with('add','Tax Setting Updated Successfully!');
    }

    public function agreement_add_update(Request $request)
    {
        $affliation = AffiliationSetting::first();
        if (!$affliation) {
            AffiliationSetting::create($request->except('_token'));
        }
        else{
            $affliations = $affliation::first();
            $affliations->update($request->except('_token'));
        }
        return redirect()->route('affliation.setting')->with('add','Agreement Setting Updated Successfully!');
    }

    public function tax_document(){
        return view('admin.user.tax_document');
    }
    public function tax_document_post(Request $request){
        $request->validate([
            'year' => 'required',
        ]);
        $year = $request->year;
        $address = $request->address ?? '';
        $recipient_tin = $request->recipient_tin ?? '';
        $user = \Illuminate\Support\Facades\Auth::user();
        $withdraws = $user->withdraws()->where('status', 1)->whereYear('created_at', $year)->get();
        $tax = Tax::first();
        return view('admin.user.withdraws_report', compact( 'year', 'address', 'tax', 'user', 'recipient_tin', 'withdraws'));
    }

    public function subscription_agreement(){
        $setting = AffiliationSetting::first();

        return view('admin.user.settings', compact('setting'));
    }

    public function view_agreement(){
        $setting = AffiliationSetting::first();
        return view('admin.user.view_agreement', compact('setting'));
    }
}
