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
            <div class="form_group">
                <div class="form_group-title">
                    <p>ご登録していただいたメールアドレスに認証メールを送付しました。</p>
                    <p>メール認証を完了してください。</p>
                </div>
                <div class="certification_button">
                    <form action="/email/verify/{id}/{hash}" class="link-certification" method="get"> 
                        @csrf
                        <button class="button-certification"  type="submit">認証はこちら</button>
                    </form>
                </div>
                <div class="resend_email">
                    <form action="/email/verification-notification" class="link-resend_email" method="post"> 
                        @csrf
                        <button class="button-resend_email" type="sibmit">認証メールを再送する</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>