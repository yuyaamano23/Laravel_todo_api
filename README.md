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

## マイグレーション

ユニットテストの 2 までやる

1 マイグレーションファイル作成

```zsh
php artisan make:migration <HogesHogesTable>
```

2 　データベース反映

```zsh
php artisan migrate
```

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
