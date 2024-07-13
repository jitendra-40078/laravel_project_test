<?php

namespace App\Http\Controllers\Backend\View\Enquiry;

use App\Http\Controllers\Controller;
use App\Models\ContactEnquiry;

use Illuminate\Http\Request;

class ContactController extends Controller
{
  public function listPage(){
    $responseObject = [
      'pageTitle' => 'DareeSoft - Contact Us',
      'activeMenu' => 'contactus-list',
      'isListPage' => true,
      'customScriptName' => 'enquiry/contact-us'
    ];

    $data = ContactEnquiry::select('id', 'name', 'email', 'country', 'subject', 'message', 'company', 'created_at')
            ->orderBy('created_at', 'desc')
            ->get();

    $responseObject['contactRecords'] = $data;

    return view('backend.enquiry.contact.list', $responseObject);
  }
}