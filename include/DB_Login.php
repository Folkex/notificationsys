<?php 
class DB_Login {
    private $conn;
    // constructor
    function __construct() {
        require_once '../'.DIR_INCLUDE.'DB_Connect.php';
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
    public function insertadmin($email, $password, $fullname, $phone, $company_name, $traffic, $website) {
        $hash = $this->hashSSHA($password);
        $encrypted_password = $hash["encrypted"]; // encrypted password
        $salt = $hash["salt"]; // salt
		$activation=md5($email.time());// activation code
		$hashact = $this->hashSSHA($activation);
		$encrypted_activation = $hashact["encrypted"]; // encrypted activation code
        $activation_salt = $hashact["salt"]; // salt activation code
        $stmt = $this->conn->prepare("INSERT INTO admins(adminId, email, encrypted_password, salt, activation_code, activation_salt, fullname, phone, company_name, traffic, website, date_created) VALUES (NULL,?,?,?,?,?,?,?,?,?,?,NOW())");
		$stmt->bind_param("ssssssssis",$email, $encrypted_password, $salt, $encrypted_activation, $activation_salt, $fullname, $phone, $company_name, $traffic, $website);
		$result = $stmt->execute();
        $stmt->close();
        // check for successful store
        if ($result) {
            $stmt = $this->conn->prepare("SELECT * FROM admins WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user;
        } else {
            return false;
        }
    }
    /**
     * Activate new user
     */
    public function activate($email, $activation_code,$activation_salt) {
        $stmt = $this->conn->prepare("UPDATE admins SET activation_code=1 ,activation_salt=1 where email=? and activation_code=? and activation_salt=?");
		$stmt->bind_param("sss", $email, $activation_code, $activation_salt);
        $result = $stmt->execute();
        $stmt->close(); 
		if($result) return true;
		else return false;
    }
	/**
     * Activate  user password recovery
     */
    public function activatePassRec($email) {
		$activation=md5($email.time());// activation code
		$hashact = $this->hashSSHA($activation);
		$encrypted_activation = $hashact["encrypted"]; // encrypted activation code
        $activation_salt = $hashact["salt"]; // salt activation code
        $stmt = $this->conn->prepare("UPDATE admins SET activation_code=?, activation_salt=? where email=?");
		$stmt->bind_param("sss", $encrypted_activation, $activation_salt, $email);
        $result = $stmt->execute();
        $stmt->close(); 
		$stmt = $this->conn->prepare("SELECT * FROM admins WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user;
    }
	/**
     * Change  user password
     */
    public function changePass($email, $password, $activation_code,$activation_salt) {
		$hash = $this->hashSSHA($password);
        $encrypted_password = $hash["encrypted"]; // encrypted password
        $salt = $hash["salt"]; // salt
        $stmt = $this->conn->prepare("UPDATE admins SET encrypted_password=?, salt=?, activation_code=1, activation_salt=1  where email=? and activation_code=? and activation_salt=?");
		$stmt->bind_param("sssss", $encrypted_password, $salt, $email, $activation_code,$activation_salt);
        $result = $stmt->execute();
        $stmt->close(); 
		if($result) return true;
		else return false;
    }
    /**
     * Get user by useremail and password
     */
    public function getUserByEmailAndPassword($email, $password) {
        $stmt = $this->conn->prepare("SELECT * FROM admins WHERE email = ? and activation_code=1");
        $stmt->bind_param("s", $email);

        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            // verifying user password
            $salt = $user['salt'];
            $encrypted_password = $user['encrypted_password'];
            $hash = $this->checkhashSSHA($salt, $password);
            // check for password equality
            if ($encrypted_password == $hash) {
                // user authentication details are correct
                return $user;
            }
        } else {
            return NULL;
        }
    }	
    /**
     * Check user is existed or not
     */
    public function isadminExisted($email) {
        $stmt = $this->conn->prepare("SELECT email from admins WHERE email = ?");
        $stmt->bind_param("s", $email);
        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
                return $user;
        }else{
            $stmt->close();
            return NULL;
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
