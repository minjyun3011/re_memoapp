<?php

namespace App\Http\Controllers;

use App\Models\Memo;
use Illuminate\Http\Request;

class MemoController extends Controller
{
    public function show($id)
    {
        $memo = Memo::find($id);
        return view('memos.show', ['memo' => $memo]);
    }
    // indexページへ移動
    public function index()
    {
        // モデル名::テーブル全件取得
        $memos = Memo::all();
        // memosディレクトリーの中のindexページを指定し、memosの連想配列を代入
        return view('memos.index', ['memos' => $memos]);
    }
    public function create()
    {
        return view('memos.create');
    }
    public function store(Request $request)
    {
        $memo = new Memo;
        $memo->title = $request->title;
        $memo->body = $request->body;
        $memo->save();
        return redirect(route("memos.index"));
    }
}
