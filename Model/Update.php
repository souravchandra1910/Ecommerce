<?php


require_once 'Database.php';

// Class for Inserting Data into Database.
class Update extends Database {

  /**
   * Constructor function to initialise objects of the class.
   * @param string $username
   *   User's name.
   * @param string $password
   *   Database password.
   * @param string $dbname
   *   Database name.
   */
  function __construct(string $username, string $password, string $dbname) {
    parent::__construct($username, $password, $dbname);
  }

  /**
   * Function to updateProfile data.
   *
   * @param string $first_name
   *   User provided first name.
   * @param string $last_name
   *   User provided last name.
   * @param string $email
   *   User provided email
   */
  public function updateProfile(string $first_name, string $last_name,string $email){
     $update=$this->getConnection()->prepare("UPDATE User SET
     User_firstname='$first_name',
     User_lastname='$last_name'
     WHERE
     Email_id='$email'
     ");
     $update->execute();
  }
}
