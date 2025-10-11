<?php
class ModelBinhLuan  extends Model_db{
 

    function getAll() {
        $sql = "SELECT *, u.name as user_name, p.name as product_name, bl.id as binhluan_id
                FROM binhluan bl 
                JOIN product p ON bl.id_product = p.id 
                JOIN user u ON bl.id_user = u.idUser  ORDER BY bl.ngaybinhluan DESC";

        return $this->result1(0,$sql);
    }

    function getTotal($search = '') {
        $sql = "SELECT COUNT(*) as total 
                FROM binhluan bl 
                JOIN product p ON bl.id_product = p.id 
                JOIN user u ON bl.id_user = u.idUser";
        
        $params = [];
        // if ($search) {
        //     $sql .= " WHERE p.name LIKE ? OR u.name LIKE ? OR bl.noidung LIKE ?";
        //     $searchPattern = "%{$search}%";
        //     $params = [$searchPattern, $searchPattern, $searchPattern];
        // }
        
        $result = $this->result1(0,$sql);
        return $result[0]['total'];
    }

    function getById($id) {
        $sql = "SELECT *, u.name as user_name, p.name as product_name, bl.id as binhluan_id
                FROM binhluan bl 
                JOIN product p ON bl.id_product = p.id 
                JOIN user u ON bl.id_user = u.idUser  
                WHERE bl.id = ?";
        $result = $this->result1(1,$sql,$id);
        return $result;
    }

    function updateStatus($id, $status) {
        $sql = "UPDATE binhluan SET trangthai = ? WHERE id = ?";
        return $this->exec1($sql, $status, $id);
    }

    function getByProduct($productId) {
        $sql = "SELECT bl.*, u.name as user_name 
                FROM binhluan bl 
                JOIN user u ON bl.id_user = u.idUser 
                WHERE bl.id_product = ? AND bl.trangthai = 1 
                ORDER BY bl.ngaybinhluan DESC";
        return $this->result1($sql, $productId);
    }

    function add($data) {
        $sql = "INSERT INTO binhluan (id_product, id_user, noidung, rating) 
                VALUES (?, ?, ?, ?)";
        return $this->exec1($sql, [
            $data['id_product'],
            $data['id_user'],
            $data['noidung'],
            $data['rating']
        ]);
    }

    function update($id, $data) {
        $sql = "UPDATE binhluan 
                SET noidung = ?, rating = ?, trangthai = ? 
                WHERE id = ?";
        return $this->exec1($sql, [
            $data['noidung'],
            $data['rating'],
            $data['trangthai'],
            $id
        ]);
    }

    function delete($id) {
        $sql = "DELETE FROM binhluan WHERE id = ?";
        return $this->exec1($sql, $id);
    }

    function getAverageRating($productId) {
        $sql = "SELECT AVG(rating) as avg_rating, COUNT(*) as total_reviews 
                FROM binhluan 
                WHERE id_product = ? AND trangthai = 1";
        return $this->db->query($sql, [$productId])[0];
    }
}
