<?php

use JetBrains\PhpStorm\NoReturn;

defined('BASEPATH') OR exit('');

/**
 * Description of Dashboard
 *
 * @author RazerTech
 */
class Dashboard extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        
        $this->genlib->checkLogin();
        
        $this->load->model(['item', 'transaction', 'analytic']);
    }
    
    
    /*
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    */
    
    /**
     * 
     */
    public function index(){
        $data['topDemanded'] = $this->analytic->topDemanded();
        $data['leastDemanded'] = $this->analytic->leastDemanded();
        $data['highestEarners'] = $this->analytic->highestEarners();
        $data['lowestEarners'] = $this->analytic->lowestEarners();
        $data['totalItems'] = $this->db->count_all('items');
        $data['totalSalesToday'] = (int)$this->analytic->totalSalesToday();
        $data['totalTransactions'] = $this->transaction->totalTransactions();
        $data['dailyTransactions'] = $this->analytic->getDailyTrans();
        $data['transByDays'] = $this->analytic->getTransByDays();
        $data['transByMonths'] = $this->analytic->getTransByMonths();
        $data['transByYears'] = $this->analytic->getTransByYears();
        
        $values['pageContent'] = $this->load->view('dashboard', $data, TRUE);
        
        $values['pageTitle'] = "Dashboard";
        
        $this->load->view('main', $values);
    }
    
    /*
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    */
    /**
     * 
     * @param type $year year of earnings to fetch
     * @param boolean $not_ajax if request if ajax request or not
     * @return int
     */
    public function earningsGraph($year="", $not_ajax = false) {
        //set the year of expenses to show
        $year_to_fetch = $year ? $year : date('Y');
        
        $earnings = $this->genmod->getYearEarnings($year_to_fetch);
        $lastEarnings = 0;
        $monthEarnings = array();
        $hightEarn['highestEarning'] = 0;
        $dataarr = [];
        $allMonths = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

        if ($earnings) {
            foreach ($allMonths as $allMonth) {
                foreach ($earnings as $get) {
                    $earningMonth = date("M", strtotime($get->transDate));
                    
                    if ($allMonth == $earningMonth) {
                        $lastEarnings += $get->totalPrice;
                        
                        $monthEarnings[$allMonth] = $lastEarnings;
                    } 
                    
                    else {
                        if (!array_key_exists($allMonth, $monthEarnings)) {
                            $monthEarnings[$allMonth] = 0;
                        }
                    }
                }

                if ($lastEarnings > $hightEarn['highestEarning']) {
                    $hightEarn['highestEarning'] = $lastEarnings;
                }
                
                $lastEarnings = 0;
            }

            foreach ($monthEarnings as $me) {
                $dataarr[] = $me;
            }
        }

        else {//if no earning, set earning to 0
            foreach ($allMonths as $allMonth) {
                $dataarr[] = 0;
            }
        }

        //add info into array
        $json = array("total_earnings" => $dataarr, 'earningsYear'=>$year_to_fetch);

        //set final output based on where the request is coming from
        if($not_ajax){
            return $json;
        }

        else{
            $this->output->set_content_type('application/json')->set_output(json_encode($json));
        }
    }
    
    
    /*
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    */
    
    /**
     * 
     */
    function paymentMethodChart($year=''){
        $year_to_fetch = $year ? $year : date('Y');
        
        $payment_methods = $this->genmod->getPaymentMethods($year_to_fetch);
        
        $json['status'] = 0;
        $cash = 0;
        $pos = 0;
        $cash_and_pos = 0;
        $json['year'] = $year_to_fetch;

        if($payment_methods) {
            foreach ($payment_methods as $get) {
                if ($get->modeOfPayment == "Cash") {
                    $cash++;
                } 
                
                else if ($get->modeOfPayment == "POS") {
                    $pos++;
                }
                
                else if($get->modeOfPayment === "Cash and POS"){
                    $cash_and_pos++;
                }
            }
            
            //calculate the percentage of each
            $total = $cash + $pos + $cash_and_pos;
            
            $cash_percentage = round(($cash/$total) * 100, 2);
            $pos_percentage =  round(($pos/$total) * 100, 2);
            $cash_and_pos_percentage = round(($cash_and_pos/$total) * 100, 2);
            
            $json['status'] = 1;
            $json['cash'] = $cash_percentage;
            $json['pos'] = $pos_percentage;
            $json['cashAndPos'] = $cash_and_pos_percentage;
        }
        
        //set final output
        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    }

    #[NoReturn] function pwd_reset() {
        $old_password = $this->input->post("pwd");
        $new_pwd = $this->input->post("pwd1");
        $new_pwd_ = $this->input->post("pwd2");
        if ($new_pwd_ === $new_pwd) {
            $password = password_hash($new_pwd, PASSWORD_BCRYPT);
            $this->load->model("Admin");
            $response = $this->Admin->pwd_reset($password, $old_password);
            if ($response)
                echo "<script>alert('Password reset successful')</script>";
            else
                echo "<script>alert('Old password seems not right. Contact System administrator for password reset')</script>";
        }else {
            echo "<script>alert('Password don\'t match')</script>";
        }
        $link = $_SERVER["HTTP_REFERER"];
        echo "<script>window.location = '{$link}';</script>";
        die();
    }

    #[NoReturn] function search_item() {
        $item = trim($this->input->get("i"));
        $items = $this->item->search_item($item);
        $content = $this->load->view('items/item_search', ["items" => $items], TRUE);
//        die();
        //$this->load->view('main', $data);
        echo $content;
        die();
    }
}