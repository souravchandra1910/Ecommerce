<?php

require_once 'Database.php';

// Class for Inserting Data into Database.
class Insertion extends Database {

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
   * Function to enter data into database.
   *
   * @param string $Email_id
   *   User's Email.
   * @param string $User_firstname
   *   User's firstname.
   * @param string $User_lastname
   *   User's lastname.
   * @param string $Password
   *   User's password.
   */
  public function insertIntoDatabase(string $Email_id, string $User_firstname,
  string $User_lastname, string $Password) {
    $sql_insert = $this->getConnection()->prepare("INSERT INTO User
    (Email_id,User_firstname,User_lastname,Password) values (?,?,?,?)");
    $sql_insert->execute([$Email_id, $User_firstname, $User_lastname,
     password_hash($Password, PASSWORD_DEFAULT)]);
  }

  /**
   * Function to enter data into database.
   *
   * @param string $time
   *   Current time.
   * @param string $text
   *   User's firstname.
   * @param string $User_lastname
   *   User's lastname.
   * @param string $Password
   *   User's password.
   */
  public function insertImage(string $time,string $text, mixed $image, string $Email_id){
    $sql_insert = $this->getConnection()->prepare("INSERT INTO image_table
    (time,text,image,Email_id) values (FROM_UNIXTIME(?),?,?,?)");
    $sql_insert->execute([$time,$text,$image,$Email_id]);
  }
}
