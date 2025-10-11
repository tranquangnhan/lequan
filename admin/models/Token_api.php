<?php
 class ModelTokenAPI extends Model_db{
    function getAllBill()
    {
        $sql = "SELECT * FROM donhang ORDER BY idUser DESC";
        return $this->result1(0,$sql);
    }
    function updateToken($id,$token){
        $sql = "UPDATE user SET fcm_token = ? WHERE idUser = ?";
        return $this->exec1($sql, $token, $id);
    }
    function removeToken($id){
        $sql = "UPDATE user SET fcm_token = NULL WHERE idUser = ?";
   
        return $this->exec1($sql, $id);
    }
}