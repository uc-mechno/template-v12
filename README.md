# template-v11

## gulpテンプレート - 静的サイト＆WordPressオリジナルテーマ制作用

## 注意！
nodeのバージョンは、`v14.21.3`推奨です。  
v15以上では動作しない可能性があります。

## 概要
- 【scss】cssの拡張
- 【ejs】JavaScriptのテンプレートエンジン

## フォーマッターや、構文解析ツール、トランスパイル
- 【stylelint】cssのコードの解析
- 【prettier】html,css,jsなどの各ファイルを整形
- 【editorconfig】コードフォーマットを統一する
<br>

-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --

## 1. 利用方法
<span style="color:red;">※</span> 開発は、`package.json`が配置してあるルートディレクトリにて行います。  
その他のディレクトリだと、gulpが動作しないので注意してください。
<br>

### node.jsのバージョンなど
- node ```v14.21.3```
- npm ```6.14.18```
※v16でパッケージをインストールしたいのですが、stylelint関係の依存問題が解決されません…

### 各パッケージのインストール
```
npm install
```
package.jsonで設定されている各パッケージをローカルにインストールします。<br>
`node_modules`が作成されます。

-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --

## 2. 基本的なコマンド・スクリプト

### scssファイルをコンパイル
```
npx gulp sass
```
### scssファイルを圧縮してコンパイル
```
npx gulp minSass
```
### scssファイルをプロダクションモードコンパイル
```
npx gulp sass --production
```
メディアクエリをまとめてコンパイルします。<br>
※`container-query`があるとエラーがでます。

### javascriptファイルをコンパイル
```
npx gulp js
```
### javascriptファイルを圧縮してコンパイル
```
npx gulp minJs
```
### ファイルを監視して変更があったらコンパイル
```
npx gulp watch
```
### ローカルサーバーを起動
```
npx gulp server
```
静的サイト用と動的サイト用があります。<br>
切り替える場合は下記部分のコメントアウトを削除もしくは追加してください。
```
// ---------------------------------------------------------------
// BrowserSync
// ---------------------------------------------------------------
const buildServer = (done) => {
  browserSync.init({
    // 静的サイト
    files: [ // 監視対象の指定
      srcPath.html,
      srcPath.css,
      srcPath.js
    ],
    server: { baseDir: destPath.root }, // ルートとなるディレクトリを指定

    /*
    // 動的サイト
    files: [ // 監視対象の指定
      destPath.php,
      srcPath.css,
      srcPath.js
    ],
    proxy: destPath.domain, // ルートとなるディレクトリを指定
    */
```

### キャッシュクリア
```
npx gulp cache
```
`?ver=`の後ろにランダムな数字を入れる。<br>
※連続で行うと追加されて行くので納品時に行うと良い。<br>
コンパイルし直せば元に戻ります。

### 画像の圧縮してwebpを生成
```
npx gulp image
```
TinyPng APIキーが必要です。<br>
下記部分にAPIキーを設定してください。
※一ヶ月500枚までなら無料。
```
// ---------------------------------------------------------------
// 画像
// ---------------------------------------------------------------
const tinyPng = (done) => {
  src(srcPath.imageFile)
    .pipe(plumber())
    .pipe(
      tinypng({
        key: "ここにAPIキーを入力",
        sigFile: srcPath.image + ".tinypng-sigs",
        log: true,
        summarise: true,
        sameDest: true,
        parallel: 10,
      })
    )
    .pipe(dest(destPath.image))
    .on("end", done);
};
```
### 枚数が多くてうまく動作しない場合
続けて入力してください。
```
npx gulp tinypng
npx gulp webp
```
### `dist`ディレクリの削除
```
npx gulp cleanAll
```
### `dist`ディレクトリの`css`と`js`の`sourcemaps`を削除
```
npx gulp cleanMap
```
### `dist`ディレクトリの`css`の`sourcemaps`を削除
```
npx gulp cleanCssMap
```
### `dist`ディレクトリの`js`の`sourcemaps`を削除
```
npx gulp cleanJsMap
```
### コンパイルと画像の圧縮をする全ての処理
```
npx gulp build
```

