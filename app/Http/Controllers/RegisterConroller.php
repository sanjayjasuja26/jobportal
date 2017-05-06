<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegisterConroller extends Controller
{
    public function userstore(Request $request)
    {
      $user= new User;
      $user->name=$request->name;
      $user->email=$request->email;
      $user->phone=$request->phone;
      $user->current_location=$request->current_location;
      $user->password= \Hash::make($request['password']);
      $user->role_id=2;

      if($request->hasfile('file_path'))
      {
          $file = $request->file('file_path');
          $path='users/pdf';
          $filename = $file->getClientOriginalName();
          $filename = time().'_'.$filename;

          $user->file_path = $path.'/'.$filename;

          $file->move($path,$filename);
       }

      $user->save();
      $id=$user->id;

      $email=$user->email;
      $name=$user->name;
      $toEmail='admin@gmail.com';
      $subject=$name=$user->name.'New client Added';

      \Mail::send('emails.admin_notification', ['email' => $email, 'userName' => $name], function ($m) use ( $toEmail,$subject)
      {
         $m->to($toEmail)->subject($subject);
      });
         \Auth::loginUsingId($id);
      return redirect('/home');

    }
}
