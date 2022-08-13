<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\User;

class SettingController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $settings = Setting::first();
        return view('admin.settings.index',compact('settings','user'));
    }

    public function site_update(Request $request)
    {
        $this->validate($request,[
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'site_title' => 'required',
            'description' => 'required',
        ]);

        $site = Setting::find(1);
        $site->site_title = $request->site_title;
        $site->description = $request->description;
        if($request->hasFile('logo')){
            $logo = $request->file('logo');
            $logo_name = time().'.'.$logo->getClientOriginalExtension();
            $logo->move('images/logo/',$logo_name);
            $site->logo = 'images/logo/'.$logo_name;
        }
        $site->save();
        return redirect()->back()->with('success','Site Setting Updated Successfully');
    }

    public function footer_update(Request $request)
    {
        $this->validate($request,[
            'about_us' => 'required',
            'copyright_text' => 'required',
            'facebook_link' => 'required',
            'twitter_link' => 'required',
            'github_link' => 'required',
            'feed_link' => 'required',
            'email' => 'required',
        ]);
        $footer = Setting::find(1);
        $footer->about_us = $request->about_us;
        $footer->copyright_text = $request->copyright_text;
        $footer->facebook_link = $request->facebook_link;
        $footer->twitter_link = $request->twitter_link;
        $footer->github_link = $request->github_link;
        $footer->feed_link = $request->feed_link;
        $footer->email = $request->email;
        $footer->save();
        return redirect()->back()->with('success','Footer Updated Successfully');
    }

    public function sidebar_update(Request $request)
    {

        $sidebar = Setting::find(1);
        $sidebar->author_bio = $request->author_bio;
        $sidebar->popular_post = $request->popular_post;
        $sidebar->category = $request->category;
        $sidebar->tags = $request->tags;
        $sidebar->save();
        return redirect()->back()->with('success','Sidebar Updated Successfully');
    }

    public function user_update(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'avater' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->hasFile('avatar')){
            $avater = $request->file('avatar');
            $avater_name = time().'.'.$avater->getClientOriginalExtension();
            $avater->move('images/avater/',$avater_name);
            $user->avatar = 'images/avater/'.$avater_name;
        }
        $user->save();
        return redirect()->back()->with('success','User Updated Successfully');
    }
}
