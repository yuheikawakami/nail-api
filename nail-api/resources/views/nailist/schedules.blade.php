<p>◎スケジュール（ネイリスト）</p>

<table>
@foreach($schedules as $schedule)
<tr>
  <th>名前：</th>
  <td>{{ $schedule->user_id }}</td>
</tr>
<tr>
  <th>ネイルメニュー：</th>
  <td>{{ $schedule->nail_menu }}</td>
</tr>
<tr>
@endforeach
</table>
