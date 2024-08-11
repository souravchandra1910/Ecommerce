<?php

require_once 'Database.php';


// Class to Perform read operations.
class Read extends Database {

  /**
   * Constructor function to initialise objects at the time of creation.
   *
   * @param string $username
   * @param string $password
   * @param string $dbname
   */
  function __construct(string $username, string $password, string $dbname) {
    parent::__construct($username, $password, $dbname);
  }

  /**
   * Function to check existance of user.
   *
   * @param string $Email_id
   *   User's Email.
   *
   * @return bool
   */
  public function UserExist(string $Email_id):bool {
    $sql_select = $this->getConnection()->prepare("SELECT Email_id from
    User where Email_id = ?");
    $sql_select->execute([$Email_id]);
    $rows = $sql_select->fetchAll(PDO::FETCH_ASSOC);
    if (!count($rows)) {
      return true;
    }
    else {
      return false;
    }
  }

  /**
   * Function to get user.
   *
   * @param string $Email_id
   *   User's Email.
   */
  public function getUser(string $Email_id) {
    $sql_select = $this->getConnection()->prepare("SELECT * from
    User where Email_id = ?");
    $sql_select->execute([$Email_id]);
    $rows = $sql_select->fetch(PDO::FETCH_ASSOC);
    if (!count($rows)) {
      return null;
    }
    else {
      return $rows;
    }
  }
   /**
   * Function to get post related data.
   *
   * @param string $Email_id
   *   User's Email.
   *
   * @return  array
   */
  public function getPost($count):array {
    if($count!=0){
    $sql_select = $this->getConnection()->prepare("SELECT
    u.User_firstname,
    u.User_lastname,
    i.time,
    i.text,
    i.image,
    i.Email_id
    from
    image_table
    as i
    INNER JOIN
    User
    as u
    ON
    i.Email_id=u.Email_id
    ORDER BY
    i.time
    LIMIT $count,5
    ");
    }
    else{
    $sql_select = $this->getConnection()->prepare("SELECT
    u.User_firstname,
    u.User_lastname,
    i.time,
    i.text,
    i.image,
    i.Email_id
    from
    image_table
    as i
    INNER JOIN
    User
    as u
    ON
    i.Email_id=u.Email_id
    ORDER BY
    i.time
    LIMIT 10
    ");
    }
    $sql_select->execute();
    $rows = $sql_select->fetchAll(PDO::FETCH_ASSOC);
    if (!count($rows)) {
      return null;
    }
    else {
      return $rows;
    }
  }

  /**
   * Function to get post data which is searched.
   *
   * @param string $search
   *   User provided value to be searched.
   *
   * @return array
   */
  public function getPostwithSearch(string $search):array {
    $sql_select = $this->getConnection()->prepare("SELECT
    u.User_firstname,
    u.User_lastname,
    i.time,
    i.text,
    i.image,
    i.Email_id
    from
    image_table
    as i
    INNER JOIN
    User
    as u
    ON
    i.Email_id=u.Email_id
    WHERE u.User_firstname like '%{$search}%'
    OR
    u.User_lastname like '%{$search}%'
    OR
    i.text like '%{$search}%'
    ORDER BY
    i.time
    LIMIT 2
    ");
    $sql_select->execute();
    $rows = $sql_select->fetchAll(PDO::FETCH_ASSOC);
    if (!count($rows)) {
      return null;
    }
    else {
      return $rows;
    }

  }
  /**
   * Function to check password matching
   *
   * @param string $Email_id
   *   User's email.
   *
   * @param string $Password
   *   User entered password.
   *
   * @return bool
   */
  public function isPasswordCorrect($Email_id, $Password):bool{
    $sql_select = $this->getConnection()->prepare("SELECT * from
    User where Email_id = ?");
    $sql_select->execute([$Email_id]);
    $rows = $sql_select->fetch(PDO::FETCH_ASSOC);
    if (password_verify($Password, $rows['Password'])) {
      return true;
    }
    else {
      return false;
    }
  }

  /**
   * Function to generate token for reseting password.
   *
   * @param string $Email_id
   *   User provided email.
   *
   * @return  mixed
   *   Token generated.
   */
  public function generateToken($Email_id):mixed {
    $token = bin2hex(random_bytes(16));
    $token_hash = hash("sha256", $token);
    $expiry = date("Y-m-d H:i:s", time() + 60 * 2);
    $sql_update = "UPDATE User
        SET reset_token_hash = ?,
            reset_token_expires_at = ?
        WHERE Email_id = ?";
    $stmt = $this->getConnection()->prepare($sql_update);
    $stmt->execute([$token_hash, $expiry, $Email_id]);
    return $token;
  }

  /**
   * Function to reset password.
   *
   * @param string $token
   *   Token send on Email.
   *
   * @param string $Email_id
   *   User's Email.
   *
   * @param string $Password
   *   User's new password.
   *
   * @return bool
   *
   */
  public function resetPassword($token, $Email_id, $Password):bool {
    $token_hash = hash("sha256", $token);
    $sql_select = "SELECT * FROM User
        WHERE reset_token_hash = ?";
    $stmt = $this->getConnection()->prepare($sql_select);
    $stmt->execute([$token_hash]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if (strtotime($row["reset_token_expires_at"]) <= time()) {
      return false;
    }
    else {
      $sql_update = $this->getConnection()->prepare("UPDATE User
        SET Password = ?
        WHERE Email_id = ?");
      $sql_update->execute([password_hash($Password, PASSWORD_DEFAULT), $Email_id]);
      return true;
    }
  }
}
