```uml
@startuml
[*] --> トップページ
トップページ -> 会員登録 : 会員登録をクリック
会員登録 -> トップページ : トップページをクリック
トップページ -left-> マイページ : マイページをクリック
トップページ -left-> ログイン : ログインをクリック
ログイン -> トップページ : トップページをクリック
ログイン -down-> マイページ 
ログイン:entry/ID,Passwordを入力
ログイン:do/ログイン認証
マイページ -> トップページ : トップページをクリック
マイページ -down-> ログアウト : ログアウトをクリック
マイページ -left-> 購入履歴 : 購入履歴をクリック
マイページ -right-> 商品一覧 : 商品一覧をクリック/商品検索
マイページ -down-> カート内 : カート内をクリック  
購入履歴 -> マイページ : マイページをクリック
トップページ --> 商品一覧 : 商品一覧をクリック/商品検索
トップページ -> カート内 : カート内をクリック
商品一覧 -> トップページ : トップページをクリック
商品一覧 -down-> マイページ : マイページをクリック
商品一覧 -> 商品詳細 : 商品詳細をクリック  
商品詳細:do/商品説明を表示
商品詳細 -down-> 商品一覧 : 商品一覧をクリック
商品詳細 -down-> カート内 : カート内をクリック
商品詳細 -up-> トップページ : トップページをクリック
カート内 -> 商品一覧 : 商品一覧をクリック
カート内 -up-> トップページ : トップページをクリック
カート内 -up-> マイページ : マイページをクリック   

state カート内 {
  [*] --> カート
  カート -down-> 注文 : 注文をクリック
  カート -> カート : 数量変更/商品の削除
  注文 -down-> カート : カートをクリック
  state 注文 {
    [*] --> お届け先入力
    お届け先入力 -> お届け先確認 : 入力内容の確認をクリック
    お届け先確認 -> お届け先入力 : 修正をクリック
    お届け先確認 -> 購入完了 : 注文確定をクリック
    }
 }
@enduml
```
