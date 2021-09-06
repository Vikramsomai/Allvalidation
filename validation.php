<style>
    .success{
        color:#198754;
        padding: auto;
    }
    .error{
        color:#dc3545;
        padding: auto;
    }
    </style>
<?php
//mobile validation
function validateMobile($mobile)
{
    $mobile=purify($mobile);
    if (preg_match('/^[0-9]{10}+$/', $mobile)) {
        $error="<div class='success'>Phone number is valid</div>";
        $data = array("data" => $mobile,"msg"=>$error);
        return $data;
    } else {
        $error="<div class='error'>Invalid Phone number</div>";
        $data = array("msg" => $error);
        return $data;
    }
}
// over mobile

//validate name
function validateName($name)
{
   
    $name=purify($name);
   

    if (empty($name)) {
        $nameError = "<div class='error'>Name is required</div>";
        $data = array("msg" => $nameError);
        return $data;
    } else if (!preg_match('/^[a-zA-Zs\s]+$/', $name)) {
        $nameError = "<div class='error'>Must only contain letters and whitespace</div>";
        return $data = array("msg" => $nameError);
    } else {
        $msg = "<div class='success'>Valid Name</div>";
        $data = array("data" => $name, "msg" => $msg);
        return $data;
    }

}
//password
function validatePassword($password)
{
    $password=purify($password);
    if (empty($password)) {
        $nameError = "<div class='error'>Password filed is required</div>";
        $data = array("msg" => $nameError);
        return $data;
    } else if (strlen($password) <= 8) {
        $nameError = "<div class='error'>Your Password Must Contain At Least 8 Characters!</div>";
        $data = array("msg" => $nameError);
        return $data;
    } else if (!preg_match("#[0-9]+#", $password)) {
        $nameError = "<div class='error'>Your Password Must Contain At Least 1 Number!</div>";
        $data = array("msg" => $nameError);
        return $data;
    } else if (!preg_match("#[A-Z]+#", $password)) {
        $nameError = "<div class='error'>Your Password Must Contain At Least 1 Capital Letter!</div>";
        $data = array("msg" => $nameError);
        return $data;
    } else if (!preg_match("#[a-z]+#", $password)) {
        $nameError = "<div class='error'>Your Password Must Contain At Least 1 Lowercase Letter!</div>";
        $data = array("msg" => $nameError);
        return $data;
    } else {
        $error="<div class='success'>Password is strong</div>";
        $data = array("data" => $password,"msg"=>$error);
        return $data;
    }
}
function validateCPassword($pass, $cpass)
{
    $pass=purify($pass);
    $cpass=purify($cpass);
    if (empty($cpass)) {
        $nameError = "<div class=' text-danger error'>password filed required</div>";
        $data = array("msg" => $nameError);
        return $data;
    } else if ($pass !== $cpass) {
        $nameError = "<div class=' text-danger error'>does not match</div>";
        $data = array("msg" => $nameError);
        return $data;
    } else {
        $data = array("data" => $cpass);
        return $data;
    }
}
//pincode
function validatePincode($data)
{
    if (preg_match('/^[0-9]{6}+$/', $data)) {
        $data = array("data" => $data);
        return $data;
    } else {

        $data = array("msg" => "invalid pincode");
        return $data;
    }
}
// email validation is complete

function validateEmali($email)
{
    if (empty($email)) {
        $email_msg = "<span class='form-text  text-danger error'>please input email address</span>";
        return $data = array("msg" => $email_msg);
    } else {
        $data = array();
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_msg = "<span class='form-text text-success error'>valid email address</span>";
            $data = array("data" => $email, "msg" => $email_msg);
            return $data;
        } else {
            $email_msg = "<span class='form-text  text-danger error'>invalid email address</span>";
            $data = array("msg" => $email_msg);
            return $data;
        }
    }

}

function validateURL($url)
{

    if (!filter_var($url, FILTER_VALIDATE_URL)) {
        $websiteError = "<span class='form-text text-danger error'>Invalid URL</span>";
        $data = array("msg" => $websiteError);
        return $data;
    } else {
        $msg = "<span class='form-text text-success error'>valid url</span>";
        $data = array("data" => $url, "msg" => $msg);
        return $data;
    }
}
//sql injection prevent
function purify($data)
{  
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
   
    return $data;
}

function prx($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}
function redirect($data)
{
    header('location:' . $data);
}
function validateRadio($data)
{
    if (empty($data)) {
        $nameError = "<div class=' text-danger error'>Please select an option</div>";
        $data = array("msg" => $nameError);
        return $data;
    } else {
        $data = array("data" => $data);
        return $data;
    }

}
function validateCheckbox($data)
{
    if (empty($data)) {
        $nameError = "<div class=' text-danger error'>Please select an option</div>";
        $data = array("msg" => $nameError);
        return $data;
    } else {
        $data = array("data" => $data);
        return $data;
    }

}
function validateSelect($data)
{
    if ($data == "none") {
        $nameError = "<div class=' text-danger error'>Please select an option</div>";
        $data = array("msg" => $nameError);
        return $data;
    } else {
        $data = array("data" => $data);
        return $data;
    }

}
function validatePan($data)
{

}
function validateAadhar($data)
{
    $regx = '/^[0-9]{4}[ -]?[0-9]{4}[ -]?[0-9]{4}$/';
    if (empty($data)) {
        $nameError = "<div class=' text-danger error'>Aadhar card filed required</div>";
        $data = array("msg" => $nameError);
        return $data;
    } else if (!preg_match($regx, $data)) {
        $nameError = "<div class=' text-danger error'>aadhar card must be 12 digit </div>";
        $data = array("msg" => $nameError);
        return $data;
    } else {
        $data = array("data" => $data);
        return $data;
    }

}
function validateDebitcard($data)
{

}
