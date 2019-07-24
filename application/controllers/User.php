<?php

/**
 * Created by PhpStorm.
 * User: ammar
 * Date: 29/05/2019
 * Time: 04:09 م
 */
class  User extends CI_Controller
{

    function render_page($page = null, $data = null)
    {
        if ($page == 'login' || $page == 'register' || $page == 'activation' ||$page == 'forgot') {
            $this->load->view('new_admin/'.$page,$data);
        } else {
            $this->load->view('new_admin/include/header', $data);
            $this->load->view('new_admin/include/navbar', $data);
            $this->load->view('new_admin/' . $page, $data);
            $this->load->view('new_admin/include/footer', $data);
        }

    }

}