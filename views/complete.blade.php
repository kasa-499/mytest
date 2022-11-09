<!DOCTYPE html>
<html lang="ja">
<head>
    @include('head',['title' => 'complete'])
</head>
<body>
    <header class="header">
        @include('header')
    </header>

    <div class="con_box">
    <h4>お問い合わせ</h4>
    <div class="con_text"><p>お問い合わせありがとうございます。<br>送信頂いた件につきましては、当社より折り返しご連絡を差し上げます。<br>なお、ご連絡までに、お時間を頂く場合もございますので予めご了承ください。</p></div>
    <a href="{{route('index')}}" class="complete">トップへ戻る</a>
    </div>
 
    <footer id="footer">
        @include('footer') 
    </footer>
</body>
</html>