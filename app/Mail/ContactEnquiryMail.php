<?php

namespace App\Mail;

use App\Models\ContactEnquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactEnquiryMail extends Mailable
{
  use Queueable, SerializesModels;

  /**
   * Create a new message instance.
   */
  public function __construct(
    public $subject,
    protected ContactEnquiry $contact,
  )
  {}

  /**
   * Get the message envelope.
   */
  public function envelope(): Envelope
  {
    return new Envelope(
      subject: $this->subject,
    );
  }

  /**
   * Get the message content definition.
   */
  public function content(): Content
  {
    return new Content(
      view: 'emails.enquiry.contact',
      with: [
        "country" => $this->contact->country ?? '',
        "organisation" => $this->contact->company ?? '',
        "name" => $this->contact->name ?? '',
        "email" => $this->contact->email ?? '',
        "subjectInp" => $this->contact->subject ?? '',
        "messageText" => $this->contact->message ?? ''
      ]
    );
  }

  /**
   * Get the attachments for the message.
   *
   * @return array<int, \Illuminate\Mail\Mailables\Attachment>
   */
  public function attachments(): array
  {
      return [];
  }
}