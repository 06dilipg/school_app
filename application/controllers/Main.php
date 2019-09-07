<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    public function index()
    {
        $this->load->view('main');
    }
    public  function  save(){
        $this->do_upload();

    }
    public  function  do_upload(){
        if(is_uploaded_file($_FILES["pic"]["tem_name"]) ){
            move_uploaded_file($_FILES["pic"]["tem_name"],"./images/".$_FILES["pic"]["tem_name"]);
        }

    }
    public function view(){
        echo base_url();
        ?> <img src="<?php echo base_url('images/Penguins.jpg'); ?>" alt="no images" />
        <h1>Images</h1>

        <?php
    }
}
