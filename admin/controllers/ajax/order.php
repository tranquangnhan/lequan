<?php 
    require_once "../../../system/config.php";
    require_once "../../../system/database.php";
    require_once "../../models/order.php";
    $model = new Model_order;
    session_start();
    switch ($_POST['Action']) {
        case 'updateStatus':
            $array = array();

            $array['StatusCode'] = (int)((($model->updataStatus($_POST['iddh']))=== true) ? 0 : 1);            
            echo json_encode($array);
            break;

        case 'CheckChildCate':
            $array =  [];
           $kq = $model->CheckChildCate();
           if($_POST['style'] == 0){
            $kq1 = ($model->CheckChildHasPro($_POST['IDcate']));
            $kq1 = count($kq1);
           }else{
            $kq1 = ($model->GetProductListCosan($_POST['IDcate'],$_POST['slug']));
            $kq1 = count($kq1);
           }
           
           if($kq1 > 0) $array[0] = 1; else $array[0] = 0;
            foreach ($kq as $key) {
                if($_POST['IDcate'] == $key['parent']){
                    $array[0] = 2;
                    break;
                }
            }
            echo json_encode($array);
            
            break;
        default:
            # code...
            break;
    }
?>