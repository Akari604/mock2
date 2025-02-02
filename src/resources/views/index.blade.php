<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>勤怠登録出勤前</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
</head>
<body>
    <header class="header">
        <div class="header-content">
            <div class="header-ttl">
                <img src="{{ asset('storage/images/logo.png') }}" alt="COACHTECH" width="300px">
            </div>
            <div class="header-button">
                <a href="/attendance" class="top_button">
                    勤怠
                </a>
                <a href="/attendance/list" class="top_button">
                    勤怠一覧
                </a>
                @if (Auth::check())
                    <a href="/stamp_correction_request/list" class="top_button">
                        申請
                    </a>
                    <form action="/logout" class="logout_button" method="post">
                    @csrf
                        <button class="logout_button">ログアウト</button>
                    </form>
                @endif
            </div>
        </div>
    </header>
    <main class="main">
        <div class="main-content">
            <div class="">
</body>
</html>