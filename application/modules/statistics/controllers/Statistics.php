<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Statistics extends MY_Controller {

    
    public function index($ref=FALSE)
    {
        $data['title'] = 'Download';
        $this->load->model('aauth_download_model');
        $this->load->model('Aauth_visitor_model');
        // $this->load->helper('download');
        // force_download(FCPATH.'/assets/download/logo_light.png', NULL);
        $arr = array();
        $agent = $this->geolib->user_agent();
        $ip_info = $this->geolib->ip_info();
        $arr['browser'] = $agent['browser'];
        $arr['version'] = $agent['version'];
        $arr['platform'] = $agent['platform'];
        $arr['mobile'] = $agent['mobile'];
        $arr['ip_address'] = $ip_info['geoplugin_request'];
        $arr['city'] = $ip_info['geoplugin_city'];
        $arr['region'] = $ip_info['geoplugin_region'];
        $arr['code'] = $ip_info['geoplugin_dmaCode'];
        $arr['country_code'] = $ip_info['geoplugin_countryCode'];
        $arr['country_name'] = $ip_info['geoplugin_countryName'];
        $arr['lat'] = $ip_info['geoplugin_latitude'];
        $arr['lon'] = $ip_info['geoplugin_longitude'];
        $arr['currency_code'] = $ip_info['geoplugin_currencyCode'];
        $arr['rate'] = $ip_info['geoplugin_currencyConverter']; 
        //die(json_encode($arr));
        if(!$ref){
            $insert_id = $this->aauth_download_model->insert($arr, FALSE); 
            if($insert_id){die(json_encode($arr));}
            die('error');
        }
        
        if(!isset($_SESSION['platform'])){
            $insert_id = $this->Aauth_visitor_model->insert($arr, FALSE); 
            if($insert_id){
                // set session to avoid repeatation
                set_sessionData('platform',$arr['platform']);
                die(json_encode($arr));
            }
        }
        
        die('error');

        		
    }
}