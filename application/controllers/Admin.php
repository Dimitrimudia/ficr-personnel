<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {
    
        public function __construct()
        {
                parent::__construct();
                $this->load->model('agent_model');
                $this->load->model('admin_model');
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
                        $this->data['agent'] = $this->admin_model->get_info_agent($id);
                        $this->data['genres'] =  $this->admin_model->genres;
                        $this->data['maritals'] =  $this->admin_model->maritals;
                        $this->load->view('_agent',$this->data);
                }
                elseif($obj=="contract")
                {
                        $this->data['agent'] = $this->admin_model->get_info_;
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
                        $this->data['status'] = $this->admin_model->status;
                        $this->data['genres'] =  $this->admin_model->genres;
                        $this->data['maritals'] =  $this->admin_model->maritals;
                        $this->load->view('admin', $this->data);
                }
        }
        
        public function save($obj=NULL, $id=NULL)
        {
                $return = false;
                
                if($obj == "agent")
                {
                            $fields = array(
                                   'Nom_7' => 'name',
                                   'Postnom_8' => 'postnon',
                                   'Prenom_9' => 'prenom',
                                   'Genre_10' => 'genre',
                                   'EtatCivil_12' => 'etatc',
                                   'Nationality_12' => 'nationality',
                                   'Adresse_15' =>'adress',
                                   'Lieu_17' => 'lieu',
                                   'Naissance_11'=>'naissance',
                                   'Telephone_13'=>'telephone',
                                   'Email_16'=>'mail',
                                   'Fonction_14'=>'fonction',
                           ); 
                           foreach($fields as $field => $value)
                           {
                                   $data[$field] = $this->input->post($value);
                           }
                           if($id == 0 || $id == NULL):
                               
                               $data['Date_1'] = date('Y-m-d H:i:s');
                               $data['Statut_3'] = 1;
                               $data['User_6'] = 0;
                           endif;
                           $return = $this->admin_model->save_agent($data, $id);
                }
                
                if($return)
                {
                        echo 400;
                }
                else
                {
                        echo 401;
                }
                
                
        }
    
}
