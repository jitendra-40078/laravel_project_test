<?php

namespace App\Http\Controllers\Backend\View\Enquiry;

use App\Http\Controllers\Controller;
use App\Models\JobEnquiry;

use Illuminate\Http\Request;

class CareerController extends Controller
{
  public function listPage(){
    $responseObject = [
      'pageTitle' => 'DareeSoft - Career',
      'activeMenu' => 'career-list',
      'isListPage' => true,
      'customScriptName' => 'enquiry/career'
    ];

    $data = JobEnquiry::with('job:id,title,language')
            ->select('first_name', 'last_name', 'email', 'mobile', 'resume', 'job_id', 'cover_letter', 'other_doc', 'created_at')
            ->orderBy('created_at', 'desc')
            ->get();

    $responseObject['jobRecords'] = $data;

    return view('backend.enquiry.career.list', $responseObject);
  }
}