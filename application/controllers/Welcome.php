<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
   
    /* Connect to the mySQL database - config values can be found at:
      /application/config/database.php */
    $dbconnect = $this->load->database();


    /* Load the database model:
      /application/models/simple_model.php */
    $this->load->model('News_model');
    

    /* Create a table if it doesn't exist already */
    $this->Simple_model->create_table();
    
    
    /* Call the "insert_item" entry */
    $this->Simple_model->insert_item('Hello from Runnable!');

    /* Retrieve the last item  */
    print '<pre>';
    print_r($this->Simple_model->get_last_item());
    print '</pre>';

    /* Retrieve and print the row count */
    $rowcount = $this->Simple_model->get_row_count();
    print '<strong>Row count: ' . $rowcount . '</strong>';
    }
}
