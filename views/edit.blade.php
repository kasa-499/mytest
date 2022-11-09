<!DOCTYPE html>
<html lang="ja">
<head>
    @include('head',['title' => 'edit'])
</head>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
<script src="/js/script.js"></script>
<body>

    <header class="header">
        @include('header')
    </header>

    <div class="con_box">
        <h4>お問い合わせ内容編集</h4>
        <p>下記の項目を編集し、送信ボタンを押してください</p>
        <form action="{{route('update',['id' => $contact['id']])}}" method="POST" onsubmit="return editSubmit()">
            @csrf

            <p><span>必須</span>氏名</p>
            @if ($errors->has('name'))
                <p class="e_msg">{{ $errors->first('name') }}</p>
            @endif
            <input type="text" name="name" id="name" value="{{ old('name', $contact['name']) }}">

            <p><span>必須</span>フリガナ</p>
            @if ($errors->has('kana'))
                <p class="e_msg">{{ $errors->first('kana') }}</p>
            @endif
            <input type="text" name="kana" id="kana" value="{{ old('kana', $contact['kana']) }}">

            <p>電話番号</p>
            @if ($errors->has('tel'))
                <p class="e_msg">{{ $errors->first('tel') }}</p>
            @endif
            <input type="text" name="tel" id="tel" value="{{ old('tel', $contact['tel']) }}">

            <p><span>必須</span>メールアドレス</p>
            @if ($errors->has('email'))
                <p class="e_msg">{{ $errors->first('email') }}</p>
            @endif    
            <input type="email" name="email" id="email" value="{{ old('email', $contact['email']) }}">
            
            <p><span>必須</span>お問い合わせ内容</p>
            @if ($errors->has('body'))
                <p class="e_msg">{{ $errors->first('body') }}</p>
            @endif 
            <textarea name="body" id="body">{{ old('body', $contact['body']) }}</textarea>
            
            <input type="submit" value="送信" class="botton">

        </form>

    </div>
    <div class="back"><a href="{{route('contact')}}">お問い合わせに戻る</a></div>
    
    <footer id="footer">
        @include('footer')
    </footer>
    
</body>
</html>
