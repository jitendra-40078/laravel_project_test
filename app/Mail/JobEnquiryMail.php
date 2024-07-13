<?php

namespace App\Mail;

use App\Models\JobEnquiry;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class JobEnquiryMail extends Mailable
{
  use Queueable, SerializesModels;

  /**
   * Create a new message instance.
   */
  public function __construct(
    public $subject,
    protected JobEnquiry $job,
  ){}

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
      view: 'emails.enquiry.job',
      with: [
        "position" => $this->job->job_title ?? '',
        "fname" => $this->job->first_name ?? '',
        "lname" => $this->job->last_name ?? '',
        "email" => $this->job->email ?? '',
        "mobile" => $this->job->mobile ?? ''
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
    $attachments = [];

    if(isset($this->job->resume) && $this->job->resume && file_exists(public_path($this->job->resume))){
      array_push(
        $attachments,
        Attachment::fromPath(public_path($this->job->resume))
                ->as($this->job->file_name ?? '')
                ->withMime($this->job->file_type ?? '')
      );
    }

    if(isset($this->job->cover_letter) && $this->job->cover_letter && file_exists(public_path($this->job->cover_letter))){
      array_push(
        $attachments,
        Attachment::fromPath(public_path($this->job->cover_letter))
                ->as($this->job->cover_letter_name ?? '')
                ->withMime($this->job->cover_letter_type ?? '')
      );
    }

    if(isset($this->job->other_doc) && $this->job->other_doc && file_exists(public_path($this->job->other_doc))){
      array_push(
        $attachments,
        Attachment::fromPath(public_path($this->job->other_doc))
                ->as($this->job->other_doc_name ?? '')
                ->withMime($this->job->other_doc_type ?? '')
      );
    }

    return $attachments;
  }
}