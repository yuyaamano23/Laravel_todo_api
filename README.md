## コンテナ起動

```zsh
$ docker-compose up -d
```

## コンテナに入る

```zsh
$ docker-compose exec app bash
```

```zsh
cd laravel-vue-app
```

## ユニットテストについて

1 コンテナに入る

2 テスト作成

```zsh
php artisan make:test <hogeTest>
```

3 テスト検証

```zsh
./vendor/bin/phpunit
```

## model の作成

コンテナ入る

```zsh
php artisan make:model <Todo> -m
```

これで app/Todo.php と/detabase/migrations/date_create_todos_table.php が作成される<br>
※-m オプションをつけるとマイグレーションファイルも同時に作成してくれる

## マイグレーション

コンテナ入る

1 マイグレーションファイル作成

```zsh
php artisan make:migration create_hogehoges_table --create=hoge
```

**オプション**<br>
-–create=hoge とすることで、「hoge_table を生成しますよ。」と Laravel に伝えているので、最初からマイグレーションファイルにある程度の記述がされている。
2 　データベース反映

```zsh
php artisan migrate
```

[migraion コマンド](https://qiita.com/mikakane/items/6ed937b4904be0f0a5cf)

## コントローラの作成

コンテナ入る

```zsh
php artisan make:controller <TodoController>
```

**オプション**<br>
`--resource` は RESTful なアクションを生成できるオプションです。これを使うことによって必要なアクションをスムーズに作成できます。<br>
`--model=Todo` 　コントローラーが使用するモデルを指定することができます。<br>
`--api create` や edit メソッドを含まない API リソースコントローラを素早く生成する<br>

## テーブルのリレーション

**やることは 2 つ**

1. model 同士をリレーションさせる<br>
2. migration ファイルに外部キー制約を加える<br>

[Laravel6 公式ドキュメント(eloquent)](https://readouble.com/laravel/6.x/ja/eloquent-relationships.html)<br>
[Laravel6 公式ドキュメント(外部キー制約)](https://readouble.com/laravel/6.x/ja/migrations.html)<br>

<details>
<summary>外部キー制約一例</summary>

```php
$table->integer('campus_id')->unsigned();

$table->foreign('campus_id')
                  ->references('id')
                  ->on('campuses')
                  ->onDelete('cascade');
```

- onDelete('cascade') はカスケード削除，つまり連鎖削除を行うオプション
- 実は->bigIncrements()で指定されている主キーは自動で UNSIGNED が追加されています。
  そのため、外部キーでも指定が必要です。型も合わせなきゃダメ！参照元が bigInteger なら外部キー指定するときも bigInteger にする。[migration:fresh した時のエラー](https://qiita.com/isaatsu0131/items/4fe32849696bbfa31a30)

</details>

[DB のリレーション 概要](https://qiita.com/mitashun/items/4065fab44b9b4b585d91)<br>
[DB のリレーション例](https://rinsaka.com/laravel/08-one2many.html)<br>

## ルートの確認

app コンテナ入って、cd してからの

```zsh
php artisan route:list
```

## データベースの操作

`dbコンテナに入る`

```zsh
$ docker-compose exec db bash
```

```zsh
`root@74539701c71c:/#`  mysql -h 127.0.0.1 -P 3306 -u root -p
```

`password`は`root`です

## Laravel サーバー

```zsh
$ localhost:8000
```

## phpMyadomin サーバー

```zsh
$ localhost:8080
```

## cors 解決方法

[React から Laravel の API サーバーを叩く + CORS 概説](https://qiita.com/10mi8o/items/2221134f9001d8d107d6)<br>
[delete,put はこれで直った](https://github.com/yuyaamano23/Laravel_Docker_practice/commit/ca68ffe44bfb93e878115af972debc6d49c2d51f)<br>
[参考記事（Laravel で Access-Control-Allow-Origin ヘッダーを付与しても CORS エラーが解消しない）](https://qiita.com/madayo/items/8a31fdd4def65fc08393)<br>

## todoAPI ルート

**【注意】**<br>
**エンドポイントは被らないように命名する**
**例)　すでに`'/todos/'`があるのに`'/todos/search'`を追加してはいけない**

| method | URI         | action  |
| ------ | ----------- | ------- |
| GET    | /todos      | index   |
| GET    | /todos/{id} | show    |
| POST   | todos       | store   |
| PUT    | /todos/{id} | update  |
| DELETE | /todos/{id} | destroy |
