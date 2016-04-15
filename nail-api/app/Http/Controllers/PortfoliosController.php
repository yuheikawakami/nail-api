<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Intervention\Image\Facades\Image;

class PortfoliosController extends Controller
{
    //
    public function getIndex()
    {
      return view('nailist.portfolio');
    }

    public function postIndex(Request $request)
    {
      $image = $request->input('image');
      // ファイル名を生成し画像をアップロード
      $name = md5(sha1(uniqid(mt_rand(), true))).'.'.$image->getClientOriginalExtension();
      $upload = $image->move('media', $name);
      // サムネイル生成保存処理
     Image::make('media/'.$name)
      ->resize(60, 60)
      ->save('media/mini/'.$name);
     // セッションデータを追加
     $data = array(
     'success' => '画像がアップロードされました',
     'filename' => $name,
  );

  return redirect('nailist/portfolio')->with($data);
    }
}
