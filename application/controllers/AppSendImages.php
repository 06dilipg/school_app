<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AppSendImages extends CI_Controller {

    public function index($name)
    { ?>
        <img src="<?php echo base_url('images/'.$name); ?>" alt="no images" />
    <?php }

}
