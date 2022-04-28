 <?php
    $errors         = array();      // array to hold validation errors
    $data           = array();      // array to pass back data

    if (empty($_POST['contactName']))
        $errors['contactName'] = 'Name is required.';

    if (empty($_POST['contactEmail']))
        $errors['contactEmail'] = 'Email is required.';

    if (empty($_POST['contactMessage']))
        $errors['contactMessage'] = 'Superhero alias is required.';
    // if there are any errors in our errors array, return a success boolean of false
    if ( ! empty($errors)) {
        $data['success'] = false;
        $data['errors']  = $errors;
    } else {
        $name = $_POST['contactName'];
        $email = $_POST['contactEmail'];
        $phone = $_POST['contactSubject'];
        $message = $_POST['contactMessage'];
        $recipient = "venu.458458@gmail.com";
        $subject = "malakavenu.com";
        $formcontent = "Hi Venu : $name <br/> Email: $email <br/> Subject: $phone <br/> Message: $message";
        $headers = "From: " ."venu.458458@gmail.com>" . "\r\n";
        $headers .= "Reply-To: " . $email . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        mail($recipient, $subject, $formcontent, $headers);
        // show a message of success and provide a true success variable
        $data['success'] = true;
        $data['message'] = 'Success!';
    }
    // return all our data to an AJAX call
    echo json_encode($data);
 