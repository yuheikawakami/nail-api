<p>◎予約一覧</p>

<table>
  @foreach($reservations as $reservation)

  <tr>
    <th>名前：</th>
    <td>{{ $reservation->nailist_id }}</td>
  </tr>
  <tr>
    <th>ネイルメニュー：</th>
    <td>{{ $reservation->nail_menu }}</td>
  </tr>
  <!-- <tr>
    <th>時間：</th>
  </tr> -->
  @endforeach
</table>

<br>
