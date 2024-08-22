<!-- resources/views/login.blade.php -->
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <a class="header__logo" href="/">
                Fashionably Late
            </a>
        </div>
    </header>

    <main>
        <div class="login-form__content">
            <div class="login-form__heading">
                <h2>ログイン</h2>
            </div>
            <form class="form" action="{{ route('login') }}" method="post">
                @csrf
                <div class="form__group">
                    <label for="email">メールアドレス:</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required>
                </div>
                <div class="form__group">
                    <label for="password">パスワード:</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div class="form__group">
                    <label>
                        <input type="checkbox" name="remember"> ログイン状態を保持する
                    </label>
                </div>
                <div class="form__button">
                    <button type="submit">ログイン</button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>