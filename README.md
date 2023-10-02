# CoffSpot / コーヒー検索サービス
![アプリケーション_画面](https://github.com/ok66ym/coffeeApp/assets/134782129/48cd6209-f864-4327-a145-47813a129a83)

## サービス概要
CoffSpotは，「好みのコーヒーに手軽に出会える場を提供したい」という想いから作成した，コーヒー検索サービスです．  
苦味・酸味・コク・甘味・香りの5項目の数値を設定するだけであなたの好みのコーヒーを簡単に検索することができます．

### URL
https://coffee-search-app-7a8565b25739.herokuapp.com/login  
レスポンシブ対応のため，PCでもスマートフォンでも利用可能です．

### テストアカウント
以下のアドレス(ID)とパスワードでログインし，サービスを体験できます．  
- メールアドレス(ID): test@test  
- パスワード: okym2000

また，**ゲストユーザー**でのログインも可能となっています．  
※ゲストユーザーでのログインの場合，アカウントの編集はできない仕様となっています．

### 制作背景
自身の好みのコーヒーを探すために以下のような課題があると考えました．  
- 多くの種類があるコーヒーの中から自身が飲みたいコーヒーを探すには手間と時間がかかる点．
- コーヒーを選ぶ基準が多く，手軽にコーヒーを探すことが難しい点．
- コーヒーの評価基準がサイトや販売元によってバラバラであり，実際に飲んでみないとわからない点．  

そこで，多岐に渡るコーヒーの中から評価基準を苦味・酸味・コク・甘味・香りの5項目に限定し，この5項目の値をユーザーが自由に設定流することで求めている好みのコーヒーに手軽に出会える場を提供したいと考えました．  また，ユーザー同士でのコーヒーの情報を共有できるように，自分自身や他のユーザーが見つけたコーヒーを投稿してその中から好みのコーヒーを探すことができるようにしたいと考えました．

## メイン機能の使い方
**ユーザーが出会ったコーヒーの情報を投稿：**  
スライダーを動かして，出会ったコーヒーの苦味・酸味・コク・甘味・香りを評価できます．
![coffeePost](https://github.com/ok66ym/coffeeApp/assets/134782129/2855ff01-37b8-4fdc-ba9a-1b08585145ff)

**あらかじめ登録されたコーヒー情報とユーザーが投稿したコーヒー情報を検索：**  
苦味・酸味・コク・甘味・香りの5項目の数値をスライダーを動かして，好みに合わせて設定するだけでコーヒーを検索できます．

**ユーザーの検索履歴から直接コーヒーを再検索：**  
ユーザーの検索履歴を保存し，ワンクリックで再検索できます．

## 実装機能
### 機能一覧
- コーヒー投稿機能(CRUD)・投稿一覧機能
- お気に入り機能・お気に入り一覧機能
- ページネーション機能
- 画像アップロード機能(Cloudinary)
- コーヒー検索機能(データベースに保存されたコーヒー情報，投稿されたコーヒー情報)
- 検索履歴保存機能
- 検索履歴際検索機能
- レスポンシブ設定

### 認証機能(Laravel Breeze)
- ユーザー登録 / ログイン / ログアウト
- ゲストログイン(アカウント情報編集，パスワード変更，アカウント削除については不可)
- パスワード変更
- アカウント情報編集(ユーザー名，メールアドレス(ID)，一言)
- アカウント削除

## 使用技術一覧
### フロントエンド
- HTML
- CSS
- Tailwind CSS 3.3.3
- JavaScript

### バックエンド
- PHP 8.0.29
- Laravel 9.52.10

### 環境
- AWS(EC2+Cloud9)
- MySQL(MariaDB) 10.2.38
- Composer 2.5.8
- Git 2.40.1 / GitHub
- Cloudinary

### デプロイ
- Heroku

## ER図
<img width="715" alt="ER" src="https://github.com/ok66ym/coffeeApp/assets/134782129/bad5badf-50d0-4234-8101-bdfe3855b88d">

## 工夫した点
- ユーザーがコーヒーを自分で評価して投稿する機能を実装．
- 苦味・酸味・コク・甘味・香りの5項目で評価されたコーヒーを，ユーザーの好みの値に合わせて検索するアルゴリズムの実装．
- レスポンシブ設定によりスマートフォンでの利用を可能にした点
- ゲストログインの実装

## 苦労した点
- ユーザーが設定した値から，好みのコーヒーを検索できるアルゴリズムの実装．
- UI/UXの調整(レスポンシブ設定・Tailwind CSS)．
- Cloudinaryを用いた画像アップロード機能の実装．
- 大量のコーヒーに関するデータが記録されたcsvファイルのデータベースへの登録を自動化

## 今後実装予定の機能
- 非同期通信でのお気に入り機能
- Google Map API
