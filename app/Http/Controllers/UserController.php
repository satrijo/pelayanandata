<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function edit()
    {
        $data = User::first();

        // dd($data);
        return view('backend.user.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $kontak = Contact::first();
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $name = trim($request->name);
        $email = trim($request->email);
        $password = trim($request->password);
        $password2 = trim($request->password2);

        $mail= [$name, $email, $kontak->email, $password];
        if($password !== $password2){
            return back()->with('tidaksama', 'Password tidak sama!');
        }else if(is_null($request->password)){
            $update = User::find($id)->update([
                'name' => $name,
                'email' => $email,
            ]);
            Mail::send([], $mail, function ($message) use ($mail) {
                $message->to($mail[1])->cc($mail[2])->subject('Perubahan Email Aplikasi PTSP')
                ->setBody('Informasi perubahan Email ' . url('/') . ' => Email: ' . $mail[1]);
            });
        }else {
            $update = User::find($id)->update([
                'name' => $name,
                'email' => $email,
                'password' =>Hash::make($password),
            ]);

            Mail::send([], $mail , function ($message) use ($mail) {
            $message->to($mail[1])->cc($mail[2])->subject('Perubahan Password dan Email Aplikasi PTSP')
                ->setBody('Informasi perubahan Password dan Email ' . url('/') . ' => Email: ' . $mail[1] . ' Password: ' . $mail[3]  );
            });
        }



        return back()->with('sukses', 'Berhasil mengupdate data user!');

    }
}
