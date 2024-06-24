//パスワード更新
$(function(){
    $('#ChangePassword').click(function() {
        //多重送信防止//ボタンの無効化
        var button = $(this);
        button.attr("disabled", true);
        //パスワード比較
        var newPa = String($("#newPassword").val());
        var RenewPa = String($("#RenewPassword").val());
        if (String($("#newPassword").val()) != String($("#RenewPassword").val())) {
            $("#ChangePassword_Message").text("不一致");
            button.attr("disabled", false);
            //return;
        }
        //　JSON形式に変形
        var sed_data ={
            'userID': String($("#newddPassword").val()),
            'password': String($("#newPassword").val())
            }
        console.log("POST: DellteUser");
        console.log(sed_data)
        // Ajax通信
        $.post({//POST形式
            url:"./API/ChangePasswordAPI.php",    //URL
            data: sed_data,   //送信JSONデータ
            dataType: "json",                //受信データ
        }).done(function(rcv_data){
                // 受信データ処理
                console.log(rcv_data);
                var statusCode = rcv_data.statusCode;
                if (statusCode==0) {
                    $("#DellteUser_Message").text("更新完了");
                    //リスト再読み込み
                    $("#UserLiset_th").empty();
                    getUserList();
                }else{
                    $("#ChangePassword_Message").text("エラー発生");
                }
                console.log("END:ChangePassword");
        }).fail(function(rcv_data, textStatus, errorThrown){
                // エラー処理
                console.log(rcv_data);
                $("#ChangePassword_Message").text("エラー発生");
                //alert(errorThrown);
        }).always(function(){
        //ボタンの再有効化
            button.attr("disabled", false);
        })
    })
});
