//インシデント情報
$(function () {
    $('#getincidentData').click(function () {
        //多重送信防止//ボタンの無効化
        var button = $(this);
        button.attr("disabled", true);
        //　JSON形式に変形
        var sed_data = {
            'incidentNumber': "2"
            //'incidentNumber': iNUmber
        }
        console.log(sed_data)
        // Ajax通信
        $.post({//POST形式
            url: "../Dashboard/incidentInfoAPI.php",    //URL
            data: sed_data,   //送信JSONデータ
            dataType: "json",                //受信データ
        }).done(function (rcv_data) {
            // 受信データ処理
            console.log(rcv_data);
            //setTimeout(function(){console.log(rcv_data.incidentName);},10000);
            //画面表示
            $("#incidentNumber").val(rcv_data.incidentNumber);
            $("#incidentName").text(rcv_data.incidentName);
            $("#servce").text(rcv_data.servce);
            $("#severity").val(rcv_data.severity);
            $("#brief").text(rcv_data.brief);
            $("#handling").text(rcv_data.handling);
            $("#remark").text(rcv_data.remark);
            $("#recodeTime").text(rcv_data.recodeTime);
            $("#updateTime").text(rcv_data.updateTime);

            //色指定
            let sInfo = severityInfo(rcv_data.severity);
            $('.selected').css('background-color', sInfo[0]);
            $('.selected').css('color', sInfo[2]);

            console.log("END");
        }).fail(function (rcv_data, textStatus, errorThrown) {
            // エラー処理
            console.log(rcv_data);
            $('.SysMessage').css('color', '#D9534F');
            $("#SysMessage").text("サポートへご連絡ください。");
            //alert(errorThrown);
        }).always(function () {
            //ボタンの再有効化
            button.attr("disabled", false);
        })
    });
});
//緊急度判定['背景色','テキスト','文字色']
function severityInfo(severity) {
    switch (Number(severity)) {
        case 1:
            return ['#56C0E0', '情報', '#373A3C'];
        case 2:
            return ['#FFEC86', '警告', '#373A3C'];
        case 3:
            return ['#EE9800', '軽障害', '#373A3C'];
        case 4:
            return ['#D9534F', '重障害', '#FDFDFD'];
        case 5:
            return ['#CB2E25', '致命的', '#FDFDFD'];
    }
};