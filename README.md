## コンテナ起動

```zsh
$ docker-compose up -d
```

## コンテナに入る

```zsh
$ docker-compose exec app bash
```

## ユニットテストについて

1 コンテナに入る

```zsh
$ docker-compose exec app bash
```

```zsh
cd laravel-vue-app
```

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
php artisan make:migration <HogesHogesTable>
```

2 　データベース反映

```zsh
php artisan migrate
```

## コントローラの作成

コンテナ入る

```zsh
php artisan make:controller <TodoController>
```

**オプションについて**<br>
`--resource` は RESTful なアクションを生成できるオプションです。これを使うことによって必要なアクションをスムーズに作成できます。<br>
`--model=Todo` 　コントローラーが使用するモデルを指定することができます。<br>
`--api create` や edit メソッドを含まない API リソースコントローラを素早く生成する<br>

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

## 折りたたみテスト

<details>
<summary>これは中身が整形される</summary>

1. 野菜**A**の皮を剥く。
2. 乱切りにする。
3. 調味料**B**と合わせて炒める。 - `火傷`に注意。
</details>

## todoAPI ルート

| method | URI         | action  |
| ------ | ----------- | ------- |
| GET    | /todos      | index   |
| GET    | /todos/{id} | show    |
| POST   | todos       | store   |
| PUT    | /todos/{id} | update  |
| DELETE | /todos/{id} | destroy |
