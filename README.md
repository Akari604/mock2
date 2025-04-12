#実践学習ターム 模擬案件中級_勤怠管理アプリ

##環境構築  
Dockerビルド  
1.git clone リンク  
2.docker-compose up -d --build

##laravel環境構築  
1.docker-compose exec php bash  
2.composer install  
3..env.exampleファイルから.envを作成し、環境変数を変更  
4.php artisan key:generate  
5.php artisan migrate  

##使用技術  
Laravel Framework 8.83.8  
nginx 1.21.1  
MySQL 8.0.26  
php 7.4.9

##ER図

![スクリーンショット 2025-04-12 180118](https://github.com/user-attachments/assets/8fabd3e3-129b-45e1-9d2d-0f99af92fc50)



##URL  
開発環境  
会員登録画面　http://localhost/register  
ユーザーのログイン画面　http://localhost/login  
管理者のログイン画面　http://localhost/admin/login  
ユーザーの出勤登録画面　http://localhost/attendance  
管理者の勤怠一覧画面　http://localhost/admin/attendance/list  
phpMyAdmin http://localhost:8080/

