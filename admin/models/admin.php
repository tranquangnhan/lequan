<?php

class Model_admin extends Model_db{

    public function getAllAdminFcmTokens() {
    $sql = "SELECT fcm_token FROM user WHERE fcm_token IS NOT NULL";
    return $this->result1(0,$sql);
    }

    public function saveFcmToken($adminId, $token) {
        $sql = "UPDATE user SET fcm_token = ? WHERE id = ?";
        return $this->exec1($sql, [$token, $adminId]);
    }

}