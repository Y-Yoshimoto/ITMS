//ユーザリスト取得
$(function(){
    getUserList();
})

function getUserList() {
$(function(){
    $.get({//POST形式
        url:"./userListAPI.php",    //URL
        dataType: "json",                //受信データ
    }).done(function(rcv_data){
            // 受信データ処理
            console.log("GET:userListAPI");
            console.log(rcv_data);
            for(let i of rcv_data){
                //console.log(i);
                var row = makeUserRow(i);
                //表データ追加
                $("#UserLiset_th").append(row);
            }
            $("#getListMessage").text('更新: ' + GetDate());
            console.log(GetDate());
            console.log("END:userListAPI");
    }).fail(function(rcv_data, textStatus, errorThrown){
            // エラー処理
            console.log(rcv_data);
            $("#getListMessage").text("サポートへご連絡ください。");
            //alert(errorThrown);
            console.log("ERROR");
    }).always(function(){
    })
})
}

function makeUserRow(UserRow){
    //console.log(UserRow);
    //権限表記変更
    var Authority = AuthoritySet(UserRow['Authority']);
    //List要素生成
    var row = '<tr><th scope="row">'+ UserRow['userNumber'] +'</th><td>'+ UserRow['userid'] +'</td><td>'+Authority+'</td></tr>';
    console.log(row);
    return row;
}
//権限表記変更
function AuthoritySet(Authority){
switch (Number(Authority)){
    case 1:
        return '管理者';
    case 2:
        return '一般ユーザ';
    }
}

function GetDate(){
    //現在時刻取得
    var date = new Date();
    return date.toLocaleString()
}
