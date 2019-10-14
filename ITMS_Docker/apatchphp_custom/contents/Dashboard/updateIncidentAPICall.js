//入力したインシデント情報の送信
$(function(){
    $('#updateIncidentAPICall').click(function() {
        //多重送信防止//ボタンの無効化
        var button = $(this);
        button.attr("disabled", true);
        //JSON形式に変形
        var sed_data ={
            'incidentNumber': Number($("#incidentNumberModal").val()),
            'incidentName': String($("#incidentNameModal").val()),
            'servce': String($("#servceModal").val()),
            'severity': Number($("#severityModal").val()),
            'brief': String($("#briefModal").val()),
            'handling': String($("#handlingModal").val()),
            'remark': String($("#remarkModal").val()),
            'remark': String($("#remarkModal").val())
            }
        console.log("コンソール");
        console.log(sed_data)
        // Ajax通信
        $.post({//POST形式
            url:"./updateIncidentAPI.php",    //URL
            data: sed_data,   //送信JSONデータ
            dataType: "json",                //受信データ
        }).done(function(rcv_data){
                // 受信データ処理
                console.log(rcv_data);
                var statusCode = rcv_data.statusCode;
                if (statusCode=="0") {
                    $("#message1").text("インシデント情報を登録しました。ダッシュボードに戻ります。");
                    setTimeout(function(){
                    location.href='../Dashboard/';},1500);
                }else{
                    $("#message1").text("入力内容を確認して下さい。");
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
