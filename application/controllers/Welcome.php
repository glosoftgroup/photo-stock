<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcomedelete extends MY_Controller {

	function __construct()
         {
              parent::__construct();
              $this->template
              ->set_partial('top', 'partials/header.php');
              $this->load->library('omnipaygateway');
         }

    public function index()
    {
    	$this->load->view('welcome_message');
    }

	public function indexOmni()
	{
		//$this->template->title(' Leaving Certificate ')
					   // ->set_layout('default')
		      //          ->build('welcome_message', array('message' => 'Hi there!'));
		$cardInput = array(
			'firstName' =>'wahye',
			'lastName' => 'widodo',
			'number' => '5105105105105100',
			'cvv' =>'796',
			'expiryMonth'=>12,
			'expiryYear'=>2017,
			'email'=>'gesge@sf.com',
			);
		
		$valTransc = array(
			'amount'=> "100.00",#number_format("1000000",2),
			'transactionId'=>1,
			'currency'=>'USD',
			'clientIp'=>'::1',
			'description'=>'sldfjsldjflsdf',
			'returnUrl'=>'http://kampozone.com');
		$purchaseProc = new omnipaygateway('Paypal_pro',true);
		$data = $purchaseProc->sendPurchase($cardInput,$valTransc);
		echo "<pre>";print_r($data);
              
		//$this->load->view('welcome_message');
	}
}
