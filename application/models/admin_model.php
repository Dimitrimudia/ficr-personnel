<?php
class admin_model extends MY_Model{
    
    
        public $genres = array(
            '1'=>'Masculin',
            '2'=>'F&eacute;minin',
            ''=>''
        );
        
        public $maritals = array(
            '1'=>'C&eacute;libataire',
            '2'=>'Mari&eacute; (e)',
            '3'=>'Divorc&eacute; (e)',
            ''=>''
        );
         
       public $status= array(
           '1'=>'Journalier',
           '2'=>'Actif',
           '3'=>'En cong&eacute;',
           '4'=>'Inactif',
           '5'=>'Revoqu&eacute;'
       );
       
       public $types = array(
           '1'=>'CDI',
           '2'=>'CDD',
           ''=>''
       );
       
       public $ctypes = array(
           '1'=>'Cong&eacute; annuel',
           '2'=>'Cong&eacute; de circonstance',
           ''=>''
       );
       
       public $color_state = array(
            '1'=>'badge-success',
            '2'=>'badge-primary',
            '3'=>'badge-warning',
            '4'=>'',
            '5'=>'badge-danger',
       );
       
         
        public function get_info_agent($oid = NULL)
        {
                if($oid==NULL || $oid == 0)
                {
                        $agent = new stdClass();
                        $agent->Id_0 = 0;
                        $agent->Date_1 = gmdate('Y-m-d');
                        $agent->Statut_3 = '';
                        $agent->Updateat_4 = gmdate('Y-m-d H:i:s');
                        $agent->Updateby_5= '';
                        $agent->User_6 = '';
                        $agent->Nom_7 = '';
                        $agent->Postnom_8 ='';
                        $agent->Prenom_9 = '';
                        $agent->Genre_10='';
                        $agent->Naissance_11 = '';
                        $agent->Nationality_12 = '';
                        $agent->EtatCivil_12 = '';
                        $agent->Telephone_13 = '';
                        $agent->Fonction_14 = '';
                        $agent->Adresse_15 = '';
                        $agent->Email_16 = '';
                        $agent->Lieu_17 = '';
                        $agent->Documents_18 = '';
                        return $agent;
		}
                else
                {
                        $this->set_table('personnel_agents', 'Id_0', 'Id_0 DESC');
                        return $this->get_by(array('Id_0' => $oid), TRUE);
		}
        }

        public function get_info_contract($cid)
        {
                if($cid == NULL || $cid == 0)
                {
                        $contract = new stdClass();
                        $contract->Id_0 = 0;
                        $contract->Date_1 = gmdate('Y-m-d');
                        $contract->Statut_3 = '';
                        $contract->Creator_4 = '';
                        $contract->Identifier_5= '';
                        $contract->Type_6 = '';
                        $contract->Debut_7 = '';
                        $contract->Fin_8 ='';
                        $contract->Description_9 = '';
                        $contract->Commentaire_10='';
                        $contract->CNSS_11 = '';
                        $contract->Enfant_12 = '';
                        $contract->Fonction_13 = '';
                        $contract->Lieu_14 = '';
                        $contract->Documents_15 = '';
                        $contract->Update_16 = '';
                        return $contract;
		}
                else
                {
                        $this->set_table('personnel_contrats', 'Id_0', 'Id_0 DESC');
                        return $this->get_by(array('Id_0' => $cid), TRUE);
		}
        }

        public function get_info_holyday($hid)
        {
                if($hid == NULL || $hid == 0)
                {
                        $holyday = new stdClass();
                        $holyday->Id_0 = 0;
                        $holyday->Date_1 = gmdate('Y-m-d');
                        $holyday->Statut_2 = '';
                        $holyday->Creator_3 = '';
                        $holyday->Update_4= '';
                        $holyday->Identifier_5 = '';
                        $holyday->Debut_6 = '';
                        $holyday->Fin_7 ='';
                        $holyday->Type_8 = '';
                        $holyday->Comment_9='';
                        $holyday->Motif_10 = '';
                        $holyday->Heured_11 = '';
                        $holyday->Heuref_12 = '';
                        return $holyday;
		}
                else
                {
                        $this->set_table('personnel_holydays', 'Id_0', 'Id_0 DESC');
                        return $this->get_by(array('Id_0' => $hid), TRUE);
		}
        }

