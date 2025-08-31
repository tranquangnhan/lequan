function forMatTien(number) {
    return number.toLocaleString('vi-VN', {
        style: 'currency',
        currency: 'VND'
    })
}
$("#updatecart").click(async function(e) {
    e.preventDefault();
    let formData = new FormData();
    let idsp = $(".idsp");
    let quantity = $(".getquantity");
    let arrIdsp = [];
    let arrQuantity = [];

    let Loading = Swal.fire({
        allowEscapeKey: false,
        title: 'Đang kiểm tra',
        allowOutsideClick: false,
        showConfirmButton: false,
        text: 'Vui lòng chờ trong giây lát...',
        imageUrl: 'views/assets/img/Default/Loading.gif',
    });

    $.each(idsp, function(index, value) {
        arrIdsp.push(value.value);
    });
    $.each(quantity, function(index, value) {
        arrQuantity.push(value.value);
    });

    formData.append('idsp', arrIdsp);
    formData.append('quantity', arrQuantity);
    formData.append('action', 'updateQtt');

    await $.ajax({
        type: "POST",
        url: "controllers/ajax/cart.php",
        contentType: false,
        processData: false,
        dataType: 'JSON',
        data: formData,
        success: function(response) {
            Loading.close();
            console.log(response)
            if (response.statusCode == 1) {

                var data = response.data;
                var totalmoney = $(".totalmoney");
                var totalbill = 0;
                var quantity = 0;
                for (let i = 0; i < data.length; i++) {
                    totalbill += data[i][5] * data[i][1];
                    quantity += parseInt(data[i][1]);
                    totalmoney[i].innerHTML = forMatTien(data[i][5] * data[i][1]);
                }

                $("#total").html(forMatTien(totalbill));
                console.log($("#total"))
                console.log(forMatTien(totalbill))

                $("#quantity").html(quantity);
            }
        },
        error: function() {
            Loading.close();
            Swal.fire({
                timer: 3000,
                type: 'error',
                title: 'Có lỗi xảy ra trong quá trình xử lý dữ liệu. Vui lòng thử lại sau.',
                showConfirmButton: false,
                showCancelButton: false,
            });
        }
    });

});

function del(id) {

    var formData = new FormData();
    formData.append('id', id);
    formData.append('action', 'del');

    $.ajax({
        type: "POST",
        url: "controllers/ajax/cart.php",
        contentType: false,
        processData: false,
        dataType: 'JSON',
        data: formData,
        success: function(response) {
            location.reload();
        }
    });
}