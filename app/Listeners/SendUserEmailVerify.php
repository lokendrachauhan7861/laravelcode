<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\UserEmailVerify;
use Mail;

class SendUserEmailVerify
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(UserEmailVerify $event)
    {

      $data =  $event->user;
      $name = $data['name'];
      $email = $data['email'];
      $messagedata = "activation link";
      $to_name = $name;
      $to_email = $email;
      $data = array("name"=>$name,"email"=>$email,"messagedata"=>$messagedata);
      Mail::send('mailTemplate/userVerify',$data,function($message) use ($to_name,$to_email){
      $message->to($to_email)->subject('test');
      });
      
    }
}
