<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員登録画面</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/register.css') }}" />
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
        <div class="register_content">
            <div class="register_content-heading">
                <h2>会員登録</h2>
            </div>
            <form class="register-form_group" action="/register" method="post">
                @csrf
                <div class="form_group">
                    <div class="form_group-ttl">
                        <span class="form_group-label">
                            名前
                        </span>
                    </div>
                    <div class="form__group-content">
                        <div class="form_input-text">
                            <input type="text" name="name" id="name" value="{{ old('name') }}" />
                        </div>
                        <div class="form__error">
                            @error('name')
                            {{ $message }} 
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form_group">
                    <div class="form_group-ttl">
                        <span class="form_group-label">
                            メールアドレス
                        </span>
                    </div>
                    <div class="form__group-content">
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
                    <div class="form_group-ttl">
                        <span class="form_group-label">
                            パスワード
                        </span>
                    </div>
                    <div class="form__group-content">
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
                <div class="form_group">
                    <div class="form_group-ttl">
                        <span class="form_group-label">
                            パスワード確認
                        </span>
                    </div>
                    <div class="form__group-content">
                        <div class="form_input-text">
                            <input type="password" name="password_confirmation" id="password_confirmation" value="{{ old('password_confirmation') }}" />
                        </div>
                        <div class="form__error">
                            @error('password_confirmation')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form_button">
                    <button class="form_button-submit" type="submit">登録する</button>
                </div>
            </form>
            <div class="login_link">
                <a class="login_button-submit" href="/login">ログインはこちら</a>
            </div>
        </div>
    </main>   
</body>
</html>