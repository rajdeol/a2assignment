<?php
/**
 * controller to handle requests for home page
 */
class HomeController extends BaseController {
    /**
     * function to display landing page
     * @return mixed processed HTML
     */
    public function showHome()
    {
            return View::make('home');
    }
    
    /**
     * save contact enquiry
     */
    public function saveContactUs()
    {
        $name = Input::get('name');
        $email = Input::get('email');
        $phone = Input::get('phone');
        $contact_method = Input::get('contact_method');
        $enquiry = e(Input::get('enquiry'));
        $invoice_number = Input::get('invoice_number');
        // check for required fields
        if(empty($name)||empty($email)){
            echo "Name and email are required. Please submit the form again";
            return;
        }
        // save the data in database first
        $contact = new Contact();
        $contact->name = $name;
        $contact->email = $email;
        $contact->phone_number = $phone;
        $contact->contact_method = $contact_method;
        $contact->enquiry_info = $enquiry;
        $contact->invoice_number = $invoice_number;
        $contact->save();
        // send email
        /**
         * configure the smtp details in app/config/mail.php
         * and after that uncommet the code below to send emails
         */
//        Mail::send('emails.contact.contact', Input::all('firstname'), 
//                function($message){
//                $message->to(Config::get('contact.contact_email'))
//                        ->subject(Config::get('contact.contact_subject'));
//                }
//        );
        
        echo "Enquiry Submitted. ThankYou.";
    }
    
}
