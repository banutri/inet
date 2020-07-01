<?php
class Customer_template{
    protected $_ci;
    
    function __construct(){
        $this->_ci = &get_instance();
    }
    
  function render($content, $data = NULL){
    /*
     * $data['headernya'] , $data['contentnya'] , $data['footernya']
     * variabel diatas ^ nantinya akan dikirim ke file views/template/index.php
     * */
        $data['headernya'] = $this->_ci->load->view('customer/includes/header', $data, TRUE);
        $data['contentnya'] = $this->_ci->load->view($content, $data, TRUE);
        $data['modals'] = $this->_ci->load->view('customer/includes/modals', $data, TRUE);
        $data['footernya'] = $this->_ci->load->view('customer/includes/footer', $data, TRUE);
        
        $this->_ci->load->view('customer/index', $data);
    }
}
?>