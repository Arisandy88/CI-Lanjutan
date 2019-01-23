<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dreams extends CI_Controller {

    public function impian()
    {
        $data['konten']="v_impian";
        $this->load->view('template',$data);
        
    }

}
?>