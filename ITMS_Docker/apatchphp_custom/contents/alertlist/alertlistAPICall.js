//ユーザリスト取得
$(function () {
    getAlertList();
})

function getAlertList() {
    $(function () {
        $.get({//get形式
            url: "./alertListAPI.php",    //URL
            dataType: "json",                //受信データ
        }).done(function (rcv_data) {
            // 受信データ処理
            console.log("GET:alertListAPI");
            console.log(rcv_data);
            var AlertListSet = rcv_data[0];
            var AlertListUnset = rcv_data[1];
            //割当済みインシデント
            for (let i of AlertListSet) {
                //console.log(i);
                var row = makeSetAlertRow(i);
                //表データ追加
                $("#setAlertList_th").append(row);
            }
            //未割当インシデント
            for (let i of AlertListUnset) {
                //console.log(i);
                var row = makeUnsetAlertRow(i);
                //表データ追加
                $("#unsetAlertList_th").append(row);
            }

            //更新時刻表示
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
function makeSetAlertRow(AlertRow) {
    var row1 = '<tr>'
    var row2 = '<th scope="row">' + AlertRow['eventID']  +'</th><td>' + AlertRow['servce'] + '</th><td>' + AlertRow['alertName'] + '</td><td>' + AlertRow['Hostname'] + '</td><td>' + AlertRow['alertTime'] + '</td><td>';
    var row3 = '<button class="ResetINumber btn-light btn-sm btn-outline-secondary" value="'+ AlertRow['_id']['$oid'] +'">' +'解除' + '</button></td></tr>';
    return row1 + row2 + row3;
}
function makeUnsetAlertRow(AlertRow) {
    var row1 = '<tr>'
    var row2 = '<th scope="row">' + AlertRow['eventID']  +'</th><td>' + AlertRow['servce'] + '</th><td>' + AlertRow['alertName'] + '</td><td>' + AlertRow['Hostname'] + '</td><td>' + AlertRow['alertTime'] + '</td><td>';
    var row3 = '<button class="SetINumber btn-light btn-sm btn-outline-secondary" value="'+ AlertRow['_id']['$oid'] +'">' +'紐付け' + '</button></td></tr>';
    return row1 + row2 + row3;
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
