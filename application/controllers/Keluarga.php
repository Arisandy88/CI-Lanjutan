<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Keluarga extends CI_Controller {

    public function fams()
    {
        $data['konten']="v_keluarga";
        $this->load->view('template',$data);
        
    }

}

/* End of file Program.php */

?>