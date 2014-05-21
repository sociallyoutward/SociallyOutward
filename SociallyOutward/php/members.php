<?php
require_once('orm/member.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    
    if(!is_null($_GET['id']))
    {
        $m_id = $_GET['id'];
        $m = Member::findByID($m_id);
        if (is_null($m))
        {
            header("HTTP/1.1 404 Not Found");
            print("Member id specified either not found or not legal");
            exit();
        }
        else
        {
            header("Content-type: application/json");
            print(json_encode($m->getJSON()));
            exit();
        } 
    }
    else if(!is_null($_GET['username']))
    {
        if(is_null($_GET['password']))
        {
            header("HTTP/1.1 400 Bad Request");
            print("No password or illegal password provided");
            exit();
        }
        $member_username = $_GET['username'];
        $member_password = $_GET['password'];
        $securepassword = md5("Always Something" . $member_password);


        $member = Member::upmatch($member_username,$securepassword);
        if (is_null($member))
        {
            header("HTTP/1.1 400 Bad Request");
            print("Incorrect or illegal username or password");
            exit();
        }
        else
        {
            header("Content-type: application/json");
            print(json_encode($member->getJSON()));
            exit();
        } 
    }
    
}
else if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    require_once('recaptchalib.php');
    $privatekey = "6LfltOESAAAAAKhq_DPTil5vwoy2Fwt1h7aGgLJT";
    $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

    if (!$resp->is_valid) {
    // What happens when the CAPTCHA was entered incorrectly
    die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
         "(reCAPTCHA said: " . $resp->error . ")");
    } else {
    $first = $_POST['first'];
    if ($first == "") {
      header("HTTP/1.1 400 Bad Request");
      print("No first name passed");
      exit();
    }

    $last = $_POST['last'];
    if ($last <= "") {
      header("HTTP/1.1 400 Bad Request");
      print("No last name passed");
      exit();
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    $securepassword = md5("Always Something" . $password);
    $m = member::create($first, $last, $username, $securepassword);
    if (is_null($m)) {
      header("HTTP/1.1 400 Bad Request");
      print("Member failed at database");
      exit();
    }
    else if($m==-1)
    {
        header("HTTP/1.1 400 Bad Request");
        print("Username already taken");
        exit();
    }
    else
    {
    header("Content-type: application/json");
    print(json_encode($m->getJSON()));
    exit();
    }
    }

}
header("HTTP/1.1 400 Bad Request");
print("URL did not match any known action.");
?>
