#お問い合わせフォーム及びお問い合せ管理アプリ

#環境構築
Dockerビルド

1．git@github.com:ishikawashinnya/ability-test.git 

2．docker-compose up -d -build

*MySQLは、OSによって起動しない場合があるのでそれぞれのPCに合わせてdocker-compose.ymlファイルを
編集してください。

Laravel環境構築
1. docker-compose exec php bash
2. composer install
3. .env.exampleファイルから.envを作成し、環境変数を変更
4. php artisan key:generate
5. php artisan migrate
6. php artisan db:seed

#使用技術

・Laravel Framework 8.83.27

・PHP7.4.9

・MySQL8.0.26

#ER図

![ER drawio](https://github.com/ishikawashinnya/ability-test/assets/161817728/0b49b8e1-15a3-4782-ba91-20d1ff64a4b8)



#URL
開発環境：http://localhost/

