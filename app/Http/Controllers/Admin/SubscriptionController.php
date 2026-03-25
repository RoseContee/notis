<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Account;
use App\Models\Subscription;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $subscriptions=Subscription::all();
        return view('admin.subscription.index', compact('subscriptions'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin.subscription.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $subscription = Subscription::create($request->except('_token', 'image'));
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $subscription->addMediaFromRequest('image')->toMediaCollection('image');
        }
        return redirect(route('subscription.all'))->with('success', 'Subscription Added Successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(Subscription $sub)
    {
        return view('admin.subscription.show', compact('sub'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Subscription $subscription)
    {
        return view('admin.subscription.edit', compact('subscription'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $subscription=Subscription::findorfail($id);
        $subscription->update($request->except('_token', 'image'));
//        if ($subscription->wasChanged('accounts')){
//
//            $users = User::whereHas('roles', function ($query) {
//                $query->where('name','!=', 'super_admin');
//            })->get();
//
//            $subscription_accounts = $subscription->accounts;
//
//            foreach ($users as $user){
//                $user_accounts = 0;
//                $all_accounts = [];
//                $sub_ifo = get_subscription_info($user);
//                if ($sub_ifo) {
//                    $all_accounts = $user->accounts()->where('p_subscription_id', $sub_ifo['subscription']->id)->get();
//                    $user_accounts = count($all_accounts);
//                    if ($user_accounts < $subscription_accounts) {
//                        $difference = $subscription_accounts - $user_accounts;
//                        for ($x = 1; $x <= $difference; $x++) {
//                            $user->accounts()->create([
//                                'number' => $x,
//                                'p_subscription_id' => $subscription->id
//                            ]);
//                        }
//                    } elseif ($user_accounts > $subscription_accounts) {
//                        $del_accounts = $user->accounts()->where('p_subscription_id', $sub_ifo['subscription']->id)->get()->slice($subscription_accounts);
//                        foreach ($del_accounts as $del) {
//                            $del->delete();
//                        }
//                    }
//                }
//
//            }
//            $accounts = Account::all();
//            account_key_file($accounts);
//        }
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $subscription->clearMediaCollection('image');
            $subscription->addMediaFromRequest('image')->toMediaCollection('image');
        }
        return redirect(route('subscription.all'))->with('success', 'Subscription Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $sub=Subscription::findorfail($id);
        $sub->clearMediaCollection('image');
        $sub->delete();
        return redirect(route('subscription.all'))->with('success', 'Subscription Deleted Successfully');
    }
    public function key_number()
    {
        // $subscriptions = Subscription::all();
        return view('admin.subscription.update_key_number');
    }
    public function clone($id)
    {
        $subscription = Subscription::findOrFail($id);
        return view('admin.subscription.clone',compact('subscription'));
    }
}
