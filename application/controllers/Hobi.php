<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Hobi extends CI_Controller {

    public function main()
    {
        $data['konten']="v_hobi";
        $this->load->view('template',$data);
        
    }

}
?>