<p>◎ネイルメニュー変更画面</p>

<form action="{{ url('/nailist/profile/nailmenus')}}" method="post" >
  {{ csrf_field() }}
  <p>
    <input type="text" name="menu">
  </p>

  <input type="submit" value="追加">
</form>

@foreach($nailmenus as $nailmenu)
<ul>
  <li> {{ $nailmenu->menu }} </li>
  <form action="{{ action('ProfilesController@deleteNailmenus', $nailmenu->id) }}"method="post">
    {!! csrf_field() !!}
    {!! method_field('delete') !!}
  <input type="submit" value="削除">
</ul>
@endforeach
