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
                <h2>{{ $thisMonth->format('Y年m月d日') }}の勤怠</h2>
            </div>
            <div class="mian-content_date">
                <a href="{{ url()->current() . '?year=' . $previousMonth->format('Y') . '&month=' . $previousMonth->format('m') }}" class="previous">← 前日</a>
                <p class="calender">{{ $thisMonth }}</p>
                <a href="{{ url()->current() . '?year=' . $nextMonth->format('Y') . '&month=' . $nextMonth->format('m') }}" class="next">翌日 →</a>
            </div>
        </div>
        <div class="list-attendance_content">
            <table class="attendance-table">
                <thead>
                    <tr class="top_ttl">
                        <th>名前</th>
                        <th>出勤</th>
                        <th>退勤</th>
                        <th>休憩</th>
                        <th>合計</th>
                        <th>詳細</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($stamps as $stamp)
                    <tr class="under_content">
                        <th>{{ $stamp->name }}</th>
                        <th>{{ $stamp->start_work }}</th>
                        <th>{{ $stamp->end_work }}</th>
                        <th></th>
                        <th></th>
                        <th><a class="detail_button">詳細</a></th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </main>
</body>
</html>