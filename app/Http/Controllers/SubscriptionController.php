<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index(){
        $subscription = Subscription::all();
        return view('admin.subscription.index',compact('subscription'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'email' => 'required|email|unique:subscriptions',
        ]);
        $subscription = new Subscription();
        $subscription->email = $request->email;
        $subscription->save();
        return redirect()->back()->with('success','Subscription Successfully');
    }
}
