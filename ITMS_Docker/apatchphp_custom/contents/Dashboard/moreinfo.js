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
            var statusCode = rcv_data.statusCode;
            if (statusCode=="0") {
                $("#message1").text("情報を取得しました。");
                location.href='../Dashboard/';
            }else{
                $("#message1").text("再確認して下さい");
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
    //modal.find('.modal-title').text(recipient + 'へのメッセージ');
    $("#message2").text('ID:' + iNUmber);
});