### ローカルサーバーの立ち上げと監視を開始するデフォルトの処理
```
npx gulp
```

### 開発環境用にディレクトリ・ファイルをコンパイル`npx gulp build`と`npx gulp`を実行
```
npm run dev
```

### [1]本番環境用にディレクトリ・ファイルをコンパイル`npx gulp minSass`と`npx gulp minJs`と`npx gulp cache`と`npx gulp cleanMap`を実行
```
npm run build
```

### [2]本番環境用にディレクトリ・ファイルをコンパイル`npx gulp sass --production`と`npx gulp cache`と`npx gulp cleanMap`を実行
```
npm run production
```
<br>

### 開発環境用と、本番環境用の違い
【開発環境用】
+ css,jsファイルのソースマップを出力して圧縮は行いません。

【本番環境用】
1. css,jsファイルの圧縮を行いソースマップは出力しません。
2. メディアクエリをまとめてースマップは出力しません。

-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --

## 4. 基本的なディレクトリ・ファイル構成
### 【ディレクトリ】
- ```.vscode```
  - vscodeの設定ファイルが入っています。<br>
- ```src```
  - 開発用のディレクトリです。phpファイル以外はここでコーディングをします
- ```dist```
  -  最終的にgulpで開発ファイルを出力するディレクトリです。本番環境にアップロードするファイル郡になります
- ```node_modules```
  - インストールしたnodeのpackage郡です。

### 【ファイル】
- ```.gitignore```
  - gitから除外するファイルを設定します。
- ```.browserslistrc```
  - CSSにどのベンダープレフィックスを付けるかなどを決める設定ファイルです。
- ```.prettierignore```
  - prettierの整形から除外したいファイルを設定します。
- ```.prettierrc.js```
  - フォーマッターprettierの設定ファイルです。
- ```.stylelintrc.js```
  - 【cssの構文解析ツールstylelint】の設定を行うファイルです。
- ```gulpfile.js```
  - 【gulpタスクの設定を行うファイルです。】
- ```package-lock.json```
  - npmでインストールされたpackageの詳細が記載してあるファイルです。
- ```package.json```
  - npmでインストールしたpackageや設定をが出来るファイルです。

-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --

## 5.gulpにやらせるタスク一覧
### 共通
- 各言語に記述エラーがあった場合、コンソールに知らせてくれる & ポップアップ通知をしてくれる
- 各ファイルを変更時にブラウザを自動リロード
- 各ファイルをgulpにキャッシュさせて、差分や変更ファイルのみをコンパイル・圧縮。
- ローカルサーバーの立ち上げ
- 各ファイルの圧縮

### HTML関連
- ejsのHTMLへのコンパイル

### スタイル関連
- scssのコンパイル
- ベンダープレフィックスの自動付与とブラウザ毎に違う記述の仕方を自動変換・追記。細かな設定はgulpfile.jsで管理
- scssのソースマップの書き出し
- scssをgulpにキャッシュさせて、更新したファイルのみコンパイル

### Javascript関連
- 複数のJSファイルを`gulp-concat`を使い一つに統合

### 画像関連
- jpg,png,gif,svgの圧縮をし自動でwebpを生成。

-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --


## 6. ejsについて
### ディレクトリ構成
- `data`
  jsonファイルを使用してサイトの設定や共通項目を格納しておくファイル。サイトのタイトルや、ドメインなどを管理する。
- `_common以下`
  footerやheaderやheadなどの共通パーツなどを定義し、呼び出す。
- `_component以下`
  各共通パーツなどを定義し、呼び出す。
- `その他ディレクトリ`
  実際に出力されるファイルを定義する。ページを増やすごとにindex.ejsファイルを増やす。このディレクトリ以下はディレクトリ構造もそのまま保持してdist以下に出力される。

  -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --


## 7. Sassについて
ルールはflocssを参考にPDFLOCSSを採用。以下に参考サイトを記載。
https://zenn.dev/wagashi_osushi/books/94efd21a66ccaa

### ディレクトリ構成
- `component`
  いくつかのページの共通パーツ
