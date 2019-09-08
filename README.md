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

## 開発方針
### Controller
  以下のこと以外は行わない
  1. DI: ユーザー入力(+バリデーション)とリソースの管理
  - =: ビジネスロジックを呼び出し(+1の注入)した返却値の代入
  - try-catch: ビジネスロジックがthrowしたExceptionをresponseに反映する
  - return: レスポンスに2を代入してreturn

  #### 反例
    - =: ビジネスロジック返却値の再代入や変換
    - for: Controllerで行うべきではない
    - if: 直接的にresponse要素への代入を行う場合以外は行うべきではない


### レスポンス作成の推奨手順
  1. 配列を返す場合はキーを宣言してユースケースの返却値を割り当てる
  2. 1の配列が複層構造の場合でも第一層までは宣言する
  3. ビジネスロジックの例外はControllerでcatchすること

### ビジネスロジック(useCase)
  __invoke()はprivateメソッドを所定の手順で呼び出していき、Controllerからの入力に対する出力を返却する

  - privateメソッドが別のprivateメソッドを呼び出してはならない
    - 複雑化を避けるため、依存は__invoke()が呼び出す際の引数として解決すること
  - 1リクエスト(Controllerアクション)に対して複数のビジネスロジックを用いることは問題ない
