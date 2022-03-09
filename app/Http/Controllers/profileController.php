<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class profileController extends Controller
{
    public function profile()
    {
        return view('back.pages.profile');
    }

    public function avatarUpload(Request $request)
    {
        $this->validate($request,[
            'file' => 'image|mimes:jpeg,png,jpg'
        ],[],[
            'file'=>'Şəkil'
        ]);

        $file = $request->file('file');

        $user = User::whereId(auth()->user()->id)->first();
        if (File::exists('avatars/'.$user->avatar))
        {
            if ($user->avatar != 'avatar.jpg')
            {
                File::delete('avatars/'.$user->avatar);
            }
        }

        $filename  = pathinfo( $file->getClientOriginalName(), PATHINFO_FILENAME );
        $extention = $file->getClientOriginalExtension();
        $new_name  = $filename . '-' . time() . '.' . $extention;


        $image_resize = Image::make($file->getRealPath());
        $image_resize = $image_resize->orientate();
        $image_resize->resize(200, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        $image_resize->save('./avatars/' .$new_name);

        User::whereId(auth()->user()->id)->update([
            'avatar'=>$new_name
        ]);
    }

    public function profileUpdate(Request $request)
    {
        if (auth()->user()->provider === null)
        {
            $this->validate($request,[
                'name'=>'required|max:50',
                'password'=>['required', new MatchOldPassword()],
                'ypassword'=>'required|min:8|max:40'
            ],[],[
                'name'=>'Ad & Soyad',
                'password'=>'Köhnə şifrə',
                'ypassword'=>'Yeni şifrə'
            ]);

            User::whereId(auth()->user()->id)
                ->update([
                    'name'=>$request->name,
                    'password'=>bcrypt($request->ypassword)
                ]);
        }
        else
        {
            User::whereId(auth()->user()->id)
                ->update([
                    'name'=>$request->name,
                ]);
        }



    }

    public function langSwitcher($locale)
    {
        if (in_array($locale,['az','en','ru'])) {
            session()->put('locale', $locale);
        }
        else
        {
            session()->put('locale', 'az');
        }

        return redirect()->back();
    }
}
