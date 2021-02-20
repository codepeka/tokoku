<?php

function helper_log($tipe = "", $str = ""){
    $CI =& get_instance();

    if (strtolower($tipe) == "login"){
        $log_tipe   = 'Login';
    }
    elseif(strtolower($tipe) == "logout")
    {
        $log_tipe   = 'Logout';
    }
    elseif(strtolower($tipe) == "add"){
        $log_tipe   = 'Add';
    }
    elseif(strtolower($tipe) == "update"){
        $log_tipe  = 'Update';
    }
    elseif(strtolower($tipe) == "delete"){
        $log_tipe  = 'Delete';
    }
    else{
        $log_tipe  = 'Others';
    }

    // paramter
    $param['id_user']       = $CI->session->userdata('idUser');
    $param['tanggal']       = date("Y-m-d H:i:s");
    $param['tipe']          = $log_tipe;
    $param['description']   = $str;

    //load model log
    $CI->load->model('HistoryModel', 'hm');

    //save to database
    $CI->hm->save_log($param);

}

