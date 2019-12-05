<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {
    
        public function __construct()
        {
                parent::__construct();
                $this->load->model('agent_model');
                $this->load->model('admin_model');
                $this->load->helper('url');
                //$ths->load->library('form_validation');
        }
        
	public function index()
	{
                $this->data['subview'] = 'container';
                $this->load->view("layouts/layout", $this->data);
	}
        
        
        public function display($obj=NULL, $id=NULL)
        {
                if($obj=="agent")
                {
                        $this->data['agents'] = $this->admin_model->get_agents();
                        $this->load->view('_agent',$this->data);
                }
                elseif($obj=="contract")
                {
                        $this->data[''] = '';
                        $this->load->view('_contract',$this->data);
                }
                elseif($obj=="hollyday")
                {
                        $this->data[''] = '';
                        $this->load->view('_hollyday',$this->data);
                }
                elseif($obj=="home")
                {
                        $this->data[''] = '';
                        $this->load->view('admin',$this->$data);
                }
                elseif($obj=="admin")
                {
                        $this->data['agents'] = $this->admin_model->get_agents();
                        $this->load->view('admin', $this->data);
                }
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
                                redirect('/admin', 'refresh');
                        }
                        else
                        {
                                $data = array(
                                    'user_id' => $user->Id_0,
                                    'Name_12'=>$user->Name_12,
                                    'Group_5'=>$user->Name_,
                                    'Role_6'=>$user->Role_6,
                                    'Position_7'=>$user->Position_7,
                                    'Identifier_11'=>$user->Identifier_11,
                                );
                                $this->session->set_userdata($data);
                                redirect('/admin/home', 'refresh');
                        }
                        
               }
               else
               {
                    redirect('/admin', 'refresh');
               }
        }
    
}
