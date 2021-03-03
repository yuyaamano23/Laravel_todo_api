## やりたいこと

- githubaction phpUnit 自動化
- テストデータ
- swagger でドキュメント書く

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

[migraion コマンド一覧](https://qiita.com/mikakane/items/6ed937b4904be0f0a5cf)

## コントローラの作成

コンテナ入る

```zsh
php artisan make:controller <TodoController>
```

**オプション**<br>
`--resource` は RESTful なアクションを生成できるオプションです。これを使うことによって必要なアクションをスムーズに作成できます。<br>
`--model=Todo` 　コントローラーが使用するモデルを指定することができます。<br>
`--api` create や edit メソッドを含まない API リソースコントローラを素早く生成する<br>

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

[cors を解決した俺のコミット](https://github.com/yuyaamano23/Laravel_todo_api/commit/baad5837cf934f85f34f39e36bc0cdea53e71c64)<br>

## 認証

[laravel 公式ドキュメント(認証)](https://readouble.com/laravel/6.x/ja/authentication.html)<br>
[本気で詳細を理解したい人向けの Laravel ログイン認証](https://reffect.co.jp/laravel/laravel-authentification-by-code-base#i)<br>
[Laravel(6.x)でのセキュアそうな API 認証を実装する](https://qiita.com/ProjectEuropa/items/425acd8fb027830a4063#%E3%81%9A%E3%81%A3%E3%81%A8%E5%90%8C%E3%81%98api_token%E3%82%82%E5%AB%8C%E3%81%AA%E3%81%AE%E3%81%A7%E3%83%AD%E3%82%B0%E3%82%A4%E3%83%B3%E6%AF%8E%E3%81%AB%E6%9B%B4%E6%96%B0%E3%81%99%E3%82%8B)<br>
[Laravel 6.0 API 認証(Passport パッケージ）を使う方法](https://qiita.com/you1978/items/96cf8e3eb83fc9964fff)<br>
[Laravel 6 の API 認証で auth:api で括った処理が動かなかった件](https://ohwhsmm7.blog.fc2.com/blog-entry-573.html)<br>
[https://eza-s.com/blog/archives/327/](https://eza-s.com/blog/archives/327/)<br>

## GitHubActions

[GitHub Actions 導入メモ](https://coders-shelf.com/github-actions-intro/)<br>

## phpコードフォーマッター
[コード 整形 PHP CS Fixer インストール](https://syslog.life/2020/07/15/%E3%82%B3%E3%83%BC%E3%83%89-%E6%95%B4%E5%BD%A2-php-cs-fixer-%E3%82%A4%E3%83%B3%E3%82%B9%E3%83%88%E3%83%BC%E3%83%AB/)<br>


# ドキュメント
## todoAPI ルート

**【注意】**<br>
**エンドポイントは被らないように命名する**<br>
**例)　すでに`'/todos/'`があるのに`'/todos/search'`を追加してはいけない**
**apiResource 使うと楽に作れる**

swagger_editerを使って書くつもり

| method |     URI     |           parameter          | Description |
| ------ | ----------- | -------------------------- | ----------- |
| GET    | /todos      |                            | todoの一覧を取得する
| GET    | /todos/{id} |                            | リクエスト{id}のtodoを取得する |
| POST   | /todos       |       title,content        | todoを投稿する               |
| PUT    | /todos/{id} |       title,content        | リクエスト{id}のtodoを修正する |
| DELETE | /todos/{id} |                            | リクエスト{id}のtodoを削除する |
| GET    | /todo/search |          keyword          | todoをリクエスト{keyword}で曖昧検索して取得する |
| GET    | /comments    |       todo_id             | todo_idのコメントを取得する    |
| POST    | /comments   |       body,todo_id        | todoo_idへのコメントを投稿する |
| DELETE  | /comments/{id}   |                      | リクエスト{id}のcommentを削除する |
| POST  | /register     | name,email,password       | 新規登録 |
| POST  | /login        | email,password            | ログイン |
| GET  | /me            | email,(token)                     | ログインしているユーザの情報 |


<br>

## DB設計
![todo_ER](https://user-images.githubusercontent.com/58542696/109645622-7438ed80-7b9a-11eb-93a4-97279883c688.png)
