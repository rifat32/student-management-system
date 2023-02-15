<?php

namespace App\Mail;

use App\Models\EmailTemplate;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    private $user;

    public function __construct($user=null)
    {

        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $html_content = EmailTemplate::where([
            "type" => "forget_password_mail",
            "is_active" => 1

        ])->first()->template;


        $html_content = json_decode($html_content);
        $html_content =  str_replace("[FirstName]", $this->user->first_Name, $html_content );
        $html_content =  str_replace("[LastName]", $this->user->last_Name, $html_content );
        $html_content =  str_replace("[FullName]", ($this->user->first_Name. " " .$this->user->last_Name), $html_content );
        $html_content =  str_replace("[AccountVerificationLink]", (env('APP_URL').'/activate/'.$this->user->email_verify_token), $html_content);
        $html_content =  str_replace("[ForgotPasswordLink]", (env('FRONT_END_URL').'/fotget-password/'.$this->user->resetPasswordToken), $html_content );





        return $this->view('email.dynamic_mail',["html_content"=>$html_content]);

    }
}
