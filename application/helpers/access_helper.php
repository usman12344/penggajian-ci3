<?php

function is_logged_in()
{
    $ci3 = get_instance();
    if (!$ci3->session->userdata('email')) {
        redirect('auth');
    }
}
