<?php

namespace App\Mail;

use App\Models\Event;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\HtmlString;

class EmailWithAttachment extends Mailable
{
  use Queueable, SerializesModels;



  /**
   * Create a new message instance.
   *
   * @return void
   */
  protected $event;
  protected $user;

  public function __construct(Event $event, User  $user)
  {
    $this->event = $event;
    $this->user = $user;
  }

  /**
   * Get the message envelope.
   *
   * @return Envelope
   */
  public function envelope()
  {
    return new Envelope(
      subject: 'Participation Ticket',
    );
  }

  /**
   * Get the message content definition.
   *
   * @return Content
   */
  public function content()
  {
    return new Content(view: 'emails.participationEmail', with: [
      'event' => $this->event,
      'user' => $this->user,
    ]);
  }


  /**
   * Get the attachments for the message.
   *
   * @return array
   */
  public function attachments()
  {
    return [];
  }
  public function build() {
    return $this->view('emails.participationEmail')->attach(public_path('pdfs/ticket.pdf'), [
      'as' => 'ticket.pdf',
      'mime' => 'application/pdf',
    ]);
  }
}
