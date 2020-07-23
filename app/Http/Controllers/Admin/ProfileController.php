<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    //
    public function add()
    {
        return view('admin.profile.create');
    }
    public function create(Request $request)
    {
        // Varidationを行う
        $this->validate($request, Profile::$rules);
      
        $profile = new Profile;
        $form = $request->all();

        // formに画像があれば、保存する
        if ($form['image']) {
            $path = $request->file('image')->store('public/image');
            $profile->image_path = basename($path);
        } else {
            $profile->image_path = null;
        }

        unset($form['_token']);
        unset($form['image']);
        // データベースに保存する
        $profile->fill($form);
        $profile->save();
        return redirect('admin/profile/create');
    }
}
