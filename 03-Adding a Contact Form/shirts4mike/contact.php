<?php 
// **aşağıdaki html'deki formu bulunduğumuz sayfa olan contact.php'ye submit edince sayfa reload oluyor ve yukarıdan itibaren if statementlar recheck ediliyor. ilk if sta'da query string ekleniyor ve sayfa redirect ediliyor (2. refresh gibi). ardından query stringde "thanks"  valuesu bulunduğundan html'deki ilk if statement gerçekleşiyor**
if ($_SERVER["REQUEST_METHOD"] == "POST") { // checks the request method
    $name = $_POST["name"];
    $email =  $_POST["email"];
    $message =  $_POST["message"];
    $email_body = "";
    // since we only wanted to have line breaks on page source (not
    // on browser) we preferred to have new line tags (\n) instead of line break tags (</br>)
    // however if we wanted to view web page the same format as the source code then we wud 
    // use pre tags(<pre>...</pre>)
    $email_body = $email_body . "Name: " . $name . "\n";
    $email_body = $email_body . "Email: " . $email . "\n";
    $email_body = $email_body . "Message: " . $message;

    // TODO: Send Email

    header("Location: contact.php?status=thanks"); // **redirects to the same page**
    //  ***on regular request for a web page the method is get, that is why we cud add query string. 
    // query string variables are stored in a global array named $_GET (just like form element names being stored in another global array named $_POST)
    // instead of $_POST and $_GET we cud use $_REQUEST superglobal array***
    exit; // tedbir amaçlı
}
?><?php 
$pageTitle = "Contact Mike";
$section = "contact";
include('inc/header.php'); ?>

	<div class="section page">

		<div class="wrapper">

            <h1>Contact</h1>
            
            <!-- ***öncelikle isset($_GET["status"] diyerek status indexinin varlığını check etmeseydik "undefined index, status" hatası çıkacaktı*** -->
            <?php if (isset($_GET["status"]) AND $_GET["status"] == "thanks") { ?>
                <p>Thanks for the email! I&rsquo;ll be in touch shortly!</p>
            <?php } else { ?>

                <p>I&rsquo;d love to hear from you! Complete the form to send me an email.</p>

                <form method="post" action="contact.php">
                <!-- **contact.php yerine submit sonrası başka bir php sayfasına yönlendirebilirdik ve $_POST["name"], $_POST["email"] ve $_POST["message"] print edilebilirdi** -->

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
                    </table>
                    <input type="submit" value="Send">

                </form>

            <?php } ?>

        </div>

	</div>

<?php include('inc/footer.php') ?>