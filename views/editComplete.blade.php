<!DOCTYPE html>
<html lang="ja">
<head>
    @include('head',['title' => 'editComplete'])
</head>
<body>
    <header class="header">
        @include('header')
    </header>

    <div class="con_box">
    <h4>お問い合わせ内容編集</h4>
    <div class="con_text"><p>編集が正常に完了しました</p></div>
    <a href="{{route('index')}}" class="complete">トップへ戻る</a>
    </div>
 
    <footer id="footer">
        @include('footer') 
    </footer>
</body>
</html>