$(function () {
        $('.SetINumber').click(function () {
            //多重送信防止//ボタンの無効化
            var button = $(this);
            button.attr("disabled", true);
            //　JSON形式に変形
            var sed_data = {
                'incidentNumber': "1"
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



                console.log("END");
            }).fail(function (rcv_data, textStatus, errorThrown) {
                // エラー処理
                console.log(rcv_data);
                $("#SysMessage").text("サポートへご連絡ください。");
                //alert(errorThrown);
            }).always(function () {
                //ボタンの再有効化
                button.attr("disabled", false);
            })
        });
    });
