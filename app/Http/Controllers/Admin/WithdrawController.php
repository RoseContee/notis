<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;
use App\Models\Withdraw;
use App\Models\WithdrawType;
use Illuminate\Support\Facades\Auth;

class WithdrawController extends Controller
{
    public function user_withdraws(){
        $user = Auth::user();
        $withdraws = $user->withdraws;
        return view('admin.withdraw.index', compact('withdraws'));
    }

    public function new_withdraws(){
        $type = WithdrawType::where('status',1)->get();
        return view('admin.withdraw.create', compact('type'));
    }
    public function post_new_withdraws(Request $request){
        $date = date('d');
        if ($date > 5){
            return back()->with('error', 'Sorry! Payout request are between the 1st and the 5 of each month. Thank you');
        }
        $user = Auth::user();
        if ($user->a_cash >= $request->amount){
            $user->withdraws()->create($request->except('_token'));
        }
        $amount = $user->a_cash - $request->amount;
        $user->update([
            'a_cash' => $amount
        ]);
        $data = [
            'name' => $user->name,
            'email' => $user->email,
            'amount' => $user->amount,
            'type' => $user->type,
            'account' => $user->account,
            'note' => $user->note,
        ];
        Mail::send('mails.withdraw_requested', $data, function($message) use ($request) {
            $message->to(env('WITHDRAW_EMAIL'), 'OW Forex New withdrawal request')->subject
            ('OW Forex New withdrawal request');
            $message->from('info@owforex.com', 'OW Forex');
        });
        return redirect(route('withdraws'));
    }

    public function admin_withdraws(){
        $withdraws = Withdraw::get();
        return view('admin.withdraw.withdraws', compact('withdraws'));
    }
    public function withdraw_approve($id){
        $withdraw = Withdraw::find($id);
        $withdraw->update([
            'status' => 1
        ]);
        return back();
    }
    public function withdraw_reject($id){
        $withdraw = Withdraw::find($id);
        $user = $withdraw->user;
        $amount = $user->a_cash + $withdraw->amount;
        $withdraw->user()->update([
            'a_cash' => $amount
        ]);
        $withdraw->delete();
        return back();
    }


    public function withdrawsTypes(){
        $type = WithdrawType::get();
        return view('admin.withdraw.withdarws_type', compact('type'));
    }
    public function withdrawsTypesAdd(){
        return view('admin.withdraw.withdarws_type_add');
    }
    public function withdrawsTypesdestroy($id)
    {
        $product = WithdrawType::findOrFail($id);
        $product->delete();
        return back();
    }
    public function withdrawsTypesstore(Request $request)
    {
        // dd($request);
        $category = new WithdrawType();
        $category->name = $request->category;
        $category->save();
        return back();
    }
    public function withdrawsTypesStatus(Request $request)
    {
        // dd($request);
        $product = WithdrawType::findOrFail($request->id);
        $product->status = $request->status ?? 0;
        $product->save();
        return back();
    }




}
