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
                        $this->data['types'] = $this->admin_model->types;
                        $this->data['genres'] =  $this->admin_model->genres;
                        $this->data['status'] =  $this->admin_model->status;
                        $this->data['hstatus'] =  $this->admin_model->ctypes;
                        $this->data['hstates'] =  $this->admin_model->hollyday_state;
                        $this->data['states'] =  $this->admin_model->contrat_state;
                        $this->data['color'] =  $this->admin_model->color_contract;
                        $this->data['maritals'] =  $this->admin_model->maritals;
                        $this->load->view('_agent',$this->data);
                }
                elseif($obj=="contract")
                {
                        $dates1 = array();
                        $dates2 = array();
                        $contract = $this->data['contract'] = $this->admin_model->get_info_contract($id);
                        $this->data['types'] = $this->admin_model->types;
                        $dates1[0] = $contract->Debut_7;
                        $dates1[1] = $contract->Fin_8;
                        #Calcul des jours restants
                        $dates2[0] = date('Y-m-d');
                        $dates2[1] = $contract->Fin_8;
                        $this->data['jours'] =$this->data('nb_jours', $dates1);
                        $this->data['joursr'] =$this->data('nb_jours', $dates2);
                        $this->data['status'] = $this->admin_model->contrat_state;
                        $this->data['agent'] = $this->admin_model->get_info_agent($param);
                        $this->load->view('_contract',$this->data);
                }
                elseif($obj=="hollyday")
                {
                        $hollyday = $this->data['hollyday'] = $this->admin_model->get_info_holyday($id);
                        $this->data['ctypes'] = $this->admin_model->ctypes;
                        $this->data['status'] = $this->admin_model->hollyday_state;
                        $dates1[0] = $hollyday->Debut_6;
                        $dates1[1] = $hollyday->Fin_7;
                        #Calcul des jours restants
                        $dates2[0] = date('Y-m-d');
                        $dates2[1] = $hollyday->Fin_7;
                        $this->data['jours'] =$this->data('nb_jours', $dates1);
                        $this->data['joursr'] =$this->data('nb_jours', $dates2);
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
                                
                                $id = NULL;
                           else:
                                $data['Updateat_4'] = gmdate('Y-m-d H:i:s');
                           endif;
                           
                           if(!empty($_FILES))
                           {
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
                                $data['Documents_18'] = json_encode($files_link);
                           }
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
                            $Adata['Statut_3'] = 2;
                            $id = NULL;
                         else:
                            if(isset($_POST['state']) && $_POST['state'] ==="cl"):
                                $data['Statut_3'] = 2;
                                $Adata['Statut_3'] = 4;
                            endif;
                            if(isset($_POST['stop']) && $_POST['stop'] ==="st"):
                                $data['Statut_3'] = 3;
                                $Adata['Statut_3'] = 5;
                            endif;
                            $data['Update_16'] = date('Y-m-d H:i:s');
                        endif;
                        
                        $files_link = array();
                        $validExtensions = array('.jpg', '.jpeg', '.pdf', '.png', '.JPG', '.JPEG', '.PDF', '.PNG');
                        if(!empty($_FILES))
                        {
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
                        }
                        $return = $this->admin_model->save_contract($data, $id);
                        if(!empty($Adata))
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
                        
                        $files_link = array();
                        $validExtensions = array('.jpg', '.jpeg', '.pdf', '.png', '.JPG', '.JPEG', '.PDF', '.PNG');
                        if(!empty($_FILES))
                        {
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
                                $data['Documents_12'] = json_encode($files_link);
                        }
                        $return = $this->admin_model->save_holyday($data, $id);
                        if(!empty($Adata))
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
        
        public function leap_year($year)
        {
            return date("L", mktime(0, 0, 0, 1, 1, $year));
        }
        
        public function data($obj=NULL, $data=NULL)
        {
                if($obj=="nb_jours")
                {
                        
                        
                        $timestamp1    = strtotime($data[0]);
                        $timestamp2    = strtotime($data[1]);

                        $tot = 0; // total de jours entre les 2 dates

                        // dates en jours de l'année ( depuis le 1er jan )
                        $date1 = date("z", $timestamp1) ; // date de depart
                        $date2 = date("z", $timestamp2) ; //date d'arrivée

                        $day_stamp = 86400 ; //(3600 * 24 ); // un journée en timestamp

                        // années des deux dates
                        $year1 = date("Y", $timestamp1) ;
                        $year2 = date("Y", $timestamp2) ;

                        $num = 0; // nombre de jours feries a compter sur la duree totale
                        $counter = 0; // la durée entre deux date par année

                        $year = $year1; // l'année en cours ( defaut : $year1 )


                        // on calcule le nombre de jours de différence entre les deux dates, en tenant
                        // compte des années
                        while ( $year <= $year2 )
                        {
                                $date3         = date("d-n-Y", mktime(0, 0, 0, 1,  1,  $year));
                                $timestamp3 = strtotime($date3); 
                                // date de référence pour l'année en cours
                                $counter = 0; // compteur de jours pour chaque année

                                //on récupère la date de pâques   
                                $easterDate   = easter_date($year) ;
                                $easterDay    = date('j', $easterDate) ;
                                $easterMonth  = date('n', $easterDate) ;
                                $easterYear   = date('Y', $easterDate) ;



                                // le tableau sort les jours fériés de l'année depuis le premier janvier
                                $closed = array
                                (
                                    // dates fixes
                                    date("z", mktime(0, 0, 0, 1,  1,  $year)),  // 1er janvier
                                    date("z", mktime(0, 0, 0, 5,  1,  $year)),  // Fête du travail
                                    date("z", mktime(0, 0, 0, 5,  8,  $year)),  // Victoire des alliés
                                    date("z", mktime(0, 0, 0, 7,  14, $year)),  // Fête nationale
                                    date("z", mktime(0, 0, 0, 8,  15, $year)),  // Assomption
                                    date("z", mktime(0, 0, 0, 11, 1,  $year)),  // Toussaint
                                    date("z", mktime(0, 0, 0, 11, 11, $year)),  // Armistice
                                    date("z", mktime(0, 0, 0, 12, 25, $year)),  // Noel

                                    // Dates basées sur Paques
                                    date("z", mktime(0, 0, 0, $easterMonth, $easterDay + 1, $easterYear)

                                    ),  // Lundi de Paques
                                    date("z", mktime(0, 0, 0, $easterMonth, $easterDay + 39, $easterYear

                                    )), // Ascension
                                    date("z", mktime(0, 0, 0, $easterMonth, $easterDay + 50, $easterYear

                                    ))  // Lundi de Pentecote

                                );

                                // si c'est la première année -> on commence par la date de depart; 
                                // le compteur compte les jours jusqu'au 31dec
                                if( $year == $year1 && $year < $year2 )
                                { 
                                        $i = $date1; 
                                        $counter +=  (364+$this->leap_year($year)) ; 
                                }
                                // si c'est ni la première ni la dernière année -> on commence au premier
                                // janvier; 
                                //le compteur compte tous les jours de l'année
                                if( $year > $year1 && $year < $year2 )
                                {
                                        $i = date("z", mktime(0, 0, 0, 1,  1,  $year));  
                                        $counter += 364+$this->leap_year($year); 
                                }

                                // si c'est la dernière année -> on commence au premier janvier; 
                                // le compteur va jusqu'a la date d'arrivée
                                if( $year == $year2 && $year > $year1 )
                                { 
                                        $i = date("z", mktime(0, 0, 0, 1,  1,  $year)); 
                                        $counter += $date2 ; 
                                }

                                // si les deux dates sont dans la même année
                                if( $year == $year1 && $year == $year2 )
                                { 
                                        $i = $date1; 
                                        $counter += $date2 ; 
                                }

                                // on boucle les jours sur la période donnée
                                while ( $i <= $counter )
                                {
                                        $tot = $tot +1; // on ajoute 1 pour chaque jour passé en revue

                                        if( in_array($i, $closed) ) 
                                        {
                                                $num++; // on ajoute 1 pour chaque jour férié rencontré
                                        }

                                        // on compte chaque samedi et chaque dimanche
                                        if(((date("w", $timestamp3 + $i * $day_stamp) == 6) or (date("w", 
                                        $timestamp3 + $i * $day_stamp) == 0)) and !in_array($i, $closed)) 
                                        {
                                                $num++ ;
                                        }
                                        $i++;
                                }
                                $year++ ; // on incremente l'année
                        }
                        $res = $tot - $num; 
                        // nombre de jours entre les 2 dates fournies - nombre de jours non ouvrés
                        return $res;
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
