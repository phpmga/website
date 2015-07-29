<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Mailgun\Mailgun;
use Illuminate\Support\Facades\Response;

class EmailController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function postContact(Request $request)
    {
        $message = trim(strip_tags($request->get('message')));

        if(!empty($message)) {

            $sender = new Mailgun(config('services.mailgun.secret'));
            $domain = config('services.mailgun.domain');

            $from = $request->get('name', 'Contato pelo site') . ' <' . $request->get('email', 'postmaster@' . $domain) . '>';

            $sender->sendMessage($domain, array(
                'from' => $from,
                'subject' => $request->get('subject', 'Contato pelo site'),
                'to' => config('services.mailgun.contact'),
                'text' => $message
            ));

            return Response::json(['status' => 'success', 'message' => 'Contato enviado com sucesso!']);

        } else {
            return Response::json(['status' => 'error', 'message' => 'Houve um problema ao enviar sua mensagem.']);
        }
    }

}
