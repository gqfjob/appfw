<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Frontpage extends CI_Controller {
    var $data;
    function __construct(){
        parent::__construct();
        $this->load->helper('ckeditor');
        $this->data['ckeditor']=array(
            'id'    =>      'content',//模板中textareaID
            'path'  =>      'plugins/ckeditor',//ckeditor目录
             //Optionnal values
            'config' => array(
                'toolbar'       =>      "Full", 
                'width'         =>      "600px",        
                'height'        =>      '400px',        
            ),
            //Replacing styles from the "Styles tool"
            'styles' => array(
                //Creating a new style named "style 1"
                'style 1' => array (
                    'name'  =>  'Blue Title',
                    'element'   =>  'h2',
                    'styles' => array(
                        'color' =>  'Blue',
                        'font-weight'   =>  'bold'
                    )
                ),

                //Creating a new style named "style 2"
                'style 2' => array (
                    'name'  =>  'Red Title',
                    'element'   =>  'h2',
                    'styles' => array(
                        'color'                 =>      'Red',
                        'font-weight'           =>      'bold',
                        'text-decoration'       =>      'underline'
                    )
                )
            )
        );
    }
    public function index()
    {
        $this->load->view('include/header');
        $this->load->view('frontpage',$this->data);
        $this->load->view('include/footer');
    }

}

/* End of file frontpage.php */
/* Location: ./application/controllers/frontpage.php */
