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
           '1'=>'Actif',
           '2'=>'En cong&eacute;',
           ''=>'',
       );
         
        public function get_info_agent($oid = NULL)
        {
                if($oid==NULL)
                {
                        $agent = new stdClass();
                        $agent->Id_0 = '';
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
                        $agent->Mail_16 = '';
                        $agent->Lieu_17 = '';
                        return $agent;
		}
                else
                {
                        $this->set_table('personnel_agents', 'Id_0', 'Id_0 DESC');
                        return $this->get_by(array('Id_0' => $oid), TRUE);
		}
        }

        public function get_info_contract()
        {

        }

        public function get_info_holyday()
        {

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

        }


        public function get_all_contracts($id = NULL)
        {

        }

        public function get_all_holydays($id = NULL)
        {

        }


        public function save_agent($data, $id)
        {
                $this->set_table('personnel_agents', 'Id_0', 'Id_0 DESC');
                ($id >0) || $this->db->where('Id_0', $id);
                return $this->save($data, $id);
        }

        public function save_contract($data, $id)
        {

        }

        public function save_document($data, $id)
        {

        }

        public function save_holyday($data, $id)
        {

        }
    
    
}
