<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Curriculo;

class EnvioCurriculo extends Mailable
{
    use Queueable, SerializesModels;

    private $curriculo;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Curriculo $curriculo)
    {
        $this->curriculo = $curriculo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Informativo ' . config('app.name'))
                ->markdown('mail.curriculo.envio')
                ->with([
                  'url' => '/',
                  'curriculo' => $this->curriculo
                ]);;
    }
}
