<!DOCTYPE html>
<html lang="ja">
<head>
    @include('head',['title' => 'confirm'])
</head>
<body>
    <header class="header">
        @include('header')
    </header>


    <div class="con_box">
        <h4>お問い合わせ</h4>
        <p>下記の内容をご確認の上、送信ボタンを押してください。<br>内容を訂正する場合は戻るを押してください。</p>
        <form action="{{route('complete')}}" method="POST">
            @csrf
            <p>氏名</p>
            <div class="date">{{ $inputs['name'] }}</div>
            <input type="hidden" name="name" value="{{ $inputs['name'] }}">

            <p>フリガナ</p>
            <div class="date">{{ $inputs['kana'] }}</div>
            <input type="hidden" name="kana" value="{{ $inputs['kana'] }}">

            <p>電話番号</p>
            <div class="date">{{ $inputs['tel'] }}</div>
            <input type="hidden" name="tel" value="{{ $inputs['tel'] }}">

            <p>メールアドレス</p>
            <div class="date">{{ $inputs['email'] }}</div>
            <input type="hidden" name="email" value="{{ $inputs['email'] }}">

            <p>お問い合わせ内容</p>
            <div class="date t">{!! nl2br(e($inputs['body'])) !!}</div>
            <textarea class="textarea_hide" name="body">{{ $inputs['body'] }}</textarea>

            <input type="submit" name="action" value="戻る" class="botton_b">

            <input type="submit" name="action" value="送信" class="botton_s">

        </form>
    </div>

    <footer id="footer">
        @include('footer') 
    </footer>
</body>
</html>