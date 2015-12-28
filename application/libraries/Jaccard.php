<?php if (!defined('BASEPATH')) exit('Нет доступа к скрипту');

class Jaccard {

    public $vector = array(); # vector (function) that map elements from old set to new set
    # non-injective and non-surjective
    # the vector consist of maximum row elements of Jaccard matrix

    public $result = array(); # the two-coulumb matrix of the result of the mapping


    # fanction that find the Jaccard Coefficient of two strings by $distance-γράμματον set
    public function Jaccard_coef( $str_a , $str_b , $distance ){
        $str_a = str_split($str_a, $distance);
        $str_b = str_split($str_b, $distance);
        $a = count($str_a);
        $b = count($str_b);
        sort($str_a);
        sort($str_b);

        $c=0; $i=0; $j=0; $coefficient = 0;

        while ( ( $i < $a ) && ( $j < $b ) ) {
            if ($str_a[$i]==$str_b[$j]) {
                $c++;	$i++;	$j++;
            }
            elseif ($str_a[$i]>$str_b[$j]) {
                $j++;
            }
            else {
                $i++;
            }
        }
        $coefficient = $c/($a+$b-$c);
        return $coefficient;
    }


    # function that find the maximum likelihood in the Jaccard matrix and construct vector
    # the mapping vector from the old set to the new set
    public function Jaccard_matrix($arr_old , $arr_new , $distance){
        $a = count($arr_old);
        $b = count($arr_new);
        for ($i=0; $i < $a ; $i++) {
            $max = 0;
            for ($j=0; $j < $b ; $j++) {
                $mass = $this->Jaccard_coef( $arr_old[$i], $arr_new[$j] , $distance) + $this->Jaccard_coef( $arr_old[$i], $arr_new[$j] , $distance+1) + $this->Jaccard_coef( $arr_old[$i], $arr_new[$j] , $distance+2);
                if ( $mass > $max ) {
                    $max = $mass;
                    $this->vector[$i] = $j;
                }
            }
        }
    }


    # method the construct the result matrix using the mapping vector
    public function Jaccard_map ( $old , $new ){
        $n = count($this->vector);
        for ($i=0; $i<$n ; $i++) {
            $this->result[$i][0] = $old[$i];
            $this->result[$i][1] = $new[$this->vector[$i]];
        }
        return $this->result;
    }


    # method that returns the mapping vector
    public function Jaccard_vector(){
        return $this->vector;
    }



    function calculate($url_new = array(), $url_old = array(), $url_new_cut = array(), $url_old_cut = array())
    {
        $Jaccard = new Jaccard;
        $Jaccard -> Jaccard_matrix($url_old_cut, $url_new_cut, 1);

        $result = $Jaccard -> Jaccard_map($url_old,$url_new);

        return $result;
    }
    
     function calculate_h1($url_new = array(), $url_old = array(), $url_new_cut = array(), $url_old_cut = array())
    {
        $Jaccard = new Jaccard;
        $Jaccard -> Jaccard_matrix($url_old_cut, $url_new_cut, 2);

        $result = $Jaccard -> Jaccard_map($url_old,$url_new);

        return $result;
    }

}
