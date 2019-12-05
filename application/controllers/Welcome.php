<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Created by : Dimitri Mudiangondo
	 *
	 * Update at : 02 November 2019
	 */
    
	public function index()
	{
		$this->load->view('admin');
	}
        
        public function connexion()
        {
                var_dump($_POST);
        }
}
