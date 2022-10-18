<?php

include 'vendor/autoload.php';
require_once 'dbconfig.php';

class USER {

    private $conn;

    public function __construct() {
        $database = new Database();
        $db = $database->dbConnection();
        $this->conn = $db;
    }

    public function runQuery($sql) {
        $stmt = $this->conn->prepare($sql);
        return $stmt;
    }

    public function lasdID() {
        $stmt = $this->conn->lastInsertId();
        return $stmt;
    }

    public function create($pishure, $fname, $mname, $lname, $uname, $upass, $phone, $email, $type, $work, $acc_no, $addr, $sex, $dob, $marry, $t_bal, $a_bal) {
        try {
            $upass = md5($upass);
            $stmt = $this->conn->prepare("INSERT INTO account(pishure,fname,mname,lname,uname,upass,phone,email,type,work,acc_no,addr,sex,dob,marry,t_bal,a_bal) 
			                                             VALUES(:pishure, :fname, :mname, :lname, :uname, :upass, :phone, :email, :type, :work, :acc_no, :addr, :sex, :dob, :marry, :t_bal, :a_bal)");
            $stmt->bindparam(":pishure", $pishure);
            $stmt->bindparam(":fname", $fname);
            $stmt->bindparam(":mname", $mname);
            $stmt->bindparam(":lname", $lname);
            $stmt->bindparam(":uname", $uname);
            $stmt->bindparam(":upass", $upass);
            $stmt->bindparam(":phone", $phone);
            $stmt->bindparam(":email", $email);
            $stmt->bindparam(":type", $type);
            $stmt->bindparam(":work", $work);
            $stmt->bindparam(":acc_no", $acc_no);
            $stmt->bindparam(":addr", $addr);
            $stmt->bindparam(":sex", $sex);
            $stmt->bindparam(":dob", $dob);
            $stmt->bindparam(":marry", $marry);
            $stmt->bindparam(":t_bal", $t_bal);
            $stmt->bindparam(":a_bal", $a_bal);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function transfer($email, $amount, $acc_no, $acc_name, $bank_name, $swift, $routing, $type, $remarks, $cout, $transtype) {
        try {

            $stmt = $this->conn->prepare("INSERT INTO transfer(email,amount,acc_no,acc_name,bank_name,type,swift,routing,remarks,cout,transtype) 
			                                             VALUES(:email, :amount, :acc_no, :acc_name, :bank_name, :type, :swift, :routing, :remarks, :cout, :transtype)");
            $stmt->bindparam(":email", $email);
            $stmt->bindparam(":amount", $amount);
            $stmt->bindparam(":acc_no", $acc_no);
            $stmt->bindparam(":acc_name", $acc_name);
            $stmt->bindparam(":bank_name", $bank_name);
            $stmt->bindparam(":type", $type);
            $stmt->bindparam(":swift", $swift);
            $stmt->bindparam(":routing", $routing);
            $stmt->bindparam(":remarks", $remarks);
            $stmt->bindparam(":cout", $cout);
            $stmt->bindparam(":transtype", $transtype);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function temp($email, $amount, $acc_no, $acc_name, $bank_name, $swift, $routing, $type, $remarks, $cout, $transtype) {
        try {

            $stmt = $this->conn->prepare("INSERT INTO temp_transfer(email,amount,acc_no,acc_name,bank_name,type,swift,routing,remarks,cout,transtype) 
			                                             VALUES(:email, :amount, :acc_no, :acc_name, :bank_name, :type, :swift, :routing, :remarks, :cout, :transtype)");
            $stmt->bindparam(":email", $email);
            $stmt->bindparam(":amount", $amount);
            $stmt->bindparam(":acc_no", $acc_no);
            $stmt->bindparam(":acc_name", $acc_name);
            $stmt->bindparam(":bank_name", $bank_name);
            $stmt->bindparam(":type", $type);
            $stmt->bindparam(":swift", $swift);
            $stmt->bindparam(":routing", $routing);
            $stmt->bindparam(":remarks", $remarks);
            $stmt->bindparam(":cout", $cout);
            $stmt->bindparam(":transtype", $transtype);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function ticket($tc, $sender_name, $sub, $msg) {
        try {

            $stmt = $this->conn->prepare("INSERT INTO ticket(tc,sender_name,subject,msg) 
			                                             VALUES(:tc, :sender_name, :subject, :msg)");
            $stmt->bindparam(":tc", $tc);
            $stmt->bindparam(":sender_name", $sender_name);
            $stmt->bindparam(":subject", $sub);
            $stmt->bindparam(":msg", $msg);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function message($sender_name, $reci_name, $subject, $msg) {
        try {

            $stmt = $this->conn->prepare("INSERT INTO message(sender_name,reci_name,subject,msg) 
			                                             VALUES(:sender_name, :reci_name, :subject, :msg)");

            $stmt->bindparam(":sender_name", $sender_name);
            $stmt->bindparam(":reci_name", $reci_name);
            $stmt->bindparam(":subject", $subject);
            $stmt->bindparam(":msg", $msg);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function delaccount($id) {
        try {

            $stmt = $this->conn->prepare("DELETE FROM account WHERE id = :id");

            $stmt->bindparam(":id", $id);

            $stmt->execute();
            return $stmt;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function update($email, $phone, $addr) {
        $update = "UPDATE account SET
				email = :email,
				phone = :phone,
				addr = :addr,
				
				WHERE id = :id";
        try {
            $stmt = $this->conn->prepare($update);

            $stmt->bindparam(':email', $_POST['email'], PDO::PARAM_STR);
            $stmt->bindparam(':phone', $_POST['phone'], PDO::PARAM_STR);
            $stmt->bindparam(':addr', $_POST['addr'], PDO::PARAM_STR);

            $stmt->execute();
            return $stmt;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function bal($t_bal) {
        $update = "UPDATE account SET
				t_bal = :t_bal,
				
				WHERE id = :id";
        try {
            $stmt = $this->conn->prepare($update);

            $stmt->bindparam(':t_bal', $_POST['t_bal'], PDO::PARAM_STR);

            $stmt->execute();
            return $stmt;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function login($uname, $upass) {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM account WHERE uname=:uname");
            $stmt->execute(array(":uname" => $uname));
            $userRow = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($stmt->rowCount() == 1) {
                if ($userRow['upass'] == ($upass)) {
                    $_SESSION['userSession'] = $userRow['uname'];
                    return true;
                } else {
                    header("Location: login.php?error");
                    exit;
                }
            } else {
                header("Location: login.php?error");
                exit;
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function is_logged_in() {
        if (isset($_SESSION['userSession'])) {
            return true;
        }
    }

    public function redirect($url) {
        header("Location: $url");
    }

    public function logout() {
        session_destroy();
        $_SESSION['userSession'] = false;
    }

     function send_mail($email, $messag, $subject) {
        require_once('mailer/class.phpmailer.php');
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "";
        $mail->Host = "buyscriptsdemo.work";
        $mail->Port = 587;
        $mail->AddAddress($email);
        $mail->Username = "margonbank@buyscriptsdemo.work";
        $mail->Password = "2021money@L";
        $mail->SetFrom('margonbank@buyscriptsdemo.work', 'MARGON BANKING SCRIPT');
        $mail->AddReplyTo("margonbank@buyscriptsdemo.work", "MARGON BANKING SCRIPT");
        $mail->Subject = $subject;
        $mail->MsgHTML($messag);
        $mail->Send();
    }

    function otp($to, $msg) {
        //twillio
        $sid = "AC57dc03500644b8c8XXXXXXXXXXX"; // Your Account SID from www.twilio.com/console
        $token = "15d1a639b028eXXXXXXXXXXXXXXXXXX"; // Your Auth Token from www.twilio.com/console
        $client = new Twilio\Rest\Client($sid, $token);
         try { $message = $client->messages->create(
                '+' . $to, array(
            'from' => 'DEMO', // From a valid Twilio number
            'body' => $msg
                )
        );
  // Display a confirmation message on the screen
        echo "Sent message to $name";

   //sent successfully
    echo "sent to $to successfully<br>";
  }catch(Exception $e){
    echo $e->getCode() . ' : ' . $e->getMessage()."<br>";
  }

}

    }
       


?>