<?php

namespace App\Controllers;

use App\Models\News;
use App\Models\User;
use Leaf\Auth;
use Leaf\Auth\Session;
use Leaf\Flash;
use Leaf\Mail;
use Leaf\Mail\SMTP;
use Leaf\Mail\Exception;
use Leaf\Router;

class PagesController extends Controller
{
    public function index()
    {
        if (auth()->status()) {
            $user = User::find(auth()->id());
            $emailSent = false;

            $news = News::where(['published' => true])->take(9)->orderBy('created_at', 'DESC')->get();

            if (is_null($user['email_verified_at']) && $user['verify_code_sent'] == 0) {
                $mail = new Mail(getenv("MAIL_HOST"), getenv("MAIL_PORT"), ['username' => getenv("MAIL_USERNAME"), 'password' => getenv("MAIL_PASSWORD")], true);
                $mail->smtp_connect(getenv("MAIL_HOST"), getenv("MAIL_PORT"), true, getenv("MAIL_USERNAME"), getenv("MAIL_PASSWORD"), 'STARTTLS');

                $mail->basic("Confirm your account", "Please verify your account by clicking the link below:\n\n <a href='https://itsglint.com/account/verify?code=".$user['verify_code']."'>Verify now</a>", $user['email'], "Glint", "hey@itsglint.com");

                if (!$mail) {
                    $app->response->throwErr($mail->errors());
                }

                $mail->send();
                $emailSent = true;
            }

            if ($emailSent) {
                $user['verify_code_sent'] = 1;
                $user->save();

                Flash::set("Please verify your email address", "alert");
                Flash::set("warning", "alertType");
            }

            $flashAlert = Flash::display("alert");
            $flashAlertType = Flash::display("alertType");

            echo view("pages.welcome", ['user' => $user, 'news' => $news, "alert" => $flashAlert, "alertType" => $flashAlertType]);
        } else {
            $flashAlert = Flash::display("alert");
            $flashAlertType = Flash::display("alertType");

            $news = News::where(['published' => true])->take(9)->orderBy('created_at', 'DESC')->get();
            echo view("pages.welcome", ['news' => $news, "alert" => $flashAlert, "alertType" => $flashAlertType]);
        }
    }
}
