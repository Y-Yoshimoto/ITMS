//パスワードリセット
$(function(){
    $('#ResetPassword').click(function() {
        //多重送信防止//ボタンの無効化
        var button = $(this);
        button.attr("disabled", true);
        //　JSON形式に変形
        var sed_data ={
            'userID': String($("#ResetUserID").val())
            }
        console.log("POST: ResetUserID");
        console.log(sed_data)
        // Ajax通信
        $.post({//POST形式
            url:"./API/ResetPasswordAPI.php",    //URL
            data: sed_data,   //送信JSONデータ
            dataType: "json",                //受信データ
        }).done(function(rcv_data){
                // 受信データ処理
                console.log(rcv_data);
                var statusCode = rcv_data.statusCode;
                if (statusCode=="0") {
                    $("#ResetPassword_Message").text("リセット完了");
                    //リスト再読み込み
                    $("#UserLiset_th").empty();
                    getUserList();
                }else{
                    $("#ResetPassword_Message").text("エラー発生");
                }
                console.log("END:ResetUserID");
        }).fail(function(rcv_data, textStatus, errorThrown){
                // エラー処理
                console.log(rcv_data);
                $("#ResetPassword_Message").text("エラー発生");
                //alert(errorThrown);
        }).always(function(){
        //ボタンの再有効化
            button.attr("disabled", false);
        })
    })
});
