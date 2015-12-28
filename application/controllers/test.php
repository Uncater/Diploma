<?php
class Test extends CI_Controller{
    function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $query = $this->db->get('users');
        foreach($query->result() as $row){
            echo $row->id;
        }
    }
}
