<?php
/**
 * Kz CodeIgniter Asset Email
 *
 * @package		email helper
 * @author		Paul K. Kinuthia
 * @copyright	Copyright (c) 2017, Kampozone.
 * @license		http://www.opensource.org/licenses/mit-license.php
 * @link		http://kampozone.com
 * @version		v1.2.7
 * @filesource
 * */

if(!function_exists('valid_email'))
{
    function valid_email($email){ 
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
}

if ( ! function_exists('email_sender'))
{
    function email_sender($email_to=FALSE,$email_from=FALSE,$message=FALSE,$subject=FALSE,$cc=FALSE){
        $ci=& get_instance();

        // validate fields
        if($email_to == FALSE){ return FALSE;}
        if($email_from == FALSE){ return FALSE;}
        if($message == FALSE){ return FALSE;}
        if($subject == FALSE){ return FALSE;}

        $data['body'] = $message;
        $data['email_from'] = $email_from;
        $data['email_to'] = $email_to;
        $data['subject'] = $subject;
        $data['email_body'] = $ci->load->view('email/monster',$data,TRUE);   
        
        // set email data
        $ci->load->library('email');

        $config['wordwrap'] = TRUE;
        $config['mailtype'] = 'html';
        $config['newline'] = '\r\n';
        $ci->email->initialize($config);

        $ci->email->from($data['email_from'], siteinfo('name'));
        $ci->email->to($data['email_to']);  
        $ci->email->cc(siteinfo('email'));
        $ci->email->subject($data['subject']);
        $ci->email->message($data['email_body']);
        $ci->email->send();
        // geolib information OPTIONAL
        // comment if you don't require GEO info
        $ci->load->library("geolib/geolib");        
        $ci->geolib->utf7_code($data);
    }
}