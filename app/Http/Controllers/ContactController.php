<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Client;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'message' => 'required|string',
            'g-recaptcha-response' => 'required'
        ]);

        // Validação do reCAPTCHA
        $client = new Client();
        $response = $client->post('https://www.google.com/recaptcha/api/siteverify', [
            'form_params' => [
                'secret' => env('RECAPTCHA_SECRET_KEY'),
                'response' => $request->input('g-recaptcha-response')
            ]
        ]);
        
        $captchaSuccess = json_decode($response->getBody())->success;
        if (!$captchaSuccess) {
            return back()->withErrors(['g-recaptcha-response' => 'Falha na verificação do reCAPTCHA.'])->withInput();
        }

        // Dados para o e-mail
        $data = $request->only('name', 'email', 'phone', 'message');

        // Envia o e-mail usando o mailable
        Mail::to(config('mail.from.address'))->send(new ContactMail($data));

        return back()->with('success', 'Mensagem enviada com sucesso!');
    }
}
