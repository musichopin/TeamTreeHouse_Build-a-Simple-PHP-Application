<?php 
$name = $_POST["name"];
$email =  $_POST["email"];
$message =  $_POST["message"];
$email_body = "";
$email_body = $email_body . "Name: " . $name . "\n";
$email_body = $email_body . "Email: " . $email . "\n";
$email_body = $email_body . "Message: " . $message;

// TODO: Send Email

header("Location: contact-thanks.php?status=$name"); // **redirects**

?>


<!-- ***with above code php first sends the mail and then redirects to contact-thanks.php page.
with below code, however, since sending mail and showing a feedback to the user would be on the same page the user wud see a prompt from the browser about sending the same request to the server (not a big deal with mailing but important when we order something or make money transfer)***-->
<!-- #2 -->
<?php 
/*$name = $_POST["name"];
$email =  $_POST["email"];
$message =  $_POST["message"];
$email_body = "";
$email_body = $email_body . "Name: " . $name . "\n";
$email_body = $email_body . "Email: " . $email . "\n";
$email_body = $email_body . "Message: " . $message;

// TODO: Send Email

$pageTitle = "Contact Mike";
$section = "contact";
include('inc/header.php'); ?>

<div class="section page">

        <div class="wrapper">

            <h1>Contact</h1>

            <p>Thanks for the email <?php echo $name ?>! I&rsquo;ll be in touch shortly!</p>

        </div>

</div>

<?php include('inc/footer.php')*/?>