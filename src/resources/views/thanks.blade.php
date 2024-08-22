<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Form</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/thanks.css') }}" />
    <style>
        .watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 60px;
            color: rgba(0, 0, 0, 0.1);
            pointer-events: none;
            z-index: 1;
        }

        .container {
            position: relative;
            text-align: center;
            padding: 50px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="watermark">Fashionably Late</div>
        <h2>お問い合わせありがとうございました</h2>
        <a href="/" class="form__button-submit">HOME</a>
    </div>
</body>

</html>