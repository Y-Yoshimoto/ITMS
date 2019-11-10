//ログイン認証
$(function(){
    $('#AddUser').click(function() {
        //多重送信防止//ボタンの無効化
        var button = $(this);
        button.attr("disabled", true);
        //　JSON形式に変形
        var sed_data ={
            'userID': String($("#inputUserID").val()),
            'password': String($("#inputPassword").val()),
            'authority': String($("#inputAuthority").val()),
            }
        console.log("POST: AddUser");
        console.log(sed_data)
        // Ajax通信
        $.post({//POST形式
            url:"./API/AddUserAPI.php",    //URL
            data: sed_data,   //送信JSONデータ
            dataType: "json",                //受信データ
        }).done(function(rcv_data){
                // 受信データ処理
                console.log(rcv_data);
                var statusCode = rcv_data.statusCode;
                if (statusCode=="0") {
                    $("#AddUser_Message").text("登録完了");
                    //リスト再読み込み
                    $("#UserLiset_th").empty();
                    getUserList();
                }else{
                    $("#AddUser_Message").text("エラー発生");
                }
                console.log("END:AddUser");
        }).fail(function(rcv_data, textStatus, errorThrown){
                // エラー処理
                console.log(rcv_data);
                $("#AddUser_Message").text("エラー発生");
                //alert(errorThrown);
        }).always(function(){
        //ボタンの再有効化
            button.attr("disabled", false);
        })
    })
});
