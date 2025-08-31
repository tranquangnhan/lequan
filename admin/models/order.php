<?php
 class Model_order extends Model_db{
    function getAllBill()
    {
        $sql = "SELECT * FROM donhang ORDER BY id DESC";
        return $this->result1(0,$sql);
    }
    function getProDetail($id)
    {
        $sql = "SELECT * FROM donhangchitiet WHERE donhang_id = ?";
        return $this->result1(0,$sql,$id);
    }
    function getInfoDetail($id)
    {
        $sql = "SELECT * FROM donhang WHERE id = ?";
        return $this->result1(1,$sql,$id);
    }
    function updataStatus($iddh){
        $sql = "UPDATE donhang SET status=1 WHERE id = ?";
        return $this->exec1($sql,$iddh);
    }
    function getBillDetail($id)
    {
        $sql = "SELECT * FROM donhang WHERE id = ?";
        return $this->result1(1,$sql,$id);
    }
    function editBIllDetail($name,$email,$dienthoai,$diachi,$ghichucuakhach,$ghichucuaadmin,$thoidiemgiaohang,$thoidiemdathang,$trangthai,$anhien,$id)
    {
        $sql ="UPDATE donhang SET TenNguoiNhan = ?,EmailNguoiNhan=?,dienthoai=?,DiaChiNguoiNhan=?,GhiChuCuaKhach=?,GhiChuCuaAdmin=?,ThoiDiemGiaoHang=?,ThoiDiemDatHang=?,TrangThai=?,AnHien=? WHERE id=?";
        return $this->exec1($sql,$name,$email,$dienthoai,$diachi,$ghichucuakhach,$ghichucuaadmin,$thoidiemgiaohang,$thoidiemdathang,$trangthai,$anhien,$id);
    }
    function del($id){
        $sql ="DELETE FROM donhang WHERE id = ?";
        return $this->exec1($sql,$id);
    }
    function CheckChildCate(){
        $sql = "SELECT * FROM catalog ";
        return $this->result1(0,$sql);
    }
    function getCateFromId($id)
   {
    $sql ="SELECT * FROM catalog WHERE id = ?";
    return  $this->result1(1,$sql,$id);
   }
   function GetProductListCosan($id,$slug){
    $par = $this->getCateFromId($id);
    $hangcosan = $par['hangcosan'];
    $sql ="SELECT * from product where cosan=? and Brand=?
    ";
   
    return $this->result1(0,$sql,$hangcosan,$slug);
  }
    function CheckChildHasPro($idcatalog){
        $sql = "SELECT * FROM product where catalog_id=?";
        $par = $this->getCateFromId($idcatalog);
        if($par['parent'] != 2){
            $idcatalog = $par['parent'];
            $sql .= " AND cosan=?";
            $id = $par['hangcosan'];
            
         

            $kq = $this->result1(0,$sql,$idcatalog,$id);
        }else{
            $idcatalog = $par['id'];
           

            $kq = $this->result1(0,$sql,$idcatalog);
        }
        return $kq;
        //  $row->rowCount();
    }
    
}