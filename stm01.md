```uml
@startuml
[*] --> トップページ
トップページ -> 会員登録:会員登録をクリック
トップページ -left-> ログイン
ログイン -down-> マイページ
ログイン:entry/ID,Passwordを入力
ログイン:do/ログイン認証
マイページ --> マイページ:ログアウトをクリック
マイページ -down-> 会員情報
トップページ --> 商品一覧
商品一覧 -> カート
カート -> お届け先入力
お届け先入力 -> お届け先確認
お届け先確認 -> 購入完了
@enduml
```