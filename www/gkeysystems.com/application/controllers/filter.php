<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Filter extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function filter_1()
    {
        if ($this->input->post()) {
            echo "<pre>";
            print_r($this->input->post());die;
            // $data-n filterum @ntrvac tvyalnnern en voronq karox eq ogtagorcel dzer mtacac logikan irakanacnelu hamar 
            $data = $this->input->post();
        }
    }

    public function filter_2()
    {
        if ($this->input->post()) {
            echo "<pre>";
            print_r($this->input->post());die;
            // $data-n filterum @ntrvac tvyalnnern en voronq karox eq ogtagorcel dzer mtacac logikan irakanacnelu hamar 
            $data = $this->input->post();
        }
    }

}

