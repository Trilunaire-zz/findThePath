<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	private $message_err ="";

	public function __construct(){
		parent::__construct();
		$this->load->model('UserM');
		if($this->session->userdata('logged')){
			//header("location:http://gv.anthonylohou.com/Home");
		}
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data["page_title"] = "Accueil";
		$data["message_err"] = $this->message_err;
		$this->load->view('welcome',$data);
		$this->message_err = "";
	}

	public function connection(){
		$username = $this->input->post('username');
		$pass = $this->input->post('password');
		$user = $this->UserM->connect($username,$pass);
		if(isset($user[0])){ //si il se connecte
			$this->session->set_userdata('logged',TRUE);
			$this->session->set_userdata('id_user',$user[0]['id']);
			//temporary redirect
			header("location:http://find-the-path.tristanlaurent.com/index.php/Path/pathBtwArret/République/Beaulieu%20Restau%20U");
		}
		$this->message_err = "<script>alert(\"Erreur de connexion, Mauvaise combinaison login et mot de passe\")</script>";
		$this->index();
	}

	public function inscription(){
		$this->UserM->recordUser($this->input->post('login'), $this->input->post('mail'), $this->input->post('password'));
	}

	public function disconnect(){
		$this->session->sess_destroy();
		//header("location:http://gv.anthonylohou.com/Welcome");
	}
}
