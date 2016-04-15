◎予約ページ

<form action="{{ url('/users/reservations')}}" method="post" >
  {{ csrf_field() }}
  <p>
    <input type="text" name="nail_menu">
  </p>

  <input type="submit" value="予約">


</form>