- `foundation`
  サイト全体で共通のデフォルト設定
- `global`
  変数や関数などを管理
- `layout`
  ヘッダーやフッター、ナビゲーションやサイドバーや各セクションや各ページで共通するコンテナ
- `lib`
  外部ライブラリのcssなど
- `project`
  ページ固有のスタイル
- `utility`
  わずかなスタイルの調整のための便利クラスなど
- `wordpress`
  wordpress関係のスタイル
- `wordpress/plugin`
  使用しているプラグインのスタイル

-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --

## 8. JSについて
src/assets/jsディレクトリ以下のファイルは全てdist/assets/js以下にbundle.jsとして出力される。
パーシャルファイル（アンダーバーをつける）のみコンパイルされる。  
順番やWordPressでカプセル化する場合は`gulpfile.js`の以下の場所を変更してくだい。
順番の指定も`gulpfile.js`の以下の場所から変更できます。
```
// gulp-concatの順番
const jsConcat = {
  order: [
  './src/assets/js/_start.js',
  './src/assets/js/_scrollTop.js',
  './src/assets/js/_drawer.js',
  './src/assets/js/_smoothScroll.js',
  './src/assets/js/_swiper.js',
  './src/assets/js/_end.js'
]};

// ---------------------------------------------------------------
// JavaScript
// ---------------------------------------------------------------
const compileJs = (done) => {
  src(srcPath.js, { sourcemaps: true }) こちらをコメントアウト
  // src(jsConcat.order, { sourcemaps: true }) こちらのコメントを外す
    .pipe(
      plumber({ errorHandler: notify.onError("Error: <%= error.message %>") })
    )
    .pipe(concat("bundle.js"))
    .pipe(dest(destPath.js, { sourcemaps: destPath.jsMap }));
  done();
};

// 圧縮
const compressJs = (done) => {
  src(srcPath.js, { sourcemaps: true }) こちらをコメントアウト
  // src(jsConcat.order, { sourcemaps: true }) こちらのコメントを外す
    .pipe(
      plumber({ errorHandler: notify.onError("Error: <%= error.message %>") })
    )
    .pipe(concat("bundle.js"))
    .pipe(terser()) // ES5、ES6対応で圧縮
    .pipe(rename({ suffix: ".min" }))
    .pipe(dest(destPath.js, { sourcemaps: destPath.jsMap }));
  done();
};

```
-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --

## 9. 画像について
jpg, jpeg, png, gif, svgファイルは圧縮される。
上記ファイル以外は監視もコピーもしないので、追加でサポートしたい拡張子があればgulpfile.jsで定義する。  
<span style="color:red;">※</span>tinypngのAPIキーの設定をお願いします。
  -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --

## 10. その他ファイルについて
フォントはsrc/fontsに入れるようにする。

-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --

## 11. vscodeで必要な拡張機能
```EditorConfig for VS Code```
+ コードフォーマットを統一するツール

```stylelint-plus```
+ css,scssのコードをチェックして解析を行ってくれるツール

```Prettier - Code formatter```
+ 各ファイルhtml,css,jsのコードを整形してくれるツール

```EJS language support```
+ vscodeはデフォルトで言語サポートにejsがないので、対応するためのツール
+ 
-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --

## 12. 画像関係
- 各ディレクトリでわけない
- imagesディレクトリにどかっと入れる
- 共通パーツはcommon
- 無理に名前はつけない

### ファイル名のルール
1. カテゴリー
2. 名前
3. 連番
4. 状態

### サンプル
```
[カテゴリー]_[名前][連番]_[状態]
logo_header01_sp.jpg
```

### サンプル（無理に名前を付けない）
```
[カテゴリー][連番]_[状態]
logo01_sp.jpg
```

