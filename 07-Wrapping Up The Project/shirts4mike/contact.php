<?php 
//bu if sta sayesinde sayfa reload edilirken if sta içi yürütülmez
if ($_SERVER["REQUEST_METHOD"] == "POST") {//form submit edilirse aktif olur
// *aynı sayfada birden fazla post requestli form olsaydı if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['input_name'])) denecekti*

    // 2. handles the submission
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $message = trim($_POST["message"]); /*body*/
    
    // FORM VALIDATION:
    // textbox, text-area, password, select fieldleri boş bırakılsa da 
    // her seferinde value (name attr ile) set edilmiş olur 
    // ve hiç input olmasa bile value null olur.
    // checkbox veya radio button olsaydı yukarıda assignment yapılırken
    // if (isset($_POST[name])) {$name=$_POST[name];} else {$name='';} denecekti
    // (ancak garanti olsun diye bu yöntem diğer fieldlere de uygulanabilir)
    if ($name == "" OR $email == "" OR $message == "") {
    // alt: if (empty($name) || empty($email) || empty($message))
        echo "You must specify a value for name, email address, and message.";
        exit();
    }

    // AGAINST EMAIL HEADER INJECTION EXPLOIT:
    foreach ($_POST as $value) {
        if (stripos($value,'Content-Type:') !== FALSE ){
            echo "There was a problem with the information you entered.";    
            exit();
        }
    }

    // AGAINST COMMENT SPAM ATTACK:
    if ($_POST["address"] != "") {
        echo "Your form submission has an error.";
        exit();
    }

    // FOR SENDING EMAIL WE USE PHPMailer OBJECT (NOT mail() func of php).
    // to send the email we are also suggested to use a separate mail server (i.e. postmark, gmail, sntp) instead of that of web server (?). local server wudnt work at all to send mail
    require_once("inc/phpmailer/class.phpmailer.php");
    $mail = new PHPMailer();

    // VALIDATES EMAIL
    if (!$mail->ValidateAddress($email)){
        echo "You must specify a valid email address.";
        exit();
    }

    // SENDS EMAIL
    $email_body = "";
    $email_body = $email_body . "Name: " . $name . "<br>";
    $email_body = $email_body . "Email: " . $email . "<br>";
    $email_body = $email_body . "Message: " . $message;
    // since its an html email we use html break tags for the hard 
    // returns in the email body instead of php escape characters

    $mail->SetFrom($email, $name);
    $address = "orders@shirts4mike.com"; /* to e-mail */
    $mail->AddAddress($address, "Shirts 4 Mike");
    $mail->Subject    = "Shirts 4 Mike Contact Form Submission | " . $name;
    $mail->MsgHTML($email_body);

    if(!$mail->Send()) {
      echo "There was a problem sending the email: " . $mail->ErrorInfo;
      exit();
    }

    header("Location: contact.php?status=thanks");
    exit();
}
?><?php 
// yukarıdaki php kodları arasını başka bir php sayfasına yazıp, o php sayfasını burada include etmek daha iyi olabilir

$pageTitle = "Contact Mike";
$section = "contact";
include('inc/header.php'); ?>

    <div class="section page">

        <div class="wrapper">

            <h1>Contact</h1>

            <?php if (isset($_GET["status"]) AND $_GET["status"] == "thanks") { ?>
<!-- 3. displays the thank you message -->
                <p>Thanks for the email! I&rsquo;ll be in touch shortly!</p>
            <?php } else { ?>
<!-- 1. displays the form -->
                <p>I&rsquo;d love to hear from you! Complete the form to send me an email.</p>

                <form method="post" action="contact.php">
                <!-- aynı sayfaya submit ediliyor -->

                    <table>
                        <tr>
                            <th>
                                <label for="name">Name</label>
                            </th>
                            <td>
                                <input type="text" name="name" id="name">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <label for="email">Email</label>
                            </th>
                            <td>
                                <input type="text" name="email" id="email">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <label for="message">Message</label>
                            </th>
                            <td>
                                <textarea name="message" id="message"></textarea>
                            </td>
                        </tr> 
                        <tr style="display: none;">
                            <th>
                                <label for="address">Address</label>
                            </th>
                            <td>
                                <input type="text" name="address" id="address">
                                <p>Humans (and frogs): please leave this field blank.</p>
                            </td>
                        </tr>                   
                    </table>
                    <input type="submit" value="Send">

                </form>

            <?php } ?>

        </div>

    </div>

<?php include('inc/footer.php') ?>