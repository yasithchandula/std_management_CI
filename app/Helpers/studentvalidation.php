<?php 

trait studentValidation {

    public $srules=[
        'firstname'=>'required|min_length[10]',
        'lastname'=>'required|min_length[10]'

    ];

}

?>