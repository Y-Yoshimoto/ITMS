//$set = ['<div class="card shadow-sm"><div class="card-header"><h4 class="my-0 font-weight-normal">重度</h4></div><div class="card-body"><h5 class="card-title pricing-card-title">インシデント名</h5>概要<ul class="list-unstyled mt-3 mb-4"><li>更新: 2019-10-19</li><li>登録: 2019-10-19</li></ul></div><button class="btn btn-light card-footer text-muted" type="button">詳細/更新</button></div>']

console.log("コンソール");
$(function(){
    var sed_data ={
        'userID': "1",
        }
    $.post({//POST形式
        url:"./incidentListAPI.php",    //URL
        data: sed_data,   //送信JSONデータ
        dataType: "json",                //受信データ
    }).done(function(rcv_data){
            // 受信データ処理
            console.log(rcv_data);
            for(let i of rcv_data){
                console.log(i);
                //console.log(i['incidentNumber']);
                var card = incidentCard(i['incidentNumber'], i['servce'], i['severity'], i['incidentName'], i['brief'], i['recodeTime'],i['updateTime']);
                $("#incidentCard").append(card);
                //console.log(card);
            }
            console.log("END");
    }).fail(function(rcv_data, textStatus, errorThrown){
            // エラー処理
            console.log(rcv_data);
            $("#message1").text("サポートへご連絡ください。");
            //alert(errorThrown);
    }).always(function(){
    })


})
/////静的データ
//var card = incidentCard(1, '情報基盤', 2, 'Nginx停止', 'リバースプロキシ用のnginx.serviceが停止','2019-10-04 15:25:07','2019-10-05 18:25:22');
//console.log(card);
//$("#incidentCard").append(card);

//インシデントナンバー, サービス名, 緊急度,インシデント名, 概要, 登録時刻, 更新時刻
function incidentCard(incidentNumber, servce, severity, incidentName, brief, recodeTime, updateTime) {
    var cardSetting = '<div class="card shadow-sm">';
    let sInfo = severityInfo(severity);
    var cardHeader = '<div class="card-header" style="background-color :' + sInfo[0] + '"><h4 class="my-0 font-weight-normal">' + sInfo[1] + '</h4></div>';
    var cardBody = '<div class="card-body"><h5 class="card-title pricing-card-title">' + incidentName + '</h5>' + brief;
    var cardInfo = '<ul class="list-unstyled mt-3 mb-4"><li>' + servce + '</li><li>更新: ' + recodeTime + '</li><li>登録: '+ updateTime + '</li></ul></div>';
    var cardFooter = '<button class="btn btn-light card-footer text-muted" type="button">' +'詳細/更新' + '</button><div>';

    var incidentCardInfo = cardSetting + cardHeader + cardBody + cardInfo + cardFooter;
    return incidentCardInfo;
}
/*
<div id="incidentCard" class="card-deck text-left">
    <div class="card shadow-sm">
      <div class="card-header" style="background-color:#FF0000">
        <h4 class="my-0 font-weight-normal">重度</h4>
      </div>
      <div class="card-body">
        <h5 class="card-title pricing-card-title">インシデント名</h5>
       概要
        <ul class="list-unstyled mt-3 mb-4">
           <li>サービス名</li>
           <li>登録: 2019-10-19</li>
           <li>更新: 2019-10-19</li>
       </ul>
      </div>
      <button class="btn btn-light card-footer text-muted" type="button">
               詳細/更新
     　</button>
    </div>
*/
//緊急度判定
function severityInfo(severity){
    switch (Number(severity)){
        case 1:
            return ['#56C0E0','情報'];
        case 2:
            return ['#FFEC86','警告'];
        case 3:
            return ['#EE9800','軽障害'];
        case 4:
            return ['#D9534F','重障害'];
        case 5:
            return ['#CB2E25','致命的'];
        }
}
