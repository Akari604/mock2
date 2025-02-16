<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>メール認証画面</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/verify_email.css') }}" />
</head>
<body>
    <header class="header">
        <div class="header-content">
            <div class="header-ttl">
                <img src="{{ asset('storage/images/logo.png') }}" alt="COACHTECH" width="300px">
            </div>
        </div>
    </header>
    <main>
        <div class="login_content">
            <div class="login_content-heading">
                <h2>ご登録ありがとうございます。</h2>
            </div>
            <div class="form_group">
                <div class="form_group-title">
                    <p>ご入力いただいたメールアドレスへ認証リンクを送信しましたので、クリックして認証を完了させてください。</p>
                </div>
            </div>
        </div>
    </main>
</body>
</html>