layui.use(['form', 'element','layer'], function () {
    let form = layui.form;
    let element = layui.element;
    let layer = layui.layer;
});

$(document).ready(function () {
    $("#btn1").click(function () {
        let bookId = $("#bookId").val().toString().trim();

        if (bookId === null || bookId === '' || isNaN(bookId)) {
            layer.alert("请正确输入书籍编号");
            return false;
        }

        returnBook(bookId);

    });
});

function returnBook(bookId) {
    $.ajax({
        async: false,
        type: "post",
        url: "/user/restore/returnBook",
        dataType: "json",
        data: {bookId: bookId},
        success: (res) => {

            if (res.status == "1") {
                layer.msg('还书成功!!', {icon: 6, time: 2000});
                $("#bookId").val('');
            } else {
                layer.msg(res.message, {icon: 7, time: 2000});
                $("#bookId").val('');
            }

        },
        error: function (data) {
            alert(data.result);
        }
    });
};