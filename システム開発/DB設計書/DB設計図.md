# データベース設計図

## d_purchase

|項目名|型|PK|NN|FK|
|-----|--|--|--|--|
|order_id|bigint(20)|○|○||
|customer_code|varchar(50)||○|○|
|item_code|int(11)||○||
|price|int(11)||○||
|num|int(11)||○||
|purchase_date|date||○||
|total_price|int(11)||○||

## d_notice

|項目名|型|PK|NN|FK|
|-----|--|--|--|--|
|notice_code|int(11)|○|○||
|notice_detail|varchar(200)||○||
|reg_date|date||○||

## d_favorite

|項目名|型|PK|NN|FK|
|-----|--|--|--|--|
|customer_code|varchar(50)|○|○|○|
|item_code|int(11)|○|○|○|
|item_name|varchar(50)||○||
|image|varchar(200)||○||
|detail|varchar(500)||||
|price|int(11)||○||

## d_cart
|項目名|型|PK|NN|FK|
|-----|--|--|--|--|
|customer_code|varchar(50)|○|○|○|
|item_code|int(11)|○|○|○|
|item_name|varchar(50)||○||
|image|varchar(200)||○||
|price|int(11)||○||
|num|int(11)||○||

## m_customers

|項目名|型|PK|NN|FK|
|-----|--|--|--|--|
|customer_code|varchar(50)|○|○||
|pass|varchar(50)||○||
|name|varchar(20)||○||
|address|varchar(100)||○||
|mail_address|varchar(100)||○||
|credit|varchar(50)||○||
|del_flag|int(1)||||
|reg_date|date||○||

## m_category

|項目名|型|PK|NN|FK|
|-----|--|--|--|--|
|category_id|int(11)|○|○||
|name|varchar(20)||○||
|reg_date|date||○||

## m_items

|項目名|型|PK|NN|FK|
|-----|--|--|--|--|
|item_code|int(11)|○|○||
|item_name|varchar(50)||○||
|price|int(11)||○||
|category_id|int(11)||○|○|
|image|varchar(200)||○||
|detail|varchar(500)||||
|del_flag|int(11)||||
|reg_date|date||○||

## m_master
|項目名|型|PK|NN|FK|
|-----|--|--|--|--|
|master_code|int(11)|○|○||
|pass|varchar(50)||○||
|name|varchar(20)||○||
|master_flag|int(1)||||

## images
|属性名(カラム名)|型|PK|NN|FK|
|-----|--|--|--|--|
|id|int(11)|○|○||
|file_name|varchar(255)||○||
|uploaded_on|datetime||○||
|status|enum||○||
