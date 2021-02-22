<?php
  /**
  * Requires the "PHP Email Form" library 
  * The "PHP Email Form" library
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  */

  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'abhishekrastogidev@gmail.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_company_name = $_POST['company_name'];
  $contact->from_phone = $_POST['phone'];
  $contact->from_designation = $_POST['designation'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  
  $contact->smtp = array(
    'host' => 'smtp_server=smtp.gmail.com',
    'username' => 'abhishekrastogidev@gmail.com',
    'password' => 'Admin122@',
    'port' => '587'
  );
  

  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['company_name'], 'Company');
  $contact->add_message( $_POST['designation'], 'Designation');
  $contact->add_message( $_POST['phone'], 'Phone');
  $contact->add_message( $_POST['message'], 'Message', 10);

  echo $contact->send();
?>
