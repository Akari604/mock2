<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>勤怠登録出勤前</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
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
            <div class="work-status">
                <p class="work-status_text">{{\App\Enums\Status::getDescription($status)}}</p>  
            </div>
            <div class="current-date_time">
                <p class="current-date">{{ $now_format }}</p>
                <p class="current-time">{{ $now_time }}</P>
            </div>
            <div class="work-time_button">
                @if($status === 1)
                <form class="time_button" action="/attendance/start/stamp" method="get" id="start-stamp_button">
                    @csrf
                    <button type="submit" class="going_button" id="show_btn">出勤</button>
                </form>
                @elseif($status === 2)
                <div class="work-time_middle">
                    <form class="time_button" action="/attendance/end/stamp" method="get" id="end-stamp_button">
                        @csrf
                        <button type="submit" class="out_button" id="show_btn">退勤</button>
                    </form>
                    <form class="time_button" action="/attendance/start/rest" method="get" id="start-rest_button">
                        @csrf
                        <button type="submit" class="break_button" id="show_btn">休憩</button>
                    </form>
                </div>
                @elseif($status === 3)
                <form class="time_button" action="/attendance/end/rest" method="get" id="end-rest_button">
                    @csrf
                    <button type="submit" class="end-break_button" id="show_btn">休憩戻</button>
                </form>
                @elseif($status === 4)
                <div class="good-job_text"> 
                    <p class="good-job">お疲れ様でした。</p>
                </div>
                @endif
            </div>
        </div>
    </main>
    <script> 
    </script>
</body>
</html>