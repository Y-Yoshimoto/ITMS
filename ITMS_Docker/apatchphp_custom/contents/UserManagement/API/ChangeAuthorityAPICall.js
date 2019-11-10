//権限変更
$(function(){
    $('#ChangeAuthority').click(function() {
        //多重送信防止//ボタンの無効化
        var button = $(this);
        button.attr("disabled", true);
        //　JSON形式に変形
        var sed_data ={
            'userID': String($("#ChangeUserID").val()),
            'authority': String($("#newAuthority").val())
            }
        console.log("POST: ChangeAuthority");
        console.log(sed_data)
        // Ajax通信
        $.post({//POST形式
            url:"./API/ChangeAuthorityAPI.php",    //URL
            data: sed_data,   //送信JSONデータ
            dataType: "json",                //受信データ
        }).done(function(rcv_data){
                // 受信データ処理
                console.log(rcv_data);
                var statusCode = rcv_data.statusCode;
                if (statusCode=="0") {
                    $("#ChangeAuthority_Message").text("変更完了");
                    //リスト再読み込み
                    $("#UserLiset_th").empty();
                    getUserList();
                }else{
                    $("#ChangeAuthority_Message").text("エラー発生");
                }
                console.log("END: ChangeAuthority");
        }).fail(function(rcv_data, textStatus, errorThrown){
                // エラー処理
                console.log(rcv_data);
                $("#ChangeAuthority_Message").text("エラー発生");
                //alert(errorThrown);
        }).always(function(){
        //ボタンの再有効化
            button.attr("disabled", false);
        })
    })
});
