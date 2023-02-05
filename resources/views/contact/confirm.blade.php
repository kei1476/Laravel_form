@extends('layout')
@section('content')
<form method="POST" action="{{route('contact.send')}}" >
    @csrf
    <label>メールアドレス</label>
    {{$inputs['email']}}
    <label>名前</label>
    {{$inputs['user']}}
    <label>お問い合わせ内容</label>
    {!!nl2br(e($inputs['body']))!!}

    <button type="submit" name="action" value="back">入力内容修正</button>
    <button type="submit" name="action" value="submit">送信する</button>

    <input name="email" value="{{ $inputs['email'] }}" type="hidden">
    <input name="user" value="{{ $inputs['user'] }}" type="hidden">
    <input name="body" value="{{ $inputs['body'] }}" type="hidden">
</form>
@endsection