        public function get_info_document()
        {

        }
        
        public function connexion($data = NULL)
        {       
                if($data != NULL)
                {
                        $this->set_table('personnel_users', 'Id_0', 'Id_0');
                        return $this->get_by(array('Identifier_11' => $data['Identifier_11']), TRUE);
                }
                else
                {
                        $user = NULL;
                        return $user;
                }
        }


        public function get_agents()
        {
                $this->db->select('personnel_agents.*');
                $this->db->from('personnel_agents');
                $this->db->where("personnel_agents.Statut_3 <> 0");
                $this->db->order_by('personnel_agents.Id_0', 'personnel_agents.Id_0 DESC');
                return $this->get_all();
        }

        public function get_all_documents($id = NULL)
        {
                if($id!=NULL)
                {
                    $this->db->select('personnel_documents.*');
                    $this->db->from('personnel_documents');
                    $this->db->where("personnel_documents.Identifier_6 ='".$id."'");
                    $this->db->distinct();
                    $this->db->order_by('personnel_documents.Id_0');
                    return $this->get_all();
                }
        }


        public function get_all_contracts($id = NULL)
        {
               if($id!=NULL)
               {
                    $this->db->select('personnel_contrats.*');
                    $this->db->from('personnel_contrats');
                    $this->db->where("personnel_contrats.Identifier_5 ='".$id."'");
                    $this->db->distinct();
                    $this->db->order_by('personnel_contrats.Id_0');
                    return $this->get_all();
               }
        }

        public function get_all_holydays($id = NULL)
        {
                if($id!=NULL)
                {
                    $this->db->select('personnel_holydays.*');
                    $this->db->from('personnel_holydays');
                    $this->db->where("personnel_holydays.Identifier_5 ='".$id."'");
                    $this->db->distinct();
                    $this->db->order_by('personnel_holydays.Id_0');
                    return $this->get_all();
                }
        }

        
             public function get_candidatures_stats()
        {
                $this->_table_name = '';
                $stats = array(
                        "1" => '0', //'Journalier',
                        "2" => '0', //'Actif',
                        "3" => '0', //'En cong&eacute;',
                        "4" => '0', //'Inactif',
                        "5" => '0', //'Revoqu&eacute;',
                        "t" => '0' //'Retenu'
                );
                
                $query = $this->db->select('COUNT(a.Statut_3) AS Qty, a.Statut_3 AS Status')
                                    ->group_by('Status')
                                    ->distinct()
                                    ->get('personnel_agents  a');
                
                
                //var_dump($query->result_array()); die;
                foreach ($query->result_array() as $row)
                {
                        if(isset($stats[$row['Status']]))
                        {
                                $stats[$row['Status']] = $row['Qty'];
                                $stats['t'] = $stats['t'] + $row['Qty'];
                        }
                }
                return $stats;
        }

        public function save_agent($data, $id)
        {
                $this->set_table('personnel_agents', 'Id_0', 'Id_0 DESC');
                ($id > 0) || $this->db->where('Id_0', $id);
                return $this->save($data, $id);
        }
        public function update_agent($data, $id)
        {
                $this->db->where("personnel_agents.Id_0 ='".$id."'");
                return $this->db->update('personnel_agents',$data);
        }

        public function save_contract($data, $id)
        {
                $this->set_table('personnel_contrats', 'Id_0', 'Id_0 DESC');
                ($id > 0) || $this->db->where('Id_0', $id);
                return $this->save($data, $id);
        }
        public function update_contract($data, $id)
        {
                $this->db->where("personnel_contrats.Identifier_5 ='".$id."'");
                return $this->db->update('personnel_contrats',$data);
        }

        public function save_holyday($data, $id)
        {
                $this->set_table('personnel_holydays', 'Id_0', 'Id_0 DESC');
                ($id > 0) || $this->db->where('Id_0', $id);
                return $this->save($data, $id);
        }
        
        public function update_holyday($data, $id)
        {
                $this->db->where("personnel_holydays.Identifier_5 ='".$id."'");
                return $this->db->update('personnel_holydays',$data);
        }
    
    
}
