<?php
defined('BASEPATH') OR exit('');

/**
 * Description of Home
 *
 * @author RazerTech
 */
class Audit extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        
        $this->genlib->checkLogin();
        
        $this->genlib->superOnly();
    }
    
    
    public function index(){
        $data['pageContent'] = $this->load->view('audit', '', TRUE);
        $data['pageTitle'] = "Audit";
        
        $this->load->view('main', $data);
    }
}