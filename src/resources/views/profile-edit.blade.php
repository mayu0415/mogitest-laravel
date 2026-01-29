<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>プロフィール設定</title>

    <link rel="stylesheet" href="{{ asset('css/header-auth.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile-edit.css') }}">
</head>
<body>

@include('header-auth')

<main class="profile">
    <h1 class="profile__title">プロフィール設定</h1>

    <div class="profile__image">
        <div class="profile__circle"></div>
        <button class="profile__image-button">画像を選択する</button>
    </div>

    <form method="POST" action="{{ route('profile.update') }}" class="profile__form">
        @csrf
        <label>ユーザー名</label>
        <input type="text">

        <label>郵便番号</label>
        <input type="text">

        <label>住所</label>
        <input type="text">

        <label>建物名</label>
        <input type="text">

        <button class="profile__submit">更新する</button>
    </form>
</main>

</body>
</html>







