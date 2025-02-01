<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー申請一覧画面</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/user_request.css') }}" />
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
            <div class="main-content_request">
                <h2>申請一覧</h2>
            </div>
            <div class="main-content_button">
                <h3 class="approve_button">承認待ち</h3>
                <h3 class="approve_button">承認済み</h3>
            </div>
            <div class="main-condition">
                <div class="main-condition_content">
                </div>
            </div>
        </div>
</body>
</html>