<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Saturn
 * Date: 2/20/2017
 * Time: 3:31 AM
 */
class MY_Controller extends CI_Controller
{
    protected $post = array();

    public function __construct()
    {
        parent::__construct();
        $this->post = $this->input->post(null, true);
    }

    /**
     *  Collect different data for any controller method
     */
    protected function collectData(&$hdata = null, &$fdata = null)
    {

    }

}