<?php

use Aws\Result;

class Model_banner extends Model_db{
    function listRecords(){
        $sql = "SELECT * FROM banner";
        return $this->result1(0,$sql);
    }

    function getOneRecord($id){
        $sql = "SELECT bannerImage, bannerLink FROM banner WHERE id=?";
        return $this->result1(1,$sql,$id);
    }
    
    function editBanner($imgs, $bannerLink, $id){
        $sql ="UPDATE banner SET bannerImage=?, bannerLink=? WHERE id=?";
        return $this->exec1($sql, $imgs, $bannerLink, $id);
    }
}

?>