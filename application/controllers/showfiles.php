<?php
class showFiles extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library(array('ion_auth'));
    }

    public function index(){
        if ($this->ion_auth->logged_in()){
            $id = $this->ion_auth->user()->row()->id;
            $query = $this->db->get_where('files', array('user_id' => $id));
//            var_dump($query);
            if ($query->num_rows() > 0){
            foreach($query->result() as $row){
                $result[] =  $row->path;
            }
            $data['result'] = $result;
//            var_dump($result);
            $this->load->view('files', $data);}
            else echo "У вас еще нет документов";
//            var_dump($query);

        }
        else echo "Извините, вы не зарегестирировались или не вошли, мы вас не знаем!";
//        echo "hello";
    }
}
