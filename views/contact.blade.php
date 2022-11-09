<!DOCTYPE html>
<html lang="ja">
<head>
    @include('head',['title' => 'contact'])
</head>
<body>
    <header class="header">
        @include('header')
    </header>

    <div class="con_box">
        <h4>お問い合わせ</h4>
        <p>下記の項目を入力し、送信ボタンを押してください</p>
        <form action="{{route('confirm')}}" method="POST">
            @csrf

            <p><span>必須</span>氏名</p>
            @if ($errors->has('name'))
                <p class="e_msg">{{ $errors->first('name') }}</p>
            @endif
            <input type="text" name="name" id="name" value="{{ old('name') }}">

            <p><span>必須</span>フリガナ</p>
            @if ($errors->has('kana'))
                <p class="e_msg">{{ $errors->first('kana') }}</p>
            @endif
            <input type="text" name="kana" id="kana" value="{{ old('kana') }}">

            <p>電話番号</p>
            @if ($errors->has('tel'))
                <p class="e_msg">{{ $errors->first('tel') }}</p>
            @endif
            <input type="text" name="tel" id="tel" value="{{ old('tel') }}">

            <p><span>必須</span>メールアドレス</p>
            @if ($errors->has('email'))
                <p class="e_msg">{{ $errors->first('email') }}</p>
            @endif
            <input type="email" name="email" id="email" value="{{ old('email') }}">

            <p><span>必須</span>お問い合わせ内容</p>
            @if ($errors->has('body'))
                <p class="e_msg">{{ $errors->first('body') }}</p>
            @endif
            <textarea name="body" id="body">{{ old('body') }}</textarea>

            <input type="submit" name="submit" value="送信" class="botton" id="submit">

        </form>
    </div>

    <table>

    <th>id</th>
    <th>name</th>
    <th>kana</th>
    <th>tel</th>
    <th>email</th>
    <th>body</th>
    <th>created_at</th>
    <th></th>
    <th></th>

    @foreach($contacts as $contact)

        <tr>
        <td class = "DB_td">{{$contact['id']}}</td>
        <td class = "DB_td">{{$contact['name']}}</td>
        <td class = "DB_td">{{$contact['kana']}}</td>
        <td class = "DB_td">{{$contact['tel']}}</td>
        <td class = "DB_td">{{$contact['email']}}</td>
        <td class = "DB_td">{{$contact['body']}}</td>
        <td class = "DB_td">{{$contact['created_at']}}</td>

        <td class = "td_a">
        <a class = "DB_edit" href = "{{route("edit", $contact['id'])}}">編集</a>
        </td>

        <td class = "td_a">
        <a class = "DB_delete btn-dell" href = "{{route("delete", $contact['id'])}}" >削除</a>
        </td>
        </tr>

    @endforeach

    </table>

    <footer id="footer">

        @include('footer')
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
    <script src="js/script.js"></script>

</body>

</html>

