//DB接続
db.adminCommand('alertlist')
db.alert.insert({servce:'情報基盤', severity:2, Hostname: 'HOST-RP-01',alertName:'Nginx停止', alertBrief:'Nginxリバプロ停止',alertTime:'2019-10-02 11:25:22',incidentNumber:'0'});
db.alert.insert({servce:'情報基盤', severity:2, Hostname: 'HOST-RP-01',alertName:'サーバ停止', alertBrief:'ping lost',alertTime:'2019-10-04 16:44:23',incidentNumber:'0'});
db.alert.insert({servce:'情報基盤', severity:4, Hostname: 'HOST-DB-01',alertName:'MySQL停止', alertBrief:'MySQLサービス停止',alertTime:'2019-10-12 22:25:25',incidentNumber:'0'});
db.alert.insert({servce:'情報基盤', severity:4, Hostname: 'HOST-DB-00',alertName:'フェイルオーバー発生', alertBrief:'DB2号機アクティブ',alertTime:'2019-10-12 22:25:30',incidentNumber:'0'});
db.alert.insert({servce:'情報基盤', severity:3, Hostname: 'HOST-AP-01',alertName:'CPU使用率上昇', alertBrief:'CPU使用率上昇90%',alertTime:'2019-10-15 04:22:12',incidentNumber:'0'});
db.alert.insert({servce:'情報基盤', severity:1, Hostname: 'HOST-AP-01',alertName:'CPU使用率復旧', alertBrief:'CPU使用率復旧2%',alertTime:'2019-10-15 04:23:12',incidentNumber:'0'});
db.alert.insert({servce:'情報基盤', severity:1, Hostname: 'HOST-RP-01',alertName:'サーバ証明書更新', alertBrief:'サーバ証明書期限ぎれアラート',alertTime:'2019-10-15 04:22:12',incidentNumber:'0'});
db.alert.insert({servce:'全基盤', severity:5, Hostname: '*',alertName:'DC全壊', alertBrief:'DCが全壊しサーバ全損',alertTime:'2019-10-15 10:20:00',incidentNumber:'0'});
