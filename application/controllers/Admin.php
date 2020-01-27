<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {
    
        public $lang = 'fr';
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
        
        
        public function display($obj=NULL, $id=NULL, $param=NULL)
        {
                if($obj=="agent")
                {
                        $this->data['agent'] = $this->admin_model->get_info_agent($id);
                        $this->data['contracts'] = $this->admin_model->get_all_contracts($id);
                        $this->data['holydays'] = $this->admin_model->get_all_holydays($id);
                        $this->data['genres'] =  $this->admin_model->genres;
                        $this->data['maritals'] =  $this->admin_model->maritals;
                        $this->load->view('_agent',$this->data);
                }
                elseif($obj=="contract")
                {
                        $this->data['contract'] = $this->admin_model->get_info_contract($id);
                        $this->data['types'] = $this->admin_model->types;
                        $this->data['agent'] = $this->admin_model->get_info_agent($param);
                        $this->load->view('_contract',$this->data);
                }
                elseif($obj=="hollyday")
                {
                        $this->data['hollyday'] = $this->admin_model->get_info_holyday($id);
                        $this->data['ctypes'] = $this->admin_model->ctypes;
                        $this->data['agent'] = $this->admin_model->get_info_agent($param);
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
                        $this->data['stats'] = $this->admin_model->get_candidatures_stats();
                        $this->data['pie_values'] = $this->get_piechart_data($this->data['stats']);
                        $this->data['color_state'] = $this->admin_model->color_state;
                        $this->data['status'] = $this->admin_model->status;
                        $this->data['genres'] =  $this->admin_model->genres;
                        $this->data['maritals'] =  $this->admin_model->maritals;
                        $this->load->view('admin', $this->data);
                }
        }
        
        public function save($obj=NULL, $id=NULL, $param=NULL)
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
                                $files_link = array();
                                $files = array(
                                    'attestation' => 'attestation',
                                    'aptitude' => 'aptitude',
                                    'certificatM' => 'certificatM',
                                    'diplome' => 'diplome',
                                    'cv' => 'cv',
                                    'carte' => 'carte'
                                );
                              
                                $validExtensions = array('.jpg', '.jpeg', '.pdf', '.png', '.JPG', '.JPEG', '.PDF', '.PNG');
                                foreach($files as $file => $value)
                                {
                                    
                                       if(isset($_FILES[$value]["name"]) && $_FILES[$value]["name"]!="" && $_FILES[$value]['tmp_name']!= ""  )
                                       {
                                                $dir = "./personnel_documents/".date('Y')."/agnets/";
                                                $fileExtension = strrchr($_FILES[$value]['name'], ".");
                                                
                                                if(in_array($fileExtension, $validExtensions)) 
                                                {

                                                        if ($_FILES[$value]['size'] <= 10240000000) 
                                                        {
                                                                if (is_dir($dir)==false)
                                                                {
                                                                        mkdir($dir,0777,true);
                                                                }
                                                                $target_file = $dir."/".$value."_".$data['Nom_7']."_".$data['Postnom_8']."_".$data['Prenom_9'].$fileExtension;
                                                                $target_file = str_replace(" ", "",$target_file);
                                                                $resultat = move_uploaded_file($_FILES[$value]['tmp_name'], $target_file);
                                                                if($resultat)
                                                                {
                                                                        $files_link[$value] = $target_file;
                                                                }
                                                        }
                                                
                                                }
                                        }
                                }
                                $id = NULL;
                                $data['Documents_18'] = json_encode($files_link);
                           else:
                                $data['Updateat_4'] = gmdate('Y-m-d H:i:s');
                           endif;
                           
                           $return = $this->admin_model->save_agent($data, $id);
                }
                elseif($obj == "contrat")
                {
                        $fields = array(
                            'Type_6' => 'type',
                            'Debut_7' => 'debut',
                            'Fin_8' => 'fin',
                            'Commentaire_10' => 'comment',
                            'CNSS_11' => 'cnss',
                            'Enfant_12' => 'enfants',
                            'Fonction_13' =>'fonction',
                            'Lieu_14'=>'lieu'
                        );
                        foreach($fields as $field => $value)
                        {
                                $data[$field] = $this->input->post($value);
                        }
                        if($id == 0 || $id == NULL):
                            $data['Date_1'] = date('Y-m-d H:i:s');
                            $data['Statut_3'] = 1;
                            $data['Creator_4'] = 1;
                            $data['Identifier_5'] = $this->input->post('identifier');
                            $files_link = array();
                            $validExtensions = array('.jpg', '.jpeg', '.pdf', '.png', '.JPG', '.JPEG', '.PDF', '.PNG');
                            if(isset($_FILES['attachement']["name"]) && $_FILES['attachement']["name"]!="" && $_FILES['attachement']['tmp_name']!= ""  )
                            {
                                    $dir = "./personnel_documents/".date('Y')."/agnets/";
                                    $fileExtension = strrchr($_FILES['attachement']['name'], ".");

                                    if(in_array($fileExtension, $validExtensions)) 
                                    {

                                            if ($_FILES['attachement']['size'] <= 10240000000) 
                                            {
                                                    if (is_dir($dir)==false)
                                                    {
                                                            mkdir($dir,0777,true);
                                                    }
                                                    $target_file = $dir."/".$_FILES['attachement']["name"].$data['Identifier_5'].$fileExtension;
                                                    $target_file = str_replace(" ", "",$target_file);
                                                    $resultat = move_uploaded_file($_FILES['attachement']['tmp_name'], $target_file);
                                                    if($resultat)
                                                    {
                                                            $files_link[$_FILES['attachement']["name"]] = $target_file;
                                                    }
                                            }
                                    }
                            }
                            $data['Documents_15'] = json_encode($files_link);
                            $Adata['Statut_3'] = 2;
                            $id = NULL;
                         else:
                            if(isset($_POST['state']) && $_POST['state'] ==="cl"):
                                $data['Statut_3'] = 2;
                                $Adata['Statut_3'] = 4;
                            endif;
                            if(isset($_POST['stop']) && $_POST['stop'] ==="st"):
                                $data['Statut_3'] = 2;
                                $Adata['Statut_3'] = 5;
                            endif;
                            $data['Update_16'] = date('Y-m-d H:i:s');
                        endif;
                        
                        $return = $this->admin_model->save_contract($data, $id);
                        if($return > 0)
                        {
                                $return = $this->admin_model->update_agent($Adata, $_POST['identifier']);
                        }
                }
                elseif($obj == "hollyday")
                {
                        
                        $fields = array(
                            'Type_8' => 'type',
                            'Motif_10'=>'Motif',
                            'Debut_6' => 'debut',
                            'Fin_7' => 'fin',
                            'Heured_11' => 'heured',
                            'Heuref_12' => 'heuref',
                            'Comment_9' => 'comment'
                        );
                        foreach($fields as $field => $value)
                        {
                                $data[$field] = $this->input->post($value);
                        }
                        if($id == 0 || $id == NULL):
                            $data['Date_1'] = date('Y-m-d');
                            $data['Statut_2'] = 1;
                            $data['Creator_3'] = 1;
                            $data['Identifier_5'] = $this->input->post('identifier');
                            $id = NULL;
                            $Adata['Statut_3'] = 3;
                        else:
                            if(isset($_POST['state']) && $_POST['state'] === "cl"):
                                $data['Statut_2'] = 2;
                                $Adata['Statut_3'] = 2;
                            endif;
                            $data['Update_4'] = date('Y-m-d H:i:s');
                        endif;
                        $return = $this->admin_model->save_holyday($data, $id);
                        if($return > 0)
                        {
                                $return = $this->admin_model->update_agent($Adata, $_POST['identifier']);
                        }
                }
                
                if($return)
                {
                        echo '<div class="alert alert-success"> Bravo ! informations enregistr&eacute;es avec succ&egrave;s <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button></div>';
                }
                else
                {
                        echo 401;
                }
                
                
        }
        
        
        public function get_piechart_data ($stats)
        {
                if($this->lang=='fr')
                {
                            $data = '
                                        {value:'.$stats[1].',label:"Agents journaliers",color:"#1c84c6",highlight:"aqua"},
                                        {value:'.$stats[2].',label:"Agents actifs",color:"#1ab394",highlight:"aqua"},
                                        {value:'.$stats[3].',label:"Agent en conge",color:"#f8ac59",highlight:"aqua"},
                                        {value:'.$stats[4].',label:"Agent inactif",color:"gray",highlight:"aqua"},
                                        {value:'.$stats[5].',label:"Agents revoques",color:"#ed5565",highlight:"aqua"},
                                    ';
                }
                else
                {
                            $data = '
                                        {value:'.$stats[5].',label:"Successful application",color:"green",highlight:"gray"},
                                        
                                    ';
                }
                return $data;
        }
    
}
