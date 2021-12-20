# DB定義書
## ER図
[ER図はこちら](https://github.com/Aso2001152/2021sys-design/blob/main/%E3%82%B7%E3%82%B9%E3%83%86%E3%83%A0%E9%96%8B%E7%99%BA/DB%E8%A8%AD%E8%A8%88%E6%9B%B8/E-R%E5%9B%B3.md)

# DBテーブルカラム一覧

# データベース設計図

## 購入テーブル(d_purchase)

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|注文ID|order_id|bigint(20)|○|○||
|顧客番号|customer_code|varchar(50)||○|○|
|商品番号|item_code|int(11)||○|○|
|価格|price|int(11)||○||
|数量|num|int(11)||○||
|購入日|purchase_date|date||○||
|総額|total_price|int(11)||○||

## カートテーブル(d_cart)
|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|顧客番号|customer_code|varchar(50)|○|○|○|
|商品番号|item_code|int(11)|○|○|○|
|商品名|item_name|varchar(50)||○||
|画像ファイル|image|varchar(200)||○||
|価格|price|int(11)||○||
|数量|num|int(11)||○||

## 顧客マスタ(m_customers)

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|顧客番号|customer_code|varchar(50)|○|○||
|パスワード|pass|varchar(50)||○||
|氏名|name|varchar(20)||○||
|住所|address|varchar(100)||○||
|メールアドレス|mail_address|varchar(100)||○||
|クレジット番号|credit|varchar(50)||○||
|削除フラグ|del_flag|int(1)||||
|登録日|reg_date|date||○||

## カテゴリマスタ(m_category)

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|カテゴリID|category_id|int(11)|○|○||
|氏名|name|varchar(20)||○||
|登録日|reg_date|date||○||

## 商品マスタ(m_items)

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|商品番号|item_code|int(11)|○|○||
|商品名|item_name|varchar(50)||○||
|価格|price|int(11)||○||
|カテゴリID|category_id|int(11)||○|○|
|画像ファイル名|image|varchar(200)||○||
|商品詳細|detail|varchar(500)||||
|削除フラグ|del_flag|int(1)||||
|登録日|reg_date|date||○||

