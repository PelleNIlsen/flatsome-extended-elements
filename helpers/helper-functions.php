<?php

class Helper_Function
{

    public function flatsome_gf_get_form_by_id( $id ) {
        $forms = GFAPI::get_forms();
    
        foreach ($forms as $key => $form) {
            if ($form['id'] == $id) {
                return $form['title'];
            }
        }
    }

}