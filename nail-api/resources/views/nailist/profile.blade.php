<p>◎プロフィール</p>

<table border="1" width="100%">
  <tr>
    <th>名前</th>
    <td>{{ $currentUser->name }}</td>
  </tr>
  <tr>
    <th>住所</th>
    <td>{{ $currentUser->profile->address }}</td>
  </tr>
  <tr>
    <th>アクセス</th>
    <td>{{ $currentUser->profile->access }}</td>
  </tr>
  <tr>
    <th>営業時間</th>
    <td>{{ $currentUser->profile->business_hours }}</td>
  </tr>
  <tr>
    <th>サロン紹介</th>
    <td>{{ $currentUser->profile->introduction }}</td>
  </tr>
</table>

<a href="{!! url('/nailist/profile/achievements') !!}">アチーブメント</a><br>
<a href="{!! url('/nailist/profile/nailmenus') !!}">ネイルメニュー変更画面</a><br>
<a href="{!! url('/nailist/profile/settings') !!}">プロフィール変更画面</a><br>
<a href="{!! url('/nailist/profile/followers') !!}">フォロワー一覧</a><br>
