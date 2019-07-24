<?php
function IsMyProduct($id = null)
{
    if (isset($_SESSION['userId'])) {

        if ($_SESSION['admin'] == 1)
            return true;
        if (isset($id)) {
            $CI = get_instance();
            $data = $CI->db->get_where('posts', array('p_id' => $id, 'p_user_id' => $_SESSION['userId']))->num_rows();
            if ($data > 0) {
                return true;
            }
        }
    }
    return false;
}