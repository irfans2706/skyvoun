<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent:: __construct();
	}

	public function index()
	{
		$newdata = array(
			'is_login'  => 1,
			'jawab'     => 0
		);
		$this->session->set_userdata($newdata);

		$this->load->view('header');
		$this->load->view('index');
		$this->load->view('footer');
	}

	public function korban($no = null)
	{
		$this->load->view('header');
		if($no != null){
			$this->load->view('korban_detail');
		}else{
			$this->load->view('korban');
		}
		$this->load->view('footer');
	}

	public function who()
	{
		$this->load->view('header');
		$this->load->view('who');
		$this->load->view('footer');
	}

	public function form()
	{
		$this->load->view('header');
		$this->load->view('form');
		$this->load->view('footer');
	}

	public function clue()
	{
		$this->load->view('header');
		$this->load->view('clue');
		$this->load->view('footer');
	}

	public function post_form()
	{
		$data = $this->input->post();

		$this->load->view('header');
		if($data["murdered"] == "rajapati" || $data["murdered"] == "Rajapati"){
			$this->session->sess_destroy();
			$this->load->view('correct');
		}else{
			if(isset($_SESSION['jawab']) && $_SESSION['jawab'] == 1){
				$this->session->sess_destroy();
				$this->load->view('wrong');
			}else{
				$this->session->set_userdata('jawab', 1);
				redirect("form");
			}
		}
		$this->load->view('footer');
	}

	private function writeLog2($text){
        $text = '['.date('d-m-Y H:i:s').'] '.$text.PHP_EOL;
        $file = './application/logs/registrationLog.txt';
        file_put_contents($file,$text, FILE_APPEND);
    }
}


