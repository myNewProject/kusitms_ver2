<?php 
class KusitmsErrorPage extends MY_Controller 
{
    public function __construct() 
    {
        parent::__construct(); 
    } 

    public function index() 
    { 
        $this->_header('main-header');

        $this->output->set_status_header('404'); 
        $data['content'] = 'error_404'; // View name 
        $this->load->view('error_404',$data);//loading in my template 

        $this->_footer('main-footer');
    } 

    public function error404() 
    { 
        $this->_header('main-header');

        $this->output->set_status_header('404'); 
        $data['content'] = 'error_404'; // View name 
        $this->load->view('error_404',$data);//loading in my template 

        $this->_footer('main-footer');
    } 

    public function error500() 
    { 
        $this->_header('main-header');

        $this->output->set_status_header('500'); 
        $data['content'] = 'error_500'; // View name 
        $this->load->view('error_500',$data);//loading in my template 

        $this->_footer('main-footer');
    } 
} 
?> 

