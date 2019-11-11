//DB接続
db.adminCommand('alertlist')
db.alert.insert({servce:'情報基盤',alertName:'Nginx停止',severity:2, Hostname: 'HOST-RP-01',alertBrief:'Nginxリバプロ停止',alertTime:'2019.10.02 11:25:22',eventID:'6',incidentNumber:'0'});
db.alert.insert({servce:'情報基盤',alertName:'サーバ停止',severity:2, Hostname: 'HOST-RP-01',alertBrief:'ping lost',alertTime:'2019.10.04 16:44:23',eventID:'10',incidentNumber:'0'});
db.alert.insert({servce:'情報基盤',alertName:'MySQL停止',severity:4, Hostname: 'HOST-DB-01',alertBrief:'MySQLサービス停止',alertTime:'2019.10.12 22:25:25',eventID:'11',incidentNumber:'0'});
db.alert.insert({servce:'情報基盤',alertName:'フェイルオーバー発生',  severity:4, Hostname: 'HOST-DB-00',alertBrief:'DB2号機アクティブ',alertTime:'2019.10.12 22:25:30',eventID:'23',incidentNumber:'0'});
db.alert.insert({servce:'情報基盤',alertName:'CPU使用率上昇',severity:3, Hostname: 'HOST-AP-01', alertBrief:'CPU使用率上昇90%',alertTime:'2019.10.15 04:22:12',eventID:'45',incidentNumber:'0'});
db.alert.insert({servce:'情報基盤',alertName:'CPU使用率復旧',severity:1, Hostname: 'HOST-AP-01', alertBrief:'CPU使用率復旧2%',alertTime:'2019.10.15 04:23:12',eventID:'55',incidentNumber:'0'});
db.alert.insert({servce:'情報基盤',alertName:'サーバ証明書更新',severity:1, Hostname: 'HOST-RP-01', alertBrief:'サーバ証明書期限ぎれアラート',alertTime:'2019.10.15 04:22:12',eventID:'56',incidentNumber:'0'});
db.alert.insert({servce:'全基盤', alertName:'DC全壊',severity:5, Hostname: '*',alertBrief:'DCが全壊しサーバ全損',alertTime:'2019.10.15 10:20:00',eventID:'66',incidentNumber:'0'});
