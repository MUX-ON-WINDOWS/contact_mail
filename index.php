<?php
declare(strict_types = 1);

if (isset($_POST['submit'])) {
    // get data from form.
    $name = htmlspecialchars(stripslashes(trim($_POST['name'])));
    $subject = htmlspecialchars(stripslashes(trim($_POST['subject'])));
    $email = htmlspecialchars(stripslashes(trim($_POST['email'])));
    $info = htmlspecialchars(stripslashes(trim($_POST['message'])));

    $message = "Naam: ".$name."\r\n"."Bericht: ".$info."\r\n";
    $headers =  "From: ".$email."\r\n";
    // Mail function and data
    mail('HIERkomtJEmail@gmail.com', $subject, $message, $headers);

    echo '<p style="color: green">Message sent</p>';

    if (!preg_match("/^[A-Za-z .'-]+$/", $name)) {
        $name_error = 'Invalid name';
    }
    if (!preg_match("/^[A-Za-z .'-]+$/", $subject)) {
        $subject_error = 'Invalid subject';
    }
    if (!pregmatch("/^[A-Za-z0-9.%+-]+@[A-Za-z0-9.-]+.[A-Za-z]{2,4}$/", $email)) {
        $email_error = 'Invalid email';
    }
    if (strlen($message) === 0) {
        $message_error = 'Your message should not be empty';
    }
} else {
    echo '<alert>Error occurred, please try again later</alert>';
}
?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" id="myForm" enctype="multipart/form-data">
    <div class="input-line">
    <input type="text" name="name" id="name" placeholder="Name" class="input-name">
    <p><?php if (isset($name_error)) {
        echo $name_error;
       }?></p>

    <input type="text" name="email" id="email" placeholder="Email" class="input-name">
    <p><?php if (isset($email_error)) {
        echo $email_error;
       } ?></p>
    </div>

    <input type="text" name="subject" id="subject" placeholder="subject" class="input-subject">
    <p><?php if (isset($subject_error)) {
        echo $subject_error;
       } ?></p>

    <textarea name="message" id ="body" class="input-textarea" placeholder="message"></textarea>
    <p><?php if (isset($message_error)) {
        echo $message_error;
       } ?></p>

    <input type="submit" name="submit" value="Submit" id ="submit">
</form>
