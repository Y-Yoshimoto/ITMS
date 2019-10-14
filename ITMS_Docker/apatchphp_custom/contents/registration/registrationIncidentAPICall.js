//入力したインシデント情報の送信
$(function(){
    $('#registrationIncidentAPICall').click(function() {
        //多重送信防止//ボタンの無効化
        var button = $(this);
        button.attr("disabled", true);
        //JSON形式に変形
        var sed_data ={
            'incidentName': String($("#incidentName").val()),
            'servce': String($("#servce").val()),
            'severity': Number($("#severity").val()),
            'brief': String($("#brief").val()),
            'handling': String($("#handling").val()),
            'remark': String($("#remark").val())
            }
        console.log("コンソール");
        console.log(sed_data)
        // Ajax通信
        $.post({//POST形式
            url:"./registrationIncidentAPI.php",    //URL
            data: sed_data,   //送信JSONデータ
            dataType: "json",                //受信データ
        }).done(function(rcv_data){
                // 受信データ処理
                console.log(rcv_data);
                var statusCode = rcv_data.statusCode;
                if (statusCode=="0") {
                    $('.SysMessage').css('color','#5CB85C');
                    $("#SysMessage").text("登録しました。ダッシュボードに戻ります。");
                    setTimeout(function(){
                    location.href='../Dashboard/';},600);
                }else{
                    $('.SysMessage').css('color','#D9534F');
                    $("#SysMessage").text("入力内容を確認して下さい。");
                }
                console.log("END");

        }).fail(function(rcv_data, textStatus, errorThrown){
                // エラー処理
                console.log(rcv_data);
                $('.SysMessage').css('color','#D9534F');
                $("#SysMessage").text("入力内容を確認して下さい。");
                //alert(errorThrown);
        }).always(function(){
        //ボタンの再有効化
            button.attr("disabled", false);
        })
    })
});
