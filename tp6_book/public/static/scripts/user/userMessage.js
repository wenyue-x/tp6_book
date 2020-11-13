layui.use(['form', 'element','layer'], function () {
    let form = layui.form;
    let element = layui.element;
    let layer = layui.layer;
});

$('#modify-user').on('click', function () {

    //页面层
    layer.open({
        type: 1 //Page层类型
        , skin: 'layui-layer-molv'
        , area: ['380px', '270px']
        , title: ['修改信息', 'font-size:18px']
        , btn: ['保存', '取消']
        , shadeClose: true
        , shade: 0 //遮罩透明度
        , content: $("#window")
        , yes: function () {
            updateUser();
        }
    });
});

function updateUser() {
    $.ajax({

        async: false,
        type: 'post',
        url: '/user/user/update',
        data: $('#updateUserForm').serialize(),
        success: (res) => {
            if(res.status == 1){
                layer.alert('修 改 成 功', {icon: 1}, function () {
                    location.reload();
                });
            }else{
                layer.msg(res.message, {icon: 7, time: 2000});
            }
        },
        error: function (data) {
            layer.alert("修改失败");
        }
    });
};