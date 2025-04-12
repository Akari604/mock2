<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>勤怠登録出勤前</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/admin_detail.css') }}" />
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
                <form class="logout_button">
                    <button class="logout_button">ログアウト</button>
                </form>
            </div>
        </div>
    </header>
    <main class="main">
        <div class="main-content">
            <div class="main-content_detail">
                <h2>勤怠詳細a</h2>
            </div>
            <form class="form" action="/admin/attendance/list" method="post">
                @csrf
                <div class="confirm-table">
                    <table class="confirm-table__inner">
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">名前</th>
                            <td class="confirm-table__text">
                                <div class="row">
                                    <div class="col">
                                        <input type="text" name="last_name" value=""/>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">日付</th>
                            <td class="confirm-table__text">
                                <input type="date" name="date" value="" readonly />
                                <input type="date" name="date" value="" readonly />
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="form__button">
                    <button class="form__button-submit" type="submit">修正</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>