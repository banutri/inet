<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FlashMsg {
    
    protected $ci;
    
    function __construct()
    {
        // Assign the CodeIgniter super-object
                $this->ci =& get_instance();
                $this->ci->load->library('session');
    }

    public function set_msg($data,$value=NULL)
    {
        if(is_array($data))
        {
            $this->ci->session->set_userdata($data);
        }
        $_SESSION[$data]=$value;

    }

    public function msg($key=NULL)
    {
        $flashmsg='';
        if($key!=NULL)
        {
            $flashmsg =  $this->ci->session->userdata($key);
            $this->ci->session->unset_userdata($key);
        }

        return $flashmsg;
    }
}
?>