layui.use(['element', 'form', 'layer'], function () {
    let layer = layui.layer;
    let element = layui.element;
    let form = layui.form;

    form.on('submit(btn1)', function (data) {
        console.log(data.field, '最终的提交信息')
        data = data.field;
        let url = '';
        // // layObj.post(url,data,function (res) {
        // //
        // // });
        $.ajax({
            type: 'POST',
            data: data,
            url: '/admin/add/addbook',
            success: (res) => {
                if (res.status == 1){
                    layer.msg('新增成功',function (){
                        window.location='{:url("admin/add")}';
                    });
                } else{
                    layer.msg(res.message);
                    return false;

                }
                setTimeout('window.location.reload()',1000);
            }
        })

        return false;
    });

});


$(document).ready(function () {

    //查找所有图书种类，并给select选择框赋值
    findAllBookCategory();

});

function findAllBookCategory() {
    $.ajax({
        async: false,
        type: "post",
        url: "/admin/index/showAllCategory",
        dataType: "json",
        success: function (data) {
            console.log(data);
            $("select[name='bookCategory']").empty();
            $("select[name='bookCategory']").append('<option value="">——请选择——</option>');
            for (let i = 0; i < data.length; i++) {
                let html = '<option value="' + data[i].category_id + '">';
                html += data[i].category_name + '</option>';
                $("select[name='bookCategory']").append(html);
            }
        },
        error: function (data) {
            alert(data.result);
        }
    });
};













