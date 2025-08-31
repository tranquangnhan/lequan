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
            if (response.statusCode == 1) {

                var data = response.data;
                var totalmoney = $(".totalmoney");
                var subtotolbill = 0;
                var totalbill = 0;

                for (let i = 0; i < data.length; i++) {
                    subtotolbill += data[i]['Gia'] * data[i]['Amount'];
                    totalmoney[i].innerHTML = forMatTien(data[i]['Gia'] * data[i]['Amount']);
                }
                totalbill = subtotolbill + 30000;
                console.log(response)
                $("#subtotal").html(forMatTien(subtotolbill));

                if (response.discount) {
                    $("#totalbill").html(forMatTien(totalbill - (totalbill / 100 * response.discount)));
                } else {
                    $("#totalbill").html(forMatTien(totalbill));
                }

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
$("#addcoupon").click(async function() {
    let formData = new FormData();
    var couponCode = $("#coupon").val();

    formData.append('action', 'addCoupon');
    formData.append('couponCode', couponCode);

    let Loading = Swal.fire({
        allowEscapeKey: false,
        title: 'Đang kiểm tra',
        allowOutsideClick: false,
        showConfirmButton: false,
        text: 'Vui lòng chờ trong giây lát...',
        imageUrl: 'views/assets/img/Default/Loading.gif',
    });

    await $.ajax({
        type: "POST",
        url: "controllers/ajax/cart.php",
        contentType: false,
        processData: false,
        dataType: 'JSON',
        data: formData,
        success: function(response) {
            Loading.close();
            if (response.statusCode == 1) {
                Swal.fire({
                    icon: 'success',
                    title: 'Thành công.',
                    text: 'Thêm mã giảm giá thành công.',
                    showConfirmButton: 'ok',
                    showCancelButton: false,
                }).then((result) => {
                    location.reload();
                });
            } else {
                let SwalText = "";
                if (response.message) {
                    SwalText = response.message;
                } else SwalText = 'Có lỗi xảy ra trong quá trình xử lý dữ liệu. Vui lòng thử lại sau.';

                Swal.fire({
                    type: 'error',
                    title: 'Oops...',
                    text: SwalText,
                    showConfirmButton: false,
                    showCancelButton: false,
                    icon: 'error',
                });
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
})
$("#delcart").click(function() {
    Swal.fire({
        title: 'Xoá giỏ hàng?',
        text: "Bạn có chắc xoá giỏ hàng không!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Vâng, Xoá',
        cancelButtonText: 'Huỷ',
    }).then((result) => {
        if (result.isConfirmed) {
            let formData = new FormData();
            formData.append('action', 'delCart');
            $.ajax({
                type: "POST",
                url: "controllers/ajax/cart.php",
                contentType: false,
                processData: false,
                dataType: 'JSON',
                data: formData,
                success: function(response) {
                    if (response.statusCode == 1) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Thành công.',
                            text: 'Xoá giỏ hàng thành công.',
                            showConfirmButton: 'ok',
                            showCancelButton: false,
                        }).then((result) => {
                            location.reload();
                        });
                    }
                },
                error: function() {
                    Swal.fire({
                        timer: 3000,
                        type: 'error',
                        title: 'Có lỗi xảy ra trong quá trình xử lý dữ liệu. Vui lòng thử lại sau.',
                        showConfirmButton: false,
                        showCancelButton: false,
                    });
                }
            });
        }
    })
})

async function addCart(idsp) {
    var quantity = $("#qty").val();
    let formData = new FormData();

    formData.append('action', 'addCart');
    formData.append('idsp', idsp);
    formData.append('quantity', quantity);

    await $.ajax({
        type: "POST",
        url: "controllers/ajax/cart.php",
        contentType: false,
        processData: false,
        dataType: 'JSON',
        data: formData,
        success: function(response) {
            if (response.statusCode == 1) {
                window.location.href = '/asmphp2/gio-hang';
            }
        },
        error: function() {
            Swal.fire({
                timer: 3000,
                type: 'error',
                title: 'Có lỗi xảy ra trong quá trình xử lý dữ liệu. Vui lòng thử lại sau.',
                showConfirmButton: false,
                showCancelButton: false,
            });
        }
    });

}