<?php
class  mail extends CI_Model{
public function Sendemail($massage)
	{
		$config = array(
		'protocol'  => 'smtp',
		'smtp_host' => 'ssl://smtp.gmail.com',
		'smtp_port' => 465,
		'smtp_user' => 'stura.wasit@gmail.com',
		'smtp_pass' => 'wasit102',
		'mailtype'  => 'html',
		'charset'   => 'utf-8'
		);

		$this->load->library('email');
		$this->email->initialize($config);
		$this->email->set_mailtype("html");
		$this->email->set_newline("\r\n");

		

		$this->email->from('stura.wasit@gmail.com','stura.wasit@gmail.com');
		$this->email->to('web@expressdata.co.th');
		$this->email->subject('Express data Order');
		$this->email->message("$massage");

		//Send email
		if($this->email->send()){
			echo 'sended';
		}else{
			show_error($this->email->print_debugger());
		}

	}
}
?>