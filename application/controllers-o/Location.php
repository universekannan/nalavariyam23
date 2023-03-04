<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Location Controller FrontEnd
 *
 * @author Jaeeme
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Location extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //$this->load->model('Site', 'location');
		$this->load->model('Model_site', 'location');
    }

    // get state names
    public function index() {
        $data['page'] = 'country-list';
        $data['title'] = 'country List | TechArise';
        $data['geCountries'] = $this->location->getAllCountries();   
        $this->load->view('location/index', $data);
    }

    // get state names
    public function getstates() {
        $json = array();
        $this->location->setCountryID($this->input->post('countryID'));
        $json = $this->location->getStates();
        header('Content-Type: application/json');
        echo json_encode($json);
    }

    // get city names
    function getcities() {
        $json = array();
        $this->location->setStateID($this->input->post('stateID'));
        $json = $this->location->getCities();
        header('Content-Type: application/json');
        echo json_encode($json);
    }

}