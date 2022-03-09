<?php

namespace App\Listeners;

use App\Events\ContactMessage;
use App\Mail\ContactEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailContactMessage
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
     * @param  \App\Events\ContactMessage  $event
     * @return void
     */
    public function handle(ContactMessage $event)
    {
        $title                  = $event->contact->name.' tərəfindən yeni elektron müraciət daxil oldu.';
        $text                   = '
            <table>
                <tr>
                    <td>Ad,Soyad:</td>
                    <td>'.$event->contact->name.'</td>
                </tr>
                <tr>
                    <td>E-mail:</td>
                    <td>'.$event->contact->email.'</td>
                </tr>
                <tr>
                    <td>Telefon:</td>
                    <td>'.$event->contact->telno.'</td>
                </tr>
                <tr>
                    <td>Mesaj:</td>
                    <td>'.$event->contact->message.'</td>
                </tr>
            </table>
            ';

        $details = [
            'title' => $title,
            'body'  => $text
        ];
        Mail::to(env('MAIL_TO_ADDRESS'))->send(new ContactEmail($details));
    }
}
