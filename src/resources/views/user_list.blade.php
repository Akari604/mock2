<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>勤怠一覧画面</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/user_list.css') }}" />
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
                <a href="/stamp_correction_request/list" class="top_button">
                    申請
                </a>
                <form class="logout_button">
                    <button class="logout_button">ログアウト</button>
                </form>
            </div>
        </div>
    </header>
    <main class="main">
        <div class="main-content">
            <div class="main-content_list">
                <h2>勤怠一覧</h2>
            </div>
            <div class="mian-content_date">
                <a href="{{ url()->current() . '?year=' . $previous_month->format('Y') . '&month=' . $previous_month->format('m') }}" class="previous">← 前日</a>
                <p class="calender">{{ $this_month }}</p>
                <a href="{{ url()->current() . '?year=' . $next_month->format('Y') . '&month=' . $next_month->format('m') }}" class="next">翌日 →</a>
            </div>
            <div class="list-attendance_content">
                <table class="attendance-table">
                    <thead>
                        <tr class="top_ttl">
                            <th>日付</th>
                            <th>出勤</th>
                            <th>退勤</th>
                            <th>休憩</th>
                            <th>合計</th>
                            <th>詳細</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user_attendance as $stamp)
                        <tr class="under_content">
                            <th>{{ $stamp->stamp_date }}</th>
                            <th>{{ $stamp->start_work }}</th>
                            <th>{{ $stamp->end_work }}</th>
                            <th></th>
                            <th></th>
                            <th><a href="/attendance/{{ $stamp->id }}" class="detail_button">詳細</a></th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>