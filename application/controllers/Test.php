<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once "functions.php";

/**
 * Description of Test
 *
 * @author RazerTech
 */

class Test extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
    }
    
    
    public function index(){
        echo password_hash("123456", PASSWORD_BCRYPT);
    }
	
    public function newhex(){
        echo md5(time());
    }
    
    
    public function a(){
        $this->load->view('test');
    }
}