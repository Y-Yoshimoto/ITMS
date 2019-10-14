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
        //画面表示
	    $("#incidentNameModal").text(rcv_data.incidentName);
            $("#servceModal").text(rcv_data.servce);
            $("#severityModal").val(rcv_data.severity);
            $("#briefModal").text(rcv_data.brief);
            $("#handlingModal").text(rcv_data.handling);
            $("#remarkModal").text(rcv_data.remark);
            $("#recodeTimeModal").text(rcv_data.recodeTime);
            $("#updateTimeModal").text(rcv_data.updateTime);

            //色指定
            let sInfo = severityInfo(rcv_data.severity);
            $('.modal-content').css('border-color',sInfo[0]);
            $('.selected').css('background-color',sInfo[0]);
            $('.selected').css('color',sInfo[2]);

            console.log("END");
    }).fail(function(rcv_data, textStatus, errorThrown){
            // エラー処理
            console.log(rcv_data);
            $("#ErrorMessage").text("サポートへご連絡ください。");
            //alert(errorThrown);
    }).always(function(){
    //ボタンの再有効化
        button.attr("disabled", false);
    })
});

$(function(){
    $('.colorSelect').bind('change', function(){
        let sInfo = severityInfo($(this).val());
        $('.modal-content').css('border-color',sInfo[0]);
        $('.selected').css('background-color',sInfo[0]);
        $('.selected').css('color',sInfo[2]);
    });
});
