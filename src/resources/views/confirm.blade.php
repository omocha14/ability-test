    <main>
        <div class="confirm__content">
            <div class="confirm__heading">
                <h2>お問い合わせ内容確認</h2>
            </div>
            <form class="form" action="/contacts" method="post">
                @csrf
                <div class="form-group">
                    <label>お名前:</label>
                    <p>{{ $data['first_name'] }} {{ $data['last_name'] }}</p>
                    <input type="hidden" name="first_name" value="{{ $data['first_name'] }}">
                    <input type="hidden" name="last_name" value="{{ $data['last_name'] }}">
                </div>
                <div class="form-group">
                    <label>性別:</label>
                    <p>{{ $data['gender'] }}</p>
                    <input type="hidden" name="gender" value="{{ $data['gender'] }}">
                </div>
                <div class="form-group">
                    <label>メールアドレス:</label>
                    <p>{{ $data['email'] }}</p>
                    <input type="hidden" name="email" value="{{ $data['email'] }}">
                </div>
                <div class="form-group">
                    <label>電話番号:</label>
                    <p>{{ $data['tel_first'] }}-{{ $data['tel_second'] }}-{{ $data['tel_third'] }}</p>
                    <input type="hidden" name="tel_first" value="{{ $data['tel_first'] }}">
                    <input type="hidden" name="tel_second" value="{{ $data['tel_second'] }}">
                    <input type="hidden" name="tel_third" value="{{ $data['tel_third'] }}">
                </div>
                <div class="form-group">
                    <label>住所:</label>
                    <p>{{ $data['address'] }}</p>
                    <input type="hidden" name="address" value="{{ $data['address'] }}">
                </div>
                <div class="form-group">
                    <label>建物名:</label>
                    <p>{{ $data['building'] }}</p>
                    <input type="hidden" name="building" value="{{ $data['building'] }}">
                </div>
                <div class="form-group">
                    <label>お問い合わせの種類:</label>
                    <p>{{ $data['detail'] }}</p>
                    <input type="hidden" name="detail" value="{{ $data['detail'] }}">
                </div>
                <div class="form-group">
                    <label>お問い合わせ内容:</label>
                    <p>{{ $data['content'] }}</p>
                    <input type="hidden" name="content" value="{{ $data['content'] }}">
                </div>
                <div class="form__button">
                    <button type="submit">送信</button>
                </div>
            </form>
        </div>
    </main>
    </body>

    </html>