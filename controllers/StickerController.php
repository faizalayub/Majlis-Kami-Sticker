<?php
include_once 'App.php';

class StickerController extends Controller {

    function __construct($return_mode){
        parent::__construct($return_mode);
    }

    function accounts(){
        return $this->fetchRows("SELECT * FROM pengguna");
    }
}
?>