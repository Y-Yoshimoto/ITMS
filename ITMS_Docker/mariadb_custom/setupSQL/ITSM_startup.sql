create database itms;
-- create user itmsUser@'%' identified by 'Password';
GRANT all on itms.* TO `itmsUser`@'%' IDENTIFIED BY 'Password';
GRANT all on itms.* TO `itmsUser`@'localhost' IDENTIFIED BY 'Password';
SELECT user,host FROM mysql.user;
-- grant all on itms.* to itmsUser;
use itms;
-- User data
CREATE TABLE t_userdata (
    userNumber int PRIMARY KEY,  -- プライマーキー
    userid VARCHAR(64) NOT NULL, -- ユーザー名
    password VARCHAR(64),   -- パスワード
    deleteFlag int NOT NULL -- 削除フラッグ(1:削除+パスワード空白)
);
INSERT INTO t_userdata VALUES (1,'y-yoshimoto','dc647eb65e6711e155375218212b3964',0);
INSERT INTO t_userdata VALUES (2,'test','dc647eb65e6711e155375218212b3964',0);
SELECT * FROM t_userdata;

-- Incident data
CREATE TABLE t_incidentdata (
    incidentNumber int PRIMARY KEY, -- プライマーキー
    servce VARCHAR(64), -- サービス名
    userNumber  int, -- 登録ユーザーナンバー
    severity int NOT NULL, -- 緊急度(1:Information, 2:Warning, 3:Average, 4:High, 5:Disaster)
    incidentName VARCHAR(256), -- インシデント名
    brief TEXT, -- 概要
    handling TEXT, -- 対応
    remark TEXT, -- 備考
    recodeTime DATETIME, -- 登録時刻
    updateTime DATETIME, -- 更新時刻
    closedFlag int NOT NULL      -- 完了フラッグ(1:完了)
);
INSERT INTO t_incidentdata VALUES (1, '情報基盤', 1, 2, 'Nginx停止', 'リバースプロキシ用のnginx.serviceが停止','サービスの再起動で復旧', '経過観察中','2019-10-04 15:25:07', '2019-10-05 18:25:22', 0);
INSERT INTO t_incidentdata VALUES (2, '情報基盤', 1, 4, 'MySQL停止', '冗長系への切り替わりが発生。2号機で運用継続中','','' , '2019-10-02 22:25:23', '2019-10-07 18:22:45', 0);
INSERT INTO t_incidentdata VALUES (3, '情報基盤', 1, 3, 'CPUリソース上昇', 'APサーバ1号機でCPU使用率上昇(90%)','', '', '2019-10-02 22:26:14', '2019-10-02 22:26:14', 0);
INSERT INTO t_incidentdata VALUES (4, '情報基盤', 1, 1, 'サーバ証明書更新', 'SSLサーバ証明書の更新が必要','', '', '2019-10-02 10:22:22', '2019-10-02 23:11:12', 0);
SELECT * FROM t_incidentdata;
