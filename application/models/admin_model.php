<?php
class admin_model extends MY_Model{
    
        public function get_info_agent()
        {

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
                        $this->get_by(array('Identifier_11' => $data['Identifier_11']), TRUE);
                }
                else
                {
                        $user = NULL;
                        return $user;
                }
        }


        public function get_agents()
        {
               
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
