<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	/**
	 * Created by : Dimitri Mudiangondo
	 *
	 * Update at : 02 November 2019
	 */
        public function __construct()
        {
                parent::__construct();
                $this->load->model('agent_model');
                $this->load->model('admin_model');
        }
        
        
	public function index()
	{
		$this->load->view('home');
	}
        
        public function connexion()
        {
                $data['Identifier_11'] = $this->input->post('email');
                $data['Encryption_10'] = $this->input->post('password');
                $user = $this->admin_model->connexion($data);
                if($user != NULL)
                {
                        if($user->Statut_2 == 0)
                        {
                               echo '<div class="alert alert-danger"> D&eacute;sol&eacute; !, vous n\'avez pas de compte, veuillez contatcer votre administrateur..<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button></div>';
                        }
                        else
                        {
                                $data = array(
                                    'user_id' => $user->Id_0,
                                    'Name_12'=>$user->Name_12,
                                    'Group_5'=>$user->Group_5,
                                    'Role_6'=>$user->Role_6,
                                    'Position_7'=>$user->Position_7,
                                    'Identifier_11'=>$user->Identifier_11,
                                );
                                $this->session->set_userdata($data);
                                $url = site_url('user');
                                return redirect($url, 'refresh');
                        }
               }
               else
               {
                        echo '<div class="alert alert-danger"> D&eacute;sol&eacute; !, vous n\'avez pas de compte, veuillez contatcer votre administrateur...<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button></div>';
               }
        }
}
