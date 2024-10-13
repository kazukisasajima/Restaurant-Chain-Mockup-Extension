# Restaurant Chain Mockup Extension
  

## 概要
レストランチェーンの詳細、各ロケーション、従業員の情報を効率的に管理するためのレストランチェーン管理システム


## イメージ
<img width="472" alt="スクリーンショット 2024-10-12 224945" src="https://github.com/user-attachments/assets/de503f62-22cb-43a3-aefe-3815f0b0634a">


## 実行方法
```
php -S localhost:8000
```


## クラス
- Employee クラス（User クラスを拡張）
  - 職種（string）: 従業員の職種
  - 給与（float）: 従業員の給与
  - 開始日（DateTime）: 従業員がレストランでの雇用を開始した日付
  - 賞（array）: 従業員が獲得した賞の配列

- Company クラス
  - 会社名（string）: 会社の名称
  - 設立年（int）: 会社が設立された年
  - 説明（string）: 会社の簡単な説明
  - ウェブサイト（string）: 会社の公式ウェブサイトの URL
  - 電話（string）: 会社の連絡先電話番号
  - 業界（string）: 会社が事業を展開している業界
  - CEO（string）: 会社の CEO の名前
  - 公開取引の有無（bool）: 会社が公開取引されているかどうかを示します

- RestaurantChain クラス（Company クラスを拡張）
  - チェーン ID（int）: レストランチェーンの一意の識別子
  - レストランの場所（array）: レストランチェーンの異なる場所を表す RestaurantLocation オブジェクトの配列
  - 料理の種類（string）: レストランチェーンで提供される料理の種類
  - 場所の総数（int）: チェーン内のレストランの総数
  - ドライブスルーの有無（bool）: チェーンのレストランにドライブスルーがあるかどうかを示します
  - 設立年（int）: レストランチェーンが設立された年
  - 親会社（string）: 親会社の名前（該当する場合）


## 使用技術
- フロントエンド
  - HTML
  - CSS
  - Bootstrap

- バックエンド
  - PHP
