<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン画面</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/admin_login.css') }}" />
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
                <h2>ログイン</h2>
            </div>
            <form class="login-form_group" action="/admin_login" method="post">
                @csrf
                <div class="form_group">
                    <div class="form_group-title">
                        <span class="form_group-label">
                            メールアドレス
                        </span>
                    </div>
                    <div class="form_group-content">
                        <div class="form_input-text">
                            <input type="email" name="email" id="email" value="{{ old('email') }}" />
                        </div>
                        <div class="form__error">
                            @error('email')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form_group">
                    <div class="form_group-title">
                        <span class="form_group-label">
                            パスワード
                        </span>
                    </div>
                    <div class="form_group-content">
                        <div class="form_input-text">
                            <input type="password" name="password" id="password" value="{{ old('password') }}" />
                        </div>
                        <div class="form__error">
                            @error('password')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form_button">
                    <button class="form_button-submit" type="submit">管理者ログインする</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>