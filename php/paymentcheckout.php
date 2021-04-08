<?php

//WARNING! you need to have both MercadoPago SDK + PHPMailer to make this work.

require '../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//WARNING! you need to have both MercadoPago SDK + PHPMailer to make this work.

require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';

//WARNING! you need to have both MercadoPago SDK + PHPMailer to make this work.

//MercadoPagoCredentials
MercadoPago\SDK::setAccessToken('YOUR ACCESS TOKEN');


  $token = $_REQUEST["token"];
  $payment_method_id = $_REQUEST["payment_method_id"];
  $installments = $_REQUEST["installments"];
  $issuer_id = $_REQUEST["issuer_id"];

  $name = htmlspecialchars(strip_tags($_POST['fname']));
  $surname = htmlspecialchars(strip_tags($_POST['sname']));
  $email = htmlspecialchars(strip_tags($_POST['mail']));
  $phone = htmlspecialchars(strip_tags($_POST['phone']));
  $id = htmlspecialchars(strip_tags($_POST['id']));
  $option = htmlspecialchars(strip_tags($_POST['option']));
  $last_update = date('Y-m-d H:i:s');


    // MercadoPago required information
    $payer = new MercadoPago\Payer();
    $payer->name = $name;
    $payer->surname = $surname;
    $payer->email = $email;
    $payer->date_created = $last_update;

    $payer->identification = array(
    "type" => "id",
    "number" => $id
    );


    $item = new MercadoPago\Item();
    $item->id = "1";
    $item->title = "Website buy"; //Specify your product title
    $item->quantity = 1;
    $item->currency_id = "ARS"; //Specify your currency ID
    $item->unit_price = 1500;


    $payment = new MercadoPago\Payment();
    $payment->transaction_amount = 1500;
    $payment->token = $token;
    $payment->description = ""; //Specify your own description
    $payment->installments = $installments;
    $payment->payment_method_id = $payment_method_id;
    $payment->issuer_id = $issuer_id;
    $payment->payer = array(
      "email" => $email
    );    // Save and post payment
    $payment->save();

    //...
    // Payment status

    echo $payment->status;
    $status = $payment->status;
    var_dump($status);

    //Successful payment:
    if($status == "approved")
      {

              //Create a new PHPMailer instance
              $mail = new PHPMailer;
              $mail->SMTPDebug = 0;  // Enable verbose debug output

              //SMTP settings start
              $mail->isSMTP(); // Set mailer to use SMTP
              $mail->Host = 'localhost'; // Specify main and backup SMTP servers
              $mail->SMTPAuth = false; // Enable SMTP authentication
              $mail->Username = 'no-reply@yourcompany.com'; // SMTP username
              $mail->Password = 'yourpassword'; // SMTP password
              $mail->SMTPAutoTLS = false;
              $mail->SMTPSecure = false; // Enable TLS encryption, `ssl` also accepted
              $mail->Port = 25;

              //Sender
              $mail->setFrom('no-reply@yourcompany.com');
              //Receiver
              $mail->addAddress('youremail@mail.com');

              //Email Subject & Body
              $mail->Subject = 'Website sell';
              //Form Fields
              $mail->Body    = '<b>You just sold something on your website!</b></br>'
              .'name: '.$name.'<br>'
              .'surname: '.$surname.'<br>'
              .'mail: '.$email.'<br>'
              .'phone: '.$phone.'<br>'
              .'id: '.$id.'</br>'
              .'option: '.$option.'</br>'
              .'payment status: <b>Approved</b><br>';

              $mail->isHTML(true); // Set email format to HTML

              //Send the message, check for errors
              if (!$mail->send()) {
                  echo 'Message could not be sent.';
                  echo 'Mailer Error: ' . $mail->ErrorInfo;
              }
              else
              {
                header('Location: ../myurl.php'); //specify your redirect URL
                   // code for saving in data in database can be added here
              }
        }

      //Payment still in process:
      else if ($status == "in_process")
        {
              //Create a new PHPMailer instance
              $mail = new PHPMailer;
              $mail->SMTPDebug = 0;  // Enable verbose debug output

              //SMTP settings start
              $mail->isSMTP(); // Set mailer to use SMTP
              $mail->Host = 'localhost'; // Specify main and backup SMTP servers
              $mail->SMTPAuth = false; // Enable SMTP authentication
              $mail->Username = 'no-reply@yourcompany.com'; // SMTP username
              $mail->Password = '*1AMWrbNkbIs'; // SMTP password
              $mail->SMTPAutoTLS = false;
              $mail->SMTPSecure = false; // Enable TLS encryption, `ssl` also accepted
              $mail->Port = 25;

              //Sender
              $mail->setFrom('no-reply@yourcompany.com');
              //Receiver
              $mail->addAddress('youremail@mail.com');
              $mail->isHTML(true); // Set email format to HTML

              //Email Subject & Body
              $mail->Subject = 'Website sell';
              //Form Fields
              $mail->Body    = '<b>You just sold something on your website!</b><br>'
              .'name: '.$name.'<br>'
              .'surname: '.$surname.'<br>'
              .'mail: '.$email.'<br>'
              .'phone: '.$phone.'<br>'
              .'id: '.$id.'<br>'
              .'option: '.$option.'</br>'
              .'payment status: <b>In process</b><br>';


              //Send the message, check for errors
              if (!$mail->send()) {
                  echo 'Message could not be sent.';
                  echo 'Mailer Error: ' . $mail->ErrorInfo;
              }
              else {
                header('Location: ../myurl.php'); //specify your redirect URL
                   // code for saving in data in database can be added here
              }
          }

      //Payment rejected, it will still send an e-mail with all our form data, but we will receive the rejected status from MercadoPago
      else
         {
           //Create a new PHPMailer instance
           $mail = new PHPMailer;
           $mail->SMTPDebug = 0;  // Enable verbose debug output

           //SMTP settings start
           $mail->isSMTP(); // Set mailer to use SMTP
           $mail->Host = 'localhost'; // Specify main and backup SMTP servers
           $mail->SMTPAuth = false; // Enable SMTP authentication
           $mail->Username = 'no-reply@yourcompany.com'; // SMTP username
           $mail->Password = '*1AMWrbNkbIs'; // SMTP password
           $mail->SMTPAutoTLS = false;
           $mail->SMTPSecure = false; // Enable TLS encryption, `ssl` also accepted
           $mail->Port = 25;

           //Sender
           $mail->setFrom('no-reply@yourcompany.com');
           //Receiver
           $mail->addAddress('youremail@mail.com');
           $mail->isHTML(true); // Set email format to HTML

           //Email Subject & Body
           $mail->Subject = 'Website sell';
           //Form Fields
           $mail->Body    = '<b>You just sold something on your website!</b><br>'
           .'name: '.$name.'<br>'
           .'surname: '.$surname.'<br>'
           .'Mail: '.$email.'<br>'
           .'phone: '.$phone.'<br>'
           .'id: '.$id.'<br>'
           .'option: '.$option.'</br>'
           .'payment status: <b>rejected</b><br>';


           //Send the message, check for errors
           if (!$mail->send()) {
               echo 'Message could not be sent.';
               echo 'Mailer Error: ' . $mail->ErrorInfo;
           }
           else
           {
             header('Location: ../myurl.php'); //specify your redirect URL
                // code for saving in data in database can be added here
           }
         }

?>
