<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Mailgun\Mailgun;
use Illuminate\Support\Facades\Response;

class EmailController extends Controller
{

    /**
     * Envia email de contato.
     *
     * @param  \Illuminate\Http\Request  $request
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

    /**
     * @param Request $request
     *
     * @throws \Mailgun\Messages\Exceptions\MissingRequiredMIMEParameters
     */
    public function postNews(Request $request) {
        $mg = new Mailgun(config('services.mailgun.secret'));
        $mgValidate = new Mailgun(config('services.mailgun.public'));

        $domain = config('services.mailgun.domain');
        $mailingList = 'novidades@phpmga.net';
        $secretPassphrase = env('APP_KEY');
        $recipientAddress = $request->get('email');

        $result = $mgValidate->get('address/validate', array('address' => $recipientAddress));

        if($result->http_response_body->is_valid == true){
            # Next, instantiate an OptInHandler object from the SDK.
            $optInHandler = $mg->OptInHandler();

            # Next, generate a hash.
            $generatedHash = $optInHandler->generateHash($mailingList, $secretPassphrase, $recipientAddress);

            # Now, let's send a confirmation to the recipient with our link.
            $mg->sendMessage($domain, array('from'    => config('services.mailgun.contact'),
                                            'to'      => $recipientAddress,
                                            'subject' => 'Por favor confirme sua inscrição!',
                                            'html'    => "<html><body>Olá,<br><br>Você solicitou a inclusão de seu email em nossa lista
                                                   $mailingList. Por favor <a
                                                  href=\"http://$domain/email/confirm?hash=$generatedHash\">
                                                  confirme</a> sua inscrição.<br><br>Obrigado!</body></html>"));

            # Finally, let's add the subscriber to a Mailing List, as unsubscribed, so we can track non-conversions.
            if($mg->post("lists/$mailingList/members", array('address'    => $recipientAddress,
                                                          'subscribed' => 'no',
                                                          'upsert'     => 'yes'))) {
                return Response::make(['success' => true]);
            }
        }

        return Response::make(['success' => false]);
    }

    /**
     * @param Request $request
     *
     * @throws \Mailgun\Messages\Exceptions\MissingRequiredMIMEParameters
     */
    public function getConfirm(Request $request) {
        $mg = new Mailgun(config('services.mailgun.secret'));
        $domain = config('services.mailgun.domain');

        $optInHandler = $mg->OptInHandler();

        $inboundHash = $request->get('hash');
        $secretPassphrase = env('APP_KEY');

        $hashValidation = $optInHandler->validateHash($secretPassphrase, $inboundHash);

        if($hashValidation){
            $validatedList = $hashValidation['mailingList'];
            $validatedRecipient = $hashValidation['recipientAddress'];

            $body = "<html><body>Olá,<br><br>Adicionamos seu email na nossa lista, $validatedList!<br><br>Obrigado!</body></html>";

            $mg->put("lists/$validatedList/members/$validatedRecipient",
                     array('address'    => $validatedRecipient,
                           'subscribed' => 'yes'));

            $mg->sendMessage($domain, array('from'    => config('services.mailgun.contact'),
                                            'to'      => $validatedRecipient,
                                            'subject' => 'Confirmado!',
                                            'html'    => $body));

            return Response::make($body);
        }

        return Response::make("N&atilde;o foi poss&iacute;vel confirmar sua inscri&ccedil;&atilde;o, tente novamente mais tarde.");
    }
}
