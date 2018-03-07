<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    public function index() {
        $data['title'] = 'Account Details ';
        $data['insert_errors'] = $this->aauth->get_errors_array();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('user_email', 'Email', 'trim|required');
        $this->form_validation->set_rules('pass1', 'Password', 'trim|required|matches[pass2]');
        $this->form_validation->set_rules('pass2', 'Password Confirmation', 'trim|required');
        //$this->form_validation->set_rules('username', 'User Name', 'trim|required');

        if ($this->form_validation->run() === FALSE) {

            $this->template->title($data['title'])
                 ->set_layout('login') 
                 ->set_partial('meta', 'partials/meta.php')  
                 ->build('register', $data);

            
        } else {
            //echo 'form validated successfully';
            $data['title'] = 'Account Registered Successfully';
            $user_email = $this->input->post("user_email");
            $pass = $this->input->post("pass1");
            $username = str_replace('.','',str_replace('@', '', $user_email));

            $data['insert_errors'] = $this->aauth->get_errors_array();
            $verification_code = md5($username);
            $user_data = array(
                'email' => $user_email,
                'pass' => $this->hash_password($pass, 0), // Password cannot be blank but user_id required for salt, setting bad password for now
                'name' => $username,
                //'avatar' => 'avatar-001.jpg',
                'verification_code' => $verification_code,
                'banned' => 0,
            );
            $new_user = $this->aauth->create_user($user_email, $pass, $username);
            if ($new_user > 0) {

                $data['title'] = "Account created successfully!";
                $data['message'] = '<center>Your account has been created successfully. Please check your e-mail and verify your account.<br/>';


                if ($this->aauth->login($user_email, $pass)) {
                    
                    $subject = "[" . siteinfo('name') . "] Account created Successfully";
                    $message = "Hi,<br>.<br>Username: " . $username . ' <br>Email: ' . $user_email;

                    $send_notification = email_sender($user_email, siteinfo('email'), $message, $subject, $cc = FALSE);
                    if ($send_notification) {
                        echo $send_notification;
                    }
                }
                
                redirect('login');
            } else {

                $data['error_array'] = $this->aauth->get_errors_array();                
                $this->template->title($data['title'])
                               ->set_layout('login')
                               ->set_partial('meta', 'partials/meta.php')   
                               ->build('register', $data);
            }
        }
    }

    function hash_password($pass, $userid) {

        $salt = md5($userid);
        return hash('sha256', $salt . $pass);
    }

    public function user_exist() {
        if (isset($_POST['username'])) {
            if ($this->aauth->user_exist_by_name($_POST['username'])) {
                echo "<font color='red'>" . $_POST['username'] . " exist</font>";
                echo "<script> $('#username').val('');</script>";
            } elseif ($_POST['username'] != '') {
                echo "<span style='color:green' class='fa fa-check-square-o'></span>";
            } else {
                echo "<font color='red'>" . $_POST['username'] . " Fill this field</font>";
                echo "<script> $('#username').val('');</script>";
            }
        }
    }

    public function email_exist() {
        if (!filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)) {
            echo "<font color='red'> Enter a valid email</font>";
            echo "<script> $('#user_email').val('');</script>";
        } elseif ($this->aauth->user_exist_by_email($_POST['user_email'])) {
            echo "<font color='red'>" . $_POST['user_email'] . " exist</font>";
            echo "<script> $('#user_email').val('');</script>";
        } elseif ($_POST['user_email'] == '') {
            echo "<font color='red'> Fill email field</font>";
            echo "<script> $('#user_email').val('');</script>";
        } else {
            echo "<span style='color:green' class='fa fa-check-square-o'></span>";
        }
    }

    public function email_exist_pro() {
        if (!filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)) {
            echo "<font color='red'> Enter a valid email</font>";
            echo "<script> $('#user_email').val('');</script>";
            $response = array(
                 'data'=> "Enter a valid email"
            );
            header('HTTP/1.1 500 Internal Server Error');
            header('Content-Type: application/json; charset=UTF-8');
            echo json_encode($response);
        } elseif ($this->aauth->user_exist_by_email($_POST['user_email'])) {
            $response = array(
                 'data'=> $_POST['user_email'] . " exist"
            );
            header('HTTP/1.1 500 Internal Server Error');
            header('Content-Type: application/json; charset=UTF-8');
            echo json_encode($response);
            
        } elseif ($_POST['user_email'] == '') {
            $response = array(
                 'data'=> "Email address is required."
            );
            header('HTTP/1.1 500 Internal Server Error');
            header('Content-Type: application/json; charset=UTF-8');
            echo json_encode($response);            
        } else {
            echo "<span style='color:green' class='fa fa-check-square-o'></span>";
        }
    }

    public function check_password() {
        if ($_POST['pass1'] != $_POST['pass2']) {
            echo alert_user('Password & Repeat password should match');
            echo "<script> $('#pass2').val('');</script>";
        } elseif ($_POST['pass2'] == '') {
            echo "<font color='red'> Fill Repeat Password field</font>";
            //echo "<script> $('#user_email').val('');</script>";
        } else {
            echo "<span style='color:green' class='fa fa-check-square-o'></span>";
        }
    }

}
