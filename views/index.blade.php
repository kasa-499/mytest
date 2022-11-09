<!DOCTYPE html>
<html lang="ja">
<head>
    @include('head',['title' => 'CafeBlog'])
</head>
<body>
    <header class="header">
        @include('header')
    </header>

    <!--pickup-->
  <div class="pickup">
    <div class="box">
      <img src="{{ asset('storage/img/pickup1.jpg') }}">
      <h2 class="pickup_title">タイトルテキストテキストテキストテキストテキストテキストテキスト</h2>
      <div class="readmore"><a href="#">READ MORE</a></div>
    </div>
    <div class="box">
      <img src="{{ asset('storage/img/pickup2.jpg') }}">
      <h2 class="pickup_title">タイトルテキストテキストテキストテキストテキストテキストテキスト</h2>
      <div class="readmore"><a href="#">READ MORE</a></div>
    </div>
    <div class="box">
      <img src="{{ asset('storage/img/pickup3.jpg') }}">
      <h2 class="pickup_title">タイトルテキストテキストテキストテキストテキストテキストテキスト</h2>
      <div class="readmore"><a href="#">READ MORE</a></div>
    </div>
  </div>
<!--contain-->
    <div class="contain">
        <!--main-->
        <div class="main">
            <h2 class="main_title">タイトルテキストテキストテキストテキストテキスト</h2>
            <div class="date">
                <p>2022/01/01</p>
                <p>カテゴリ１</p>
            </div>
            <img src="{{ asset('storage/img/main1.jpg') }}">
            <p>本文テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
            <div class="readmore"><a href="#">READ MORE</a></div>

            <h2 class="main_title">タイトルテキストテキストテキストテキストテキスト</h2>
            <div class="date">
                <p>2022/01/01</p>
                <p>カテゴリ１</p>
            </div>
            <img src="{{ asset('storage/img/main2.jpg') }}">
            <p>本文テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
            <div class="readmore"><a href="#">READ MORE</a></div>

            <h2 class="main_title">タイトルテキストテキストテキストテキストテキスト</h2>
            <div class="date">
                <p>2022/01/01</p>
                <p>カテゴリ１</p>
            </div>
            <img src="{{ asset('storage/img/main3.jpg') }}">
            <p>本文テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
            <div class="readmore"><a href="#">READ MORE</a></div>
        </div>
    
    <!--side-->
        <div class="side">
            <div class="round_img"><img src="{{ asset('storage/img/human.png') }}"></div>
            <h2 class="name">Name Name</h2>
            <p class="profile">プロフィールテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
            <h2 class="ranking">Ranking</h2>
            <img src="{{ asset('storage/img/side1.jpg') }}">
            <p class="side_title">タイトルテキストテキストテキストテキストテキスト</p>
            <img src="{{ asset('storage/img/side2.jpg') }}">
            <p class="side_title">タイトルテキストテキストテキストテキストテキスト</p>
            <img src="{{ asset('storage/img/side3.jpg') }}">
            <p class="side_title">タイトルテキストテキストテキストテキストテキスト</p>
        </div>
    </div> 


    <footer id="footer">
        @include('footer')
    </footer>
</body>
</html>