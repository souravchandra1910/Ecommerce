<?php

class Validation{
  /**
   * Function to destroy session.
   */
  public function destroySession() {
    // Start session.
    session_start();

    // Unset session variables.
    session_unset();

    // Destroy session.
    session_destroy();
  }

  /**
   * Function to check sessions variables.
   */
  public function isSessionSet(){
    session_start();
    if (!isset($_SESSION['Email_id'])) {
      $message = urlencode('Not logged in');
      return FALSE;
    }
    else{
      return TRUE;
    }
  }
}
