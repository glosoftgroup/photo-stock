<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
require FCPATH.'vendor\autoload.php';
//include_once( 'Omnipay/Omnipay.php');
use Omnipay\Omnipay;
use Omnipay\Common\GatewayFactory;
use Omnipay\Common\CreditCard;

class Omnipaygateway extends MY_Controller {
	protected $gateway = null;
	public function __construct($set_gateway="PayPal_Pro", $test_mode=true){
		$this->gateway = Omnipay::create($set_gateway);
		$this->gateway->setUsername('pkinuthia10_api1.gmail.com');
		$this->gateway->setPassword('HVJWQLUUGCDJEQW3');
		$this->gateway->setSignature('AFcWxV21C7fd0v3bYYYRCpSSRl31AEMPTMxuE9BrQG2Usp3E617mBlFI');
		$this->gateway->setTestMode($test_mode);
	}

	public function sendPurchase($cardInput,$valTransaction){
		try{
		 	$card = new CreditCard($cardInput);	     
	        $card->validate();
	    } catch (\Exception $e) {
	        echo $e;
	        return false;
	    }
		$payArray = array(
			'amount' => $valTransaction['amount'] ,
			'transactionId' => $valTransaction['transactionId'],
			'description' => $valTransaction['description'],
			'currency' => $valTransaction['currency'],
			'clientIp' => $valTransaction['clientIp'],
			'returnUrl' => $valTransaction['returnUrl'],
			'card' => $card
			 );
		$response = $this->gateway->purchase($payArray)->send();
		if($response->isSuccessful())
		{
			$paypalResponse = $response->getData();
		}elseif($response->isRedirect())
		{
			$paypalResponse = $response->getRedirectData();
		}else
		{
			$paypalResponse = $response->getMessage();
		}
		return $response;
	}
}