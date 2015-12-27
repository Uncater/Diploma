<?php



class Upload extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->helper('download');
        $this->load->helper('date');
        $this->load->library(array('ion_auth'));
    }

    public function index()
    {
        $this->load->view('upload');
    }





    public function getData()
    {


        $url_new_cut = array(); $new = array();
        $url_old_cut = array(); $old = array();
        $url_new = array(); $data = array();
        $url_old = array();


        switch ($_POST['optionsRadios'])
        {
            case 'option_url':
                $new_cutme = strlen($_POST['url_new']);
                $old_cutme = strlen($_POST['url_old']);

                if (($handle_new = fopen($_FILES['csv_new']['tmp_name'], "r")) !== FALSE) {
                    while (($data_new = fgetcsv($handle_new, 1000, ",")) !== FALSE) {
                        $new[] = $data_new;
                    }
                    fclose($handle_new);
                }
                for($i=0;$i<count($new);$i++){
                    $url_new[] = $new[$i][0];
                }

                foreach($url_new as $value){
                    $url_new_cut[] = substr($value, $new_cutme);
                }

                if (($handle_old = fopen($_FILES['csv_old']['tmp_name'], "r")) !== FALSE) {
                    while (($data_old = fgetcsv($handle_old, 1000, ",")) !== FALSE) {
                        $old[] = $data_old;
                    }
                    fclose($handle_old);
                }
                for($i=0;$i<count($new);$i++){
                    $url_old[] = $old[$i][0];
                }

                foreach($url_old as $value){
                    $url_old_cut[] = substr($value, $old_cutme);
                }



                $this->load->library('jaccard');
                $result = $this->jaccard->calculate($url_new, $url_old, $url_new_cut, $url_old_cut);

                $reslen = count($result);
                for($k=0; $k<$reslen; $k++){
                    $data[] = $result[$k][0] . ',' . $result[$k][1];
                }
                $resstring = implode(PHP_EOL, $data);
                $name = date('Y-m-d H:i:s') . ".csv";
                force_download($name, $resstring);


                if ($this->ion_auth->logged_in()){
                    $username = $this->ion_auth->user()->row()->first_name;

                    $id = $this->ion_auth->user()->row()->id;
                    $path=$_SERVER['DOCUMENT_ROOT'] . '/uploads/'.$username . "/";
                    @mkdir($path,0777);
                    $filename = $path . date('Y-m-d H:i:s') . "_" . $username . ".csv";
                    file_put_contents($filename,$resstring);
                    $insert = array(
                        'user_id' => $id,
                        'path' => $filename
                    );
                    $this->db->insert('files', $insert);
                }
                break;


            case 'option_H1' :   if (($handle_new = fopen($_FILES['csv_new']['tmp_name'], "r")) !== FALSE) {
                while (($data_new = fgetcsv($handle_new, 1000, ",")) !== FALSE) {
                    $new[] = $data_new;
                }
                fclose($handle_new);
            }
                for($i=0;$i<count($new);$i++){
                    $url_new[] = $new[$i][0];
                }

                for($i=0;$i<count($new);$i++){
                    $h1_new[] = $new[$i][1];
                }



                if (($handle_old = fopen($_FILES['csv_old']['tmp_name'], "r")) !== FALSE) {
                    while (($data_old = fgetcsv($handle_old, 1000, ",")) !== FALSE) {
                        $old[] = $data_old;
                    }
                    fclose($handle_old);
                }
                for($i=0;$i<count($new);$i++){
                    $url_old[] = $old[$i][0];
                }
                for($i=0;$i<count($new);$i++){
                    $h1_old[] = $old[$i][1];
                }





                $this->load->library('jaccard');
                $result = $this->jaccard->calculate($url_new, $url_old, $h1_new, $h1_old);

                $reslen = count($result);
                for($k=0; $k<$reslen; $k++){
                    $data[] = $result[$k][0] . ',' . $result[$k][1];
                }
                $resstring = implode(PHP_EOL, $data);
                $name = date('Y-m-d H:i:s') . ".csv";
                force_download($name, $resstring);
                if ($this->ion_auth->logged_in()){
                    $username = $this->ion_auth->user()->row()->first_name;

                    $id = $this->ion_auth->user()->row()->id;
                    $path=$_SERVER['DOCUMENT_ROOT'] . '/uploads/'.$username . "/";
                    @mkdir($path,0777);
                    $filename = $path . date('Y-m-d H:i:s') . "_" . $username . ".csv";
                    file_put_contents($filename,$resstring);
                    $insert = array(
                        'user_id' => $id,
                        'path' => $filename
                    );
                    $this->db->insert('files', $insert);
                }
                break;
        }





    }
}
