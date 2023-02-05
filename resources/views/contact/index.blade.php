@extends('layout')
@section('content')
<form method="POST" action="{{route('contact.confirm')}}">
    @csrf

    <label>メールアドレス</label>
    <input type="text" name="email" value="{{old('email')}}">
    @error('email')
    <p class="error-message">{{$message}}</p>
    @enderror

    <label>名前</label>
    <input type="text" name="user" value="{{old('user')}}">
    @error('user')
    <p class="error-message">{{$message}}</p>
    @enderror

    <label>お問い合わせ内容</label>
    <textarea name="body">{{old('body')}}</textarea>
    @error('body')
    <p class="error-message">{{$message}}</p>
    @enderror

    <button type="submit">確認</button>
</form>
@endsection
