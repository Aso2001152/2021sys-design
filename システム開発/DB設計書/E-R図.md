```uml
@startuml

skinparam class {
    BackgroundColor Snow
    BorderColor Black
    ArrowColor Black
}

!define MASTER_MARK_COLOR Orange 
!define TRANSACTION_MARK_COLOR DeepSkyBlue

package "ECサイト" as EC_system {
    entity "顧客マスタ" as customer <m_customers> <<M,MASTER_MARK_COLOR>> {
        + customer_code [PK]
        --
        pass
        name
        address
        credit
        del_flag
        reg_date
    }
    
    entity "購入テーブル" as order <order> <<T,TRANSACTION_MARK_COLOR>> {
        + order_id [PK]
        --
        # customer_code [FK]
        item_code
        price
        num
        purchase_date
        total_price
    }

entity "カートテーブル" as d_cart <d_cart> <<T,TRANSACTION_MARK_COLOR>> {
+ customer_code [PK][FK]
+ item_code [PK][FK]
--
item_name
image
price
num
}

   entity "商品マスタ" as items <m_items> <<M,MASTER_MARK_COLOR>> {
        + item_code [PK]
        --
        item_name
        price
        # category_id [FK]
        image
        detail
        del_flag
        reg_date
    }
    
    entity "カテゴリマスタ" as category <m_category> <<M,MASTER_MARK_COLOR>> {
        + category_id [PK]
        --
        name
        reg_date
    }


}


   d_cart }-down-|| customer
   d_cart }-o| items
   customer       |o-ri-o{     order
   items          }o--||     category


@enduml
```
