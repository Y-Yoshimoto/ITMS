//ユーザリスト取得
$(function () {
    getAlertList();
})

function getAlertList() {
    $(function () {
        $.get({//POST形式
            url: "./alertListAPI.php",    //URL
            dataType: "json",                //受信データ
        }).done(function (rcv_data) {
            // 受信データ処理
            console.log("GET:alertListAPI");
            console.log(rcv_data);
            for (let i of rcv_data) {
                //console.log(i);
                var row = makeAlertRow(i);
                //表データ追加
                $("#alertlist_th").append(row);
            }
            $("#getListMessage").text('更新: ' + GetDate());
            console.log(GetDate());
            console.log("END:alertListAPI");
        }).fail(function (rcv_data, textStatus, errorThrown) {
            // エラー処理
            console.log(rcv_data);
            $("#getListMessage").text("サポートへご連絡ください。");
            //alert(errorThrown);
            console.log("ERROR");
        }).always(function () {
        })
    })
}

function makeAlertRow(AlertRow) {
    //console.log(AlertRow);
    //権限表記変更
    //var Authority = AuthoritySet(AlertRow['Authority']);
    //List要素生成
    var row1 = '<tr id="' + AlertRow['_id']['$oid'] + '">'
    var row2 = '<th scope="row">' + AlertRow['servce'] + '</th><td>' + AlertRow['alertName'] + '</td><td>' + AlertRow['Hostname'] + '</td><td>' + AlertRow['alertTime'] + '</td><td>' + AlertRow['incidentNumber'] + '</td></tr>';
    //console.log(row1 + row2);
    return row1 + row2;
}
//権限表記変更
function AuthoritySet(Authority) {
    switch (Number(Authority)) {
        case 1:
            return '管理者';
        case 2:
            return '一般ユーザ';
    }
}

function GetDate() {
    //現在時刻取得
    var date = new Date();
    return date.toLocaleString()
}