### 参考サイト
- [よく使っている画像の命名規則](https://qiita.com/manabuyasuda/items/675586be79c4a8eebbfc)
- [もうページで分けない！　画像ファイルの命名規則](https://webnaut.jp/technology/20210910-3953/)

-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --

## editorconfigの設定例
```
// https://dezanari.com/editorconfig/

# trueを指定することでプロジェクト全体に設定
root = true

# 全ファイルに適用
[*]

# 改行コード設定（lf/cr/crlf）
end_of_line = lf

# 文字コード設定（latin1/utf-8/utf-8-bom/utf-16be/utf-16le/...）
charset = utf-8

# インデント時のスタイル設定（tab/space）
indent_style = space

# インデント時のサイズ設定
indent_size = 2

# 文末スペースの設定（true=削除）
trim_trailing_whitespace = true

# 最終行の改行設定（true=改行あり）
insert_final_newline = true

# mdの設定
[*.md]
trim_trailing_whitespace = false

# pugの設定
[*.pug]
indent_style = tab

```

## stylelintrcの設定例
```
//https://yuw27b.hatenablog.com/entry/2016/02/22/225544
"string-quotes": "single",シングルクオートを使う
"color-hex-case": "upper",16進数の色コードは大文字
"color-hex-length": "short",色コードを省略できるときは省略する
"color-no-invalid-hex": true	色コードがおかしい場合に警告
"number-leading-zero": "never",数字の前にゼロをつけない
"number-no-trailing-zeros": true	数字の後ろに（不要な）ゼロはつけない（「10.0px」はダメ）
"number-zero-length-no-unit"
"length-zero-no-unit": true	「0」の場合は単位なし（「margin: 0px;」はダメ）
"value-list-comma-newline-after": "never-multi-line",カンマの後で改行しない
"value-list-comma-space-after": "always",カンマの後は必ずスペースを入れる（「Arial, Helvetica」）
"declaration-colon-space-after": "always",コロンの後に必ずスペースを入れる（「margin:0;」はダメ）
"declaration-no-important":	true「!important」は使わない
"declaration-block-no-single-line": true	1行で全部書かない（「a {color: #000; }」はダメ）
"declaration-block-single-line-max-declarations": "0",1行で全部書かない（「a {color: #000; }」はダメ）
"block-no-empty": "true	空のブロックを許可しない
"block-opening-brace-newline-after": "always",「{」のあとは必ず改行
"block-closing-brace-newline-before": "always",「}」の前に必ず改行
"block-opening-brace-space-before": "always",「{」の前に必ずスペース
"selector-combinator-space-after": "always",「div +p」はダメ（「+」や「>」のあとに必ずスペース）
"selector-combinator-space-before": "always",「div+ p」もダメ（「+」や「>」の前にも必ずスペース）
"selector-list-comma-space-after": "always",「div, p」のとき、カンマの後に必ずスペース
"rule-no-duplicate-properties": true	プロパティの重複を警告（「display」が2個あるとか）
"declaration-block-no-duplicate-properties": true	プロパティの重複を警告（「display」が2個あるとか）
"rule-trailing-semicolon2": "always"ルールの後に必ずセミコロン
"declaration-block-trailing-semicolon": "always",ルールの後に必ずセミコロン
"indentation": "tab",インデントはタブ
```

## prettierrcの設定例
```
//https://zenn.dev/rescuenow/articles/c07dd571dfe10f
  "printWidth": 100,//折り返し
  "tabWidth": 2,//インデントのサイズ
  "useTabs": false,//タブでインデント
  "semi": true,//行末にセミコロン
  "singleQuote": true,//シングルクォーテーションで囲む
  "quoteProps": "as-needed",//オブジェクトのプロパティ引用符
  "trailingComma": "es5",//末尾のカンマ
  "bracketSpacing": true,//要素とカッコの間のスペース
  "bracketSameLine": false,//閉じカッコを同一行に
  "arrowParens": "always",//アロー関数の引数をカッコで囲む
  "requirePragma": false,//プラグマ付きファイルをフォーマット対象とする
  "insertPragma": false,//プラグマを挿入
  "htmlWhitespaceSensitivity": "css",//HTML 空白の感度
  "vueIndentScriptAndStyle": false,//scriptタグとstyleタグのインデント
  "endOfLine": "lf",//改行コードの指定
  "embeddedLanguageFormatting": "auto",//組み込み言語のフォーマット
  "singleAttributePerLine": false//属性の改行
```
