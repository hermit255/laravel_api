## @php-fpm
### A.新しくプロジェクトを作る場合
- Laravelインストール
  ```
  composer create-project --prefer-dist laravel/laravel ./
  ```

### B.それ以外の(プロジェクトをgit cloneしてきた)場合
1. composerパッケージインストール
  ``
  composer install
  ```

- 暗号化キー作成
  ```
  php artisan key:generate
  ```

- .envを作成
  ```
  cp .env.example .env
  ```

- migrateの実行
  ```
  php artisan migrate:fresh
  ```

- seederの実行
  ```
  php artisan db:seed --class={ XxxTableSeeder(classname) }
  ```

#### 共通
##### `storage`および`bootstrap/cache`を書き込み可能にする
- docker環境ではroot実行なので不要

##### オートローダーの更新
- 新しいディレクトリを作成した時には`composer dump-autoload`しないとnamespaceから見つけてくれない
