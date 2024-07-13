<?php

namespace App\Http\Controllers\Web\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\{Mail, App, Validator};

use App\Utility\{ApiResponse, CommonActions};
use App\Http\Controllers\Web\Api\Validators\Contact as ContactValidator;
use App\Http\Controllers\Web\Api\Validators\Newsletter as NewsletterValidator;
use App\Http\Controllers\Web\Api\Validators\Job as JobValidator;

use App\Models\{ContactEnquiry, NewsletterEnquiry, JobEnquiry, Setting};

use App\Mail\{JobEnquiryMail, ContactEnquiryMail};
use App\Utility\Logs\WebLogs;

class FormController extends Controller
{
  
  protected $controllerPath = 'App/Http/Controllers/Web/Api/FormController';

  /**
   *  @api - Newsletter Enquiry
   *  @url - /api/web/newsletter/store
   *  @author - Amit Kashte
   *  @function - function to store newsletter details
   */
  public function newsletterEnquiry(Request $request){
    $locale = App::getLocale();
    $language = $locale && $locale === "en" ? "en": "kr";
    
    $rules = NewsletterValidator::rules();
    $messages = NewsletterValidator::messages($language);

    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
      return ApiResponse::validateError($validator->errors());
    }

    try{
      $validatedData = $validator->validated();
      $ipAddress = $request->header('X-Forwarded-For') ?? $request->ip();

      $newRecord = new NewsletterEnquiry();

      $newRecord->email = $validatedData['subscribeEmail'];
      $newRecord->ip_address = $ipAddress;
      
      $newRecord->save();

      return ApiResponse::alert(
        201, 
        'success', 
        $language === 'en' ? "You're Subscribed!" : "구독이 완료되었습니다.", 
        'success', 
        $language === 'en' ? 'newsletterThankYouEn' : 'newsletterThankYouKr', 
        null
      );
    }
    catch(\Throwable $e){
      
      WebLogs::logError(
        'NEWSLETTER ENQUIRY',
        $this->controllerPath.'@newsletterEnquiry',
        $e
      );

      return ApiResponse::alert(
        422, 
        'alert', 
        $language === 'en' ? 'Failure' : '실패', 
        'error', 
        $language === 'en' ? 'failureMsgEn' : 'failureMsgKr', 
        null
      );
    }
  }

  /**
   *  @api - Contact Enquiry
   *  @url - /api/web/contact/store
   *  @author - Amit Kashte
   *  @function - function to store contact details
   */
  public function contactEnquiry(Request $request){
    $locale = App::getLocale();
    $language = $locale && $locale === "en" ? "en": "kr";
    
    $rules = ContactValidator::rules();
    $messages = ContactValidator::messages($language);

    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
      return ApiResponse::validateError($validator->errors());
    }

    try{
      $validatedData = $validator->validated();
      $ipAddress = $request->header('X-Forwarded-For') ?? $request->ip();

      $newRecord = new ContactEnquiry();

      $newRecord->name = $validatedData['name'];
      $newRecord->email = $validatedData['email'];
      $newRecord->country = $validatedData['country'];
      $newRecord->company = $validatedData['company'];
      $newRecord->subject = $validatedData['subject'];
      $newRecord->message = $validatedData['message'] ?? '';
      $newRecord->ip_address = $ipAddress;
      
      $newRecord->save();

      $settings = Setting::select('options')
                          ->where('key', 'mail-contact-enquiry')
                          ->first();

      if( $settings ){
        $mailSubject = isset($settings->options['subject']) && $settings->options['subject'] ? $settings->options['subject'] : '';
        $toMails = isset($settings->options['toEmails']) && $settings->options['toEmails'] ? array_map('trim', explode(',', $settings->options['toEmails'])) : '';
        $ccMails = isset($settings->options['ccEmails']) && $settings->options['ccEmails'] ? array_map('trim', explode(',', $settings->options['ccEmails'])) : '';

        if( $mailSubject && $toMails ){
          $mail = Mail::to($toMails);
          
          if( $ccMails && !empty($ccMails) ){
            $mail->cc($ccMails);
          }

          $mail->send(new ContactEnquiryMail($mailSubject, $newRecord));
        }
      }

      return ApiResponse::alert(
        201, 
        'success', 
        $language === 'en' ? 'Thank You for Reaching Out!' : '연락해주셔서 감사합니다.', 
        'success', 
        $language === 'en' ? 'contactThankYouEn' : 'contactThankYouKr', 
        null
      );
    }
    catch(\Exception $e){
      WebLogs::logError(
        'CONTACT ENQUIRY',
        $this->controllerPath.'@contactEnquiry',
        $e
      );

      return ApiResponse::alert(
        422, 
        'alert', 
        $language === 'en' ? 'Failure' : '실패', 
        'error', 
        $language === 'en' ? 'failureMsgEn' : 'failureMsgKr', 
        null
      );
    }
  }

  /**
   *  @api - Career Enquiry
   *  @url - /api/web/career/store
   *  @author - Amit Kashte
   *  @function - function to store career details
   */
  public function careerEnquiry(Request $request){
    $locale = App::getLocale();
    $language = $locale && $locale === "en" ? "en": "kr";

    $rules = JobValidator::rules($language);
    $messages = JobValidator::messages($language);

    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
      return ApiResponse::validateError($validator->errors());
    }

    $validatedData = $validator->validated();
    $resumePath = $coverLetterPath = $otherDocPath = '';

    try{

      $resume = CommonActions::validateKey($validatedData, 'jobResume');
      $coverLetter = CommonActions::validateKey($validatedData, 'coverLetter');
      $otherDoc = CommonActions::validateKey($validatedData, 'otherDoc');

      $date = Carbon::now();
      $folderPath = 'job-applications/'.$date->format('Y').'/'.(string)Str::uuid();

      // resume file
      $resumeOgName = $resume->getClientOriginalName();
      $resumeMimeType = $resume->getClientMimeType();
      $resumeFileName = $this->sanitizeFileName($resumeOgName); 
      $resumePath = $folderPath . '/' . $resumeFileName;

      // Move the file to the new directory
      $isResumeUploaded = $resume->move(public_path($folderPath), $resumeFileName);

      // cover letter file
      if( $coverLetter ){
        $coverLetterOgName = $coverLetter->getClientOriginalName();
        $coverLetterMimeType = $coverLetter->getClientMimeType();
        $coverLetterFileName = $this->sanitizeFileName($coverLetterOgName); 
        $coverLetterPath = $folderPath . '/' . $coverLetterFileName;

        // Move the file to the new directory
        $isCoverLetterUploaded = $coverLetter->move(public_path($folderPath), $coverLetterFileName);
      }

      // cover letter file
      if( $otherDoc ){
        $otherDocOgName = $otherDoc->getClientOriginalName();
        $otherDocMimeType = $otherDoc->getClientMimeType();
        $otherDocFileName = $this->sanitizeFileName($otherDocOgName); 
        $otherDocPath = $folderPath . '/' . $otherDocFileName;

        // Move the file to the new directory
        $isOtherDocUploaded = $otherDoc->move(public_path($folderPath), $otherDocFileName);
      }

      $ipAddress = $request->header('X-Forwarded-For') ?? $request->ip();

      $newRecord = new JobEnquiry();

      $newRecord->job_id = $validatedData['jobId'];
      $newRecord->job_title = $validatedData['jobTitle'];
      $newRecord->first_name = $validatedData['jobFirstName'];
      $newRecord->last_name = $validatedData['jobLastName'];
      $newRecord->email = $validatedData['jobEmail'];
      $newRecord->mobile = $validatedData['jobMobile'];
      $newRecord->ip_address = $ipAddress;

      $newRecord->resume = $resumePath;
      $newRecord->file_name = $resumeOgName ?? '';
      $newRecord->file_type = $resumeMimeType ?? '';

      $newRecord->cover_letter = $coverLetterPath;
      $newRecord->cover_letter_name = $coverLetterOgName ?? '';
      $newRecord->cover_letter_type = $coverLetterMimeType ?? '';

      $newRecord->other_doc = $otherDocPath;
      $newRecord->other_doc_name = $otherDocOgName ?? '';
      $newRecord->other_doc_type = $otherDocMimeType ?? '';

      $newRecord->save();

      $settings = Setting::select('options')
                          ->where('key', 'mail-career-enquiry')
                          ->first();

      if( $settings ){
        $mailSubject = isset($settings->options['subject']) && $settings->options['subject'] ? $settings->options['subject'] : '';
        $toMails = isset($settings->options['toEmails']) && $settings->options['toEmails'] ? array_map('trim', explode(',', $settings->options['toEmails'])) : '';
        $ccMails = isset($settings->options['ccEmails']) && $settings->options['ccEmails'] ? array_map('trim', explode(',', $settings->options['ccEmails'])) : '';

        if( $mailSubject && $toMails ){
          $mail = Mail::to($toMails);
          
          if( $ccMails && !empty($ccMails) ){
            $mail->cc($ccMails);
          }

          $mail->send(new JobEnquiryMail($mailSubject, $newRecord));
        }
      }

      return ApiResponse::alert(
        201, 
        'success', 
        $language === 'en' ? 'Thank You for Reaching Out!' : '다리소프트에 지원해주셔서 감사합니다.', 
        'success', 
        $language === 'en' ? 'careerThankYouEn' : 'careerThankYouKr', 
        null
      );
    }
    catch(\Throwable $e){
      $this->removeFile($resumePath);

      if($coverLetterPath){ $this->removeFile($coverLetterPath); }
      if($otherDocPath){ $this->removeFile($otherDocPath); }

      WebLogs::logError(
        'CAREER ENQUIRY',
        $this->controllerPath.'@careerEnquiry',
        $e
      );

      return ApiResponse::alert(
        422, 
        'alert', 
        $language === 'en' ? 'Failure' : '실패', 
        'error', 
        $language === 'en' ? 'failureMsgEn' : 'failureMsgKr', 
        null
      );
    }
  }

  protected function sanitizeFileName($filename){
    // Remove spaces and replace with hyphens
    $nameWithoutExtension = pathinfo($filename, PATHINFO_FILENAME);
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    
    // Use Laravel's Str::slug method or str_replace for basic replacement
    $slug = Str::slug($nameWithoutExtension).'_'.uniqid().'.'.$extension;
  
    return $slug;
  }

  protected function removeFile($path){
    try {
      if (isset($path) && file_exists(public_path($path))) {
        unlink(public_path($path));
      }
    } catch (\Throwable $e) {

      WebLogs::logError(
        'REMOVE FILE',
        $path,
        $e
      );
      
    }

    return;
  }
}