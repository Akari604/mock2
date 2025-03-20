<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>勤怠登録出勤前</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/admin_list.css') }}" />
</head>
<body>
    <header class="header">
        <div class="header-content">
            <div class="header-ttl">
                <img src="{{ asset('storage/images/logo.png') }}" alt="COACHTECH" width="300px">
            </div>
            <div class="header-button">
                <a href="/admin/attendance/list" class="top_button">
                    勤怠一覧
                </a>
                <a href="/admin/staff/list" class="top_button">
                    スタッフ一覧
                </a>
                <a href="/stamp_correction_request/list" class="top_button">
                    申請一覧
                </a>
                <form action="/admin/logout" class="logout_button" method="post">
                    @csrf
                    <button class="logout_button">ログアウト</button>
                </form>
            </div>
        </div>
    </header>
    <main class="main">
        <div class="main-content">
            <div class="main-content_list">
                <h2>の勤怠</h2>
            </div>
            <div class="mian-content_date">
                <form action="">
                <button onclick="back()">← 前日</button>
                <p class="calender">{{ $thisMonth }}</p>
                <button onclick="next()">翌日 →</button>
            </div>
        </div>
    </main>
</body>
</html>