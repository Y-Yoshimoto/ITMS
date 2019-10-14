//モーダルデータ生成
$('#myModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var modal = $(this);
    var recipient = button.data('recipient');
    console.log("モーダル");
    var iNUmber = button.data('recipient');

    button.attr("disabled", true);
    //　JSON形式に変形
    var sed_data ={
        'incidentNumber': iNUmber,
        }
    console.log(sed_data)
    // Ajax通信
    $.post({//POST形式
        url:"./incidentInfoAPI.php",    //URL
        data: sed_data,   //送信JSONデータ
        dataType: "json",                //受信データ
    }).done(function(rcv_data){
            // 受信データ処理
            console.log(rcv_data);
	    //setTimeout(function(){console.log(rcv_data.incidentName);},10000);
	    $("#massage1").text(rcv_data.incidentName);
            $("#message2").text(rcv_data.servce);
            $("#message3").text(rcv_data.severity);
            $("#message4").text(rcv_data.brief);
            $("#message5").text(rcv_data.handling);
            $("#message6").text(rcv_data.remark);
            $("#message7").text(rcv_data.recodeTime);
            $("#message8").text(rcv_data.updateTime);
            console.log("END");
    }).fail(function(rcv_data, textStatus, errorThrown){
            // エラー処理
            console.log(rcv_data);
            $("#message9").text("サポートへご連絡ください。");
            //alert(errorThrown);
    }).always(function(){
    //ボタンの再有効化
        button.attr("disabled", false);
    })
});
