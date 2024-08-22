<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fashionably Late</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <a class="header__logo" href="/">
                Contact
            </a>
        </div>
    </header>

    <main>
        @extends('layouts.app')

        @section('css')
        <link rel="stylesheet" href="{{ asset('css/index.css') }}">
        @endsection

        @section('content')
        <div class="contact-form__content">
            <div class="contact-form__heading">
                <h2>Contact</h2>
            </div>
            <form class="form" action="/contacts/confirm" method="post">
                @csrf
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">お名前</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--inline">
                            <input type="text" name="first_name" placeholder="例:山田" value="{{ old('first_name') }}" />
                        </div>
                        <div class="form__input--inline">
                            <input type="text" name="last_name" placeholder="例:太郎" value="{{ old('last_name') }}" />
                        </div>
                        @if ($errors->has('first_name') || $errors->has('last_name'))
                        <div class="form__error">
                            <div>{{ $errors->first('first_name') ?: $errors->first('last_name') }}</div>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">性別</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="radio2a" value="1" {{ old('gender') == 1 ? 'checked' : '' }}>
                        <label class="form-check-label" for="radio2a">1:男性</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="radio2b" value="2" {{ old('gender') == 2 ? 'checked' : '' }}>
                        <label class="form-check-label" for="radio2b">2:女性</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="radio2c" value="3" {{ old('gender') == 3 ? 'checked' : '' }}>
                        <label class="form-check-label" for="radio2c">3:その他</label>
                    </div>
                    @if ($errors->has('gender'))
                    <div class="form__error">
                        <div>{{ $errors->first('gender') }}</div>
                    </div>
                    @endif
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">メールアドレス</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text">
                            <input type="email" name="email" placeholder="例:test@example.com" value="{{ old('email') }}" />
                        </div>
                        @if ($errors->has('email'))
                        <div class="form__error">
                            <div>{{ $errors->first('email') }}</div>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">電話番号</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--inline">
                            <input type="tel" name="tel_first" placeholder="080" value="{{ old('tel_first') }}" />-
                        </div>
                        <div class="form__input--inline">
                            <input type="tel" name="tel_second" placeholder="1234" value="{{ old('tel_second') }}" />-
                        </div>
                        <div class="form__input--inline">
                            <input type="tel" name="tel_third" placeholder="5678" value="{{ old('tel_third') }}" />
                        </div>
                        @if ($errors->has('tel_first') || $errors->has('tel_second') || $errors->has('tel_third'))
                        <div class="form__error">
                            <div>{{ $errors->first('tel_first') ?: $errors->first('tel_second') ?: $errors->first('tel_third') }}</div>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">住所</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text">
                            <input type="text" name="address" placeholder="例:東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}" />
                        </div>
                        @if ($errors->has('address'))
                        <div class="form__error">
                            <div>{{ $errors->first('address') }}</div>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">建物名</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text">
                            <input type="text" name="building" placeholder="例:千駄ヶ谷マンション101" value="{{ old('building') }}" />
                        </div>
                    </div>
                </div>

                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">お問い合わせの種類</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text">
                            <select name="detail">
                                <option value="">選択してください</option>
                                <option value="1" {{ old('detail') == 1 ? 'selected' : '' }}>商品のお届けについて</option>
                                <option value="2" {{ old('detail') == 2 ? 'selected' : '' }}>商品の交換について</option>
                                <option value="3" {{ old('detail') == 3 ? 'selected' : '' }}>商品トラブル</option>
                                <option value="4" {{ old('detail') == 4 ? 'selected' : '' }}>ショップへのお問い合わせ</option>
                                <option value="5" {{ old('detail') == 5 ? 'selected' : '' }}>その他</option>
                            </select>
                        </div>
                        @if ($errors->has('detail'))
                        <div class="form__error">
                            <div>{{ $errors->first('detail') }}</div>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">お問い合わせ内容</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--textarea">
                            <textarea name="content" placeholder="お問い合わせ内容をご記載ください">{{ old('content') }}</textarea>
                        </div>
                        @if ($errors->has('content'))
                        <div class="form__error">
                            <div>{{ $errors->first('content') }}</div>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="form__footer">
                    <button type="submit" class="form__submit">確認画面へ</button>
                </div>
            </form>
        </div>
        @endsection
    </main>

    <footer class="footer">
        <div class="footer__inner">
            <small>&copy; 2024 Fashionably Late.</small>
        </div>
    </footer>
</body>

</html>