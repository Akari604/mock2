<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>勤怠登録出勤前</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/staff_list.css') }}" />
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
            <div class="main-content_staffs">
                <h2>スタッフ一覧</h2>
            </div>
            <div class="list-admin_content">
                <table class="admin-table">
                    <thead>
                        <tr class="top_ttl">
                            <th>名前</th>
                            <th>メールアドレス</th>
                            <th>月次勤怠</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr class="under_content">
                            <th>{{ $user->name }}</th>
                            <th>{{ $user->email }}</th>
                            <th><a href="/admin/attendance/staff/{{ $user->id }}" class="detail_button">詳細</a></th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>