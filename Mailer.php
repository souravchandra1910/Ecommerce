<?php
// Load Composer's autoloader.
require __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/MailFunctions.php';


// Import PHPMailer classes into the global namespace.
// These must be at the top of your script, not inside a function.
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

/**
 * A class to Send mail to a user for otp verification.
 */
class Mailer {

  /**
   * @var string $email
   *   Stores User's email id.
   * @var mixed $mail
   *   Stores Mail object.
   * @var string $otp
   *   Stores User provided otp.
   * @var string $token
   *   Stores token generated.``1 
   */
  private $email;
  private $mail;
  private $otp;
  private $token;
  /**
   * Undocumented function
   *
   * @param string $email
   *   User provided email.
   */
  public function __construct($email) {
    $this->email=$email;
    $this->mail = new PHPMailer(true);
  }
  public function register($otp){
    $this->otp=$otp;
    $this->mail->isSMTP();
    setUserData($this->mail);
    try {
      sendMail($this->mail, $this->email);
      // Content.
      sendMailData($this->mail, $this->otp);
      // If mail is send display a success Message.
      $this->mail->send();
      header('location:/otp');
    }
    catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
    }
  }
  public function reset($token){
    $this->token=$token;
    $this->mail->isSMTP();
    setUserData($this->mail);
    try {
      sendMail($this->mail, $this->email);
      // Content.
      sendMailDataToken($this->mail, $this->token);
      // If mail is send display a success Message.
      $this->mail->send();
      $message=urlencode('Token send successfully');
      header("Location:/forget?message={$message}");
    }
    catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
    }
  }
}
