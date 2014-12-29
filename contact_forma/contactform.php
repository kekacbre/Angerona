<?PHP

/*

    Contact Form from HTML Form Guide

    This program is free software published under the

    terms of the GNU Lesser General Public License.

    See this page for more info:

    http://www.html-form-guide.com/contact-form/php-contact-form-tutorial.html

*/

require_once("./include/fgcontactform.php");



$formproc = new FGContactForm();





//1. Add your email address here.

//You can add more than one receipients.

$formproc->AddRecipient('info@scalateam.com'); //<<---Put your email address here





//2. For better security. Get a random tring from this link: http://tinyurl.com/randstr

// and put it here

$formproc->SetFormRandomKey('UC2oq2mi33pNLGh');





if(isset($_POST['submitted']))

{

   if($formproc->ProcessForm())

   {

        $formproc->RedirectToURL("thank-you.php");

   }

}



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>

      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>

      <title>Contact us</title>

      <link rel="STYLESHEET" type="text/css" href="contact.css" />

      <script type='text/javascript' src='scripts/gen_validatorv31.js'></script>

</head>

<body>



<!-- Form Code Start -->

<form id='contactus' action='<?php echo $formproc->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>

<input type='hidden' name='submitted' id='submitted' value='1'/>

<input type='hidden' name='<?php echo $formproc->GetFormIDInputName(); ?>' value='<?php echo $formproc->GetFormIDInputValue(); ?>'/>

<input type='text'  class='spmhidip' name='<?php echo $formproc->GetSpamTrapInputName(); ?>' />



<div class='short_explanation'>* required</div>



<div><span class='error'><?php echo $formproc->GetErrorMessage(); ?></span></div>

<div class='container'>

    <label for='name' ><font color="#000">Name*:</font> </label><br/>

    <input type='text' name='name' id='name' value='<?php echo $formproc->SafeDisplay('name') ?>' maxlength="50" /><br/>

    <span id='contactus_name_errorloc' class='error'></span>

</div>

<div class='container'>

    <label for='email' ><font color="#000">Email*:</font></label><br/>

    <input type='text' name='email' id='email' value='<?php echo $formproc->SafeDisplay('email') ?>' maxlength="50" /><br/>

    <span id='contactus_email_errorloc' class='error'></span>

</div>

<div class='container'>

    <label for='tema' ><font color="#000">Subject*:</font> </label><br/>

    <input type='text' name='tema' id='tema' value='<?php echo $formproc->SafeDisplay('tema') ?>' maxlength="50" /><br/>

    <span id='contactus_name_errorloc' class='error'></span>

</div>

<div class='container'>

    <label for='message' ><font color="#000">Message:</font></label><br/>

    <span id='contactus_message_errorloc' class='error'></span>

    <textarea rows="10" cols="50" name='message' id='message'><?php echo $formproc->SafeDisplay('message') ?></textarea>

</div>





<div class='container'>

    <input type='submit' name='Submit' value='Pošalji' />

</div>





</form>

<!-- client-side Form Validations:

Uses the excellent form validation script from JavaScript-coder.com-->



<script type='text/javascript'>

// <![CDATA[



    var frmvalidator  = new Validator("contactus");

    frmvalidator.EnableOnPageErrorDisplay();

    frmvalidator.EnableMsgsTogether();

    frmvalidator.addValidation("name","req","Molimo Vas unesite ime i prezime.");



    frmvalidator.addValidation("email","req","Molimo Vas unesite e-mail adresu.");



    frmvalidator.addValidation("email","email","Uneta adresa nije validna, molimo Vas proverite.");



	frmvalidator.addValidation("tema","req","Molimo Vas unesite temu poruke.");

	

    frmvalidator.addValidation("message","maxlen=2048","Vaša poruka je prevelika!(najviše 2KB!)");



// ]]>

</script>



</body>

</html>