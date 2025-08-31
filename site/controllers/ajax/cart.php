<?php
session_start();
switch ($_POST['action']) {
    case 'updateQtt':
        $array = array();

        $idsp = explode(',', $_POST['idsp']);

        $quantity = explode(',', $_POST['quantity']);

        $array['data'] = [];


        for ($i=0; $i < count($_SESSION['cart']); $i++) { 
            for ($j=0; $j < count($idsp); $j++) { 
                if($_SESSION['cart'][$i][0] ==$idsp[$j]){
                    $_SESSION['cart'][$i][1] = $quantity[$j];
                }
            }
        
        }
        $array['statusCode'] = 1;

        $array['data'] = $_SESSION['cart'];

        echo json_encode($array);

        break;
    case 'del':
        $array = array();
        array_splice($_SESSION['cart'],$_POST['id'],1);
        $array['data'] = $_SESSION['cart'];
        echo json_encode($array);
        break;
}

?>