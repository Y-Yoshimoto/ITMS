//入力した数字の送受信
$(function(){
    $('#loginAPICall').click(function() {
        //多重送信防止//ボタンの無効化
        var button = $(this);
        button.attr("disabled", true);
        //　JSON形式に変形
        var sed_data ={
            'userID': String($("#inputUserID").val()),
            'password': String($("#inputPassword").val()),
            }
        console.log("コンソール");
        console.log(sed_data)
        // Ajax通信
        $.post({//POST形式
            url:"./loginAPI.php",    //URL
            data: sed_data,   //送信JSONデータ
            dataType: "json",                //受信データ
        }).done(function(rcv_data){
                // 受信データ処理
                console.log(rcv_data);
                var statusCode = rcv_data.statusCode;
                if (statusCode=="0") {
                    $("#message1").text("ユーザー名とパスワードを認証しました");
                    location.href='../Dashboard/';
                }else{
                    $("#message1").text("ユーザー名とパスワードを確認して下さい");
                }

                console.log("END");

        }).fail(function(rcv_data, textStatus, errorThrown){
                // エラー処理
                console.log(rcv_data);
                $("#message1").text("サポートへご連絡ください。");
                //alert(errorThrown);
        }).always(function(){
        //ボタンの再有効化
            button.attr("disabled", false);
        })
    })
});
