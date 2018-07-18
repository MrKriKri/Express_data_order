<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	 function __construct(){
         parent::__construct();
        
    }
    public function index()
    {
    	$this->load->view('order');
    }

    public function sendd()
    {
    	$this->load->model("mail");
    	$massage = '<center><h1>ยืนการการสั่งสินค้า</h1></center> 
    				<h2>ชื่อ : '.$_POST["CusName"].'  นามสกุล : '.$_POST["CusSname"].' </h2> 
    				<h2>เบอร์โทร : '.$_POST["CusTel"].'   </h2> 
    				<h2>ที่อยู่ : '.$_POST["CusAdds"].'  </h2>  
    				<h2>สินค้า : '.$_POST["select_product"].'  </h2>  
    				<h2>ราคาต่อหน่วย : '.$_POST["productPrice"].'  </h2>  
    				<h2>จำนวน : '.$_POST["amount"].'  </h2>  
    				<h2>รวมราคาสิยค้า : '.$_POST["productNetprice"].' </h2>   
    				<h2>ส่งโดย : '.$_POST["shippingType"].'   
    				<h2>ราคา/นำ้หนัก(กิโลกรัม)  : '.$_POST["priceWeight"].'   </h2> 
    				<h2>นำ้หนักสินค้า : '.$_POST["weight"].'   </h2> 
    				<h2>รวมราคาขนส่ง : '.$_POST["shippingPrice"].'  </h2> 
    				<h2>ราคาที่ต้องจ่ายทั้งหมด : '.$_POST["NetPrice"].'  </h2>  
    				<h2>ขอบคุณที่ใช้บริการ</h2>';
    	$this->mail->Sendemail($massage);
    	
    }
	
}
