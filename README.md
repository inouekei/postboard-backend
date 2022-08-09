# アプリケーション名
Postboard
何気ないことをつぶやくことができるTwitter風SNSアプリ
![top](https://user-images.githubusercontent.com/108909962/183534879-650a7818-0289-4465-94f6-e3a59bdc9f33.png)

## 作成した目的
提出課題のため

## 他のリポジトリ
フロントエンドのリポジトリ
https://github.com/inouekei/postboard-frontend/

## 機能一覧
- 会員登録
- ログイン
- ログアウト
- 投稿一覧取得
- 投稿追加
- 投稿削除
- いいね追加
- いいね削除
- コメント追加
- コメント削除

## 使用技術（実行環境）
- Laravel　8.x、MySQL

## テーブル設計
![tables](https://user-images.githubusercontent.com/108909962/183534902-17398715-3253-4bca-979d-b5f92365cbd6.png)

## ER図
![index drawio](https://user-images.githubusercontent.com/108909962/183534932-de437dcf-1447-47e3-87c0-00478c8e541e.png)

## 環境構築
- MySQLでpostboarddbを作成する
- バックエンドのトップにある設定ファイル.envのユーザー名、パスワードの箇所に、自分の環境にあったものを設定する
- MySQLを立ち上げてから、トップでphp artisan serveとコマンド入力する
- フロントエンドを構築する
