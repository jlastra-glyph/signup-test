<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
	function __construct() {
        parent::__construct();
    }

	public function index()
	{

		$this->load->helper(array('form', 'url', 'file'));
		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'Name', 'trim|required|callback_check_name');
        $this->form_validation->set_rules('birthday', 'Birthday', 'trim|required|callback_check_birthday');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('register');
		}
		else
		{
			$text = $this->input->post('name') . "|" . $this->input->post('birthday');
			if ( ! write_file(APPPATH."assets/textfile/signup.txt", $text .PHP_EOL, 'a+')){
				echo "Unable to Write File!";
				$data['return'] = "Unable to Submit!";
			}else{
				$data['return'] = "Submitted!";
			}

			$this->load->view('register' , $data);
		}
	}

	public function getXML(){
		$signups = file((APPPATH."assets/textfile/signup.txt"));
		$dom = new DOMDocument;
		$dom->preserveWhiteSpace = true;
		$dom->formatOutput = true;
		$community = $dom->createElement('community');
		$dom->appendChild($community);
		// $members = $dom->createElement('members');
		// $dom->appendChild($members);

		foreach($signups as $signup) {
		   $members = $dom->createElement('member');
		   $values = explode('|', $signup);	   	
		   	$name = $dom->createElement('name');
		   	$name->appendChild($dom->createTextNode($values[0]));
		   	$members->appendChild($name);
		   	$birthday = $dom->createElement('birthday');
		   	$birthday->appendChild($dom->createTextNode($values[1]));
		   	$members->appendChild($birthday);
		   
		   $community->appendChild($members);
		}

		file_put_contents(APPPATH."assets/textfile/signup.xml", $dom->saveXML());


		$file_url = APPPATH."assets/textfile/signup.xml";
		header('Content-Type: application/octet-stream');
		header("Content-Transfer-Encoding: Binary"); 
		header("Content-disposition: attachment; filename=\"" . basename($file_url) . "\""); 
		readfile($file_url);

	}

	function check_name($name)
    {
    	$name = $this->input->post('name');
    	if(ctype_alnum($name)){
    		return true;
    	}else{
    		$this->form_validation->set_message('check_name', 'Invalid Name! Letters and Numbers Only');
    		return false;
    	}
    }

	function check_birthday($birthday)
    {
    	$date = $this->input->post('birthday');

    	if (preg_match("/^(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])-[0-9]{4}$/", $date)) {
			if(checkdate(substr($date, 0, 2), substr($date, 3, 2), substr($date, 6, 4))){
				return true;
			}
			else{
				$this->form_validation->set_message('check_birthday', 'Invalid Birthday! Please check format');
				return false;
			}
		} else {
			$this->form_validation->set_message('check_birthday', 'Invalid Birthday! Please check format');
			return false;
		}
    }
}
