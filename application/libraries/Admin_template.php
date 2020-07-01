<?php
class Admin_template{
    protected $_ci;
    
    function __construct(){
        $this->_ci = &get_instance();
    }
    
  function render($content, $data = NULL){
    /*
     * $data['headernya'] , $data['contentnya'] , $data['footernya']
     * variabel diatas ^ nantinya akan dikirim ke file views/template/index.php
     * */
        $data['headernya'] = $this->_ci->load->view('admin/includes/header', $data, TRUE);
        $data['sidebarnya'] = $this->_ci->load->view('admin/includes/sidebar', $data, TRUE);
        $data['contentnya'] = $this->_ci->load->view($content, $data, TRUE);
        $data['modals'] = $this->_ci->load->view('admin/includes/modals', $data, TRUE);
        $data['footernya'] = $this->_ci->load->view('admin/includes/footer', $data, TRUE);
        $data['scripts'] = $this->_ci->load->view('admin/includes/scripts', $data, TRUE);
        
        $this->_ci->load->view('admin/index', $data);
    }
}
?>