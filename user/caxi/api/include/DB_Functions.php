<?php

/**
 * @author Ravi Tamada
 * @link http://www.androidhive.info/2012/01/android-login-and-registration-with-php-mysql-and-sqlite/ Complete tutorial
 */

class DB_Functions {

    public $conn;

    // constructor
    function __construct() {
        require_once 'DB_Connect.php';
        // connecting to database
        $db = new Db_Connect();
        $this->conn = $db->connect();
    }

    // destructor
    function __destruct() {
        
    }

    /**
     * Storing new user
     * returns user details
     */
    public function storeUser($fullName, $email, $password,$mobile) {
        
        
        $uuid = uniqid('', true);
        $stmt = $this->conn->prepare("INSERT INTO users(unique_id, name, email, encrypted_password, mobile,created_at) VALUES(?, ?, ?, ?, ?, NOW())");
        $stmt->bind_param("sssss", $uuid, $fullName, $email, $password, $mobile);
        $result = $stmt->execute();
        $stmt->close();

        // check for successful store
       if ($result) {
            $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            return $user;
        } else {
            return false;
        }
    }
    
    
    public function userdata()
    {
            $stmt = $this->conn->prepare("SELECT * FROM users");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            return $user;
    }
    
      public function bookRide($pickup, $drop, $car_type , $pick_date , $pick_time , $user_id)
      {
        
    
        $stmt = $this->conn->prepare("INSERT INTO `ride_book`(`pick_loc`, `drop_loc`, `car_type`, `pick_date`, `pick_time`, `user_id`) VALUES ( ? , ? , ? , ? , ? , ?)");
          
          
        $stmt->bind_param("ssssss", $pickup, $drop, $car_type, $pick_date, $pick_time , $user_id);
        $result = $stmt->execute();
        $stmt->close();

        // check for successful store
       if ($result) {
            $stmt = $this->conn->prepare("SELECT * FROM `ride_book` WHERE user_id = ?");
            $stmt->bind_param("s", $user_id);
            $stmt->execute();
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            return $user;
        } else {
            return false;
        }
    }

    /**
     * Get user by email and password
     */
    public function getUserByEmailAndPassword($email, $password) {

        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = ? AND encrypted_password=?");

        $stmt->bind_param("ss", $email,$password);

        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

          
                return $user;
           
            
        } else {
            return NULL;
        }
    }
    
    
     /**
     * Get user by email and password
     */
    public function getbookeingdata($picup_loc, $drop_loc, $pickup_date) 
    {

        $stmt = $this->conn->prepare("SELECT * FROM `ride_book` WHERE `pick_loc` = ? AND `drop_loc` = ? AND `pick_date` = ? ");

        $stmt->bind_param("sss", $picup_loc,$drop_loc,$pickup_date);

        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

          
                return $user;
           
            
        } else {
            return NULL;
        }
    }

    /**
     * Check user is existed or not
     */
    public function isUserExisted($email) {
        $stmt = $this->conn->prepare("SELECT email from users WHERE email = ?");

        $stmt->bind_param("s", $email);

        $stmt->execute();

        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // user existed 
            $stmt->close();
            return true;
        } else {
            // user not existed
            $stmt->close();
            return false;
        }
    }

    /**
     * Encrypting password
     * @param password
     * returns salt and encrypted password
     */
    public function hashSSHA($password) {

        $salt = sha1(rand());
        $salt = substr($salt, 0, 10);
        $encrypted = base64_encode(sha1($password . $salt, true) . $salt);
        $hash = array("salt" => $salt, "encrypted" => $encrypted);
        return $hash;
    }

    /**
     * Decrypting password
     * @param salt, password
     * returns hash string
     */
    public function checkhashSSHA($salt, $password) {

        $hash = base64_encode(sha1($password . $salt, true) . $salt);

        return $hash;
    }

}

?>
