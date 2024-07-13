<?php

namespace App\Http\Controllers\Backend\View\Enquiry;

use App\Http\Controllers\Controller;
use App\Models\NewsletterEnquiry;

use Illuminate\Http\Request;

class NewsletterController extends Controller
{
  public function listPage(){
    $responseObject = [
      'pageTitle' => 'DareeSoft - Newsletter',
      'activeMenu' => 'newsletter-list',
      'isListPage' => true,
      'customScriptName' => 'enquiry/newsletter'
    ];

    $data = NewsletterEnquiry::select('id', 'email', 'created_at')
            ->orderBy('created_at', 'desc')
            ->get();

    $responseObject['newsletterRecords'] = $data;

    return view('backend.enquiry.newsletter.list', $responseObject);
  }
}