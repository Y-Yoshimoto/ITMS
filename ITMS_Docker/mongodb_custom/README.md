# MongoDB

## 接続
mongoコマンドでローカルのDBへ接続
    mongo admin -u root -p
        // mongo

## 基本操作例
    use alertlist;   //DB接続,作成
    db.stats();      //状態確認
    show collections; //コレクション確認
    //テストデータ追加
    db.alert.insert({servce:'情報基盤', severity:2, alertName:'Nginx停止', alertBrief:'Nginxリバプロ停止',alertTime:'2019-10-02 22:25:25',incidentNumber:'0'});
    db.alert.insert({servce:'情報基盤', severity:3, alertName:'サーバ停止', alertBrief:'OSがハングアップし停止',alertTime:'2019-10-02 22:25:23',incidentNumber:'0'});
    db.alert.insert({servce:'情報基盤', severity:5, alertName:'DC全壊', alertBrief:'DCが全壊しサーバ全損',alertTime:'2019-10-12 22:20:23',incidentNumber:'0'});
    //コレクションデータ一覧参照
    db.alert.find();
    //条件指定
    db.alert.find({severity: {$eq: 5}});
    //値更新
    db.alert.update({"alertName": "サーバ停止"}, {$set: {"alertName": "OS停止"}});
    //値更新 条件指定(条件, 更新, upsert(条件に一致するものが無い場合に挿入), multi(一致する全てのドキュメントを更新))
    db.alert.update({severity: {$eq: 5}},{$set: {servce: '全基盤'}},{upsert: false, multi: true});

    //コレクション削除
    db.alert.drop();

## 参考
[MongoDB公式ドキュメント](https://docs.mongodb.com/manual/mongo/)
