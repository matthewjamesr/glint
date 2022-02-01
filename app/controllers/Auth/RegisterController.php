<?php

namespace App\Controllers\Auth;

use Leaf\Auth;
use Leaf\Mail;

class RegisterController extends Controller
{
    public function show()
    {
        Auth::guard("guest");

        echo view("pages.auth.register");
    }
    
    public function store()
    {

        Auth::guard("guest");

        $credentials = request(["username", "email", "password"]);
        $credentials["verify_code"] = substr(md5(uniqid(rand(), true)), 16, 16);

        $validation = $this->form->validate([
            "username" => "validUsername",
            "email" => "email",
            "password" => "required"
        ]);

        if (!$validation) {
            // validation errors will be found in form->errors
            echo view("pages.auth.register", array_merge(
                ["errors" => array_merge(Auth::errors(), $this->form->errors())],
                $credentials
            ));
        } else {
            Auth::config("SESSION_ON_REGISTER", true);

            $user = Auth::register("users", $credentials, [
                "username", "email"
            ]);

            $mail = new Leaf\Mail(getenv("MAIL_HOST"), getenv("MAIL_PORT"), ['username' => getenv("MAIL_USERNAME"), 'password' => getenv("MAIL_PASSWORD")], true, true);
            $mail->write([
                "subject" => "Glint: Verify Account",
                "body" => "Your verification code: " + $user->verify_code,
                "recepient_email" => $user->email,
                "sender_name" => "no-reply@itsglint.com"
            ]);

            if (!$mail) {
                $app->response->throwErr($mail->errors());
            }

            try {
                $mail->send();
            } catch (\Throwable $th) {
                throw $mail->errors();
            }
    
            if (!$user) {
                echo view("pages.auth.register", array_merge(
                    ["errors" => array_merge(Auth::errors(), $this->form->errors())],
                    $credentials
                ));
            }
        }
    }
}
