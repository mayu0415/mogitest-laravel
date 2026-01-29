<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>マイページ</title>
    <link rel="stylesheet" href="{{ asset('css/header-auth.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
</head>
<body>
    
    @include('header-auth')
    <main class="profile">
        <section class="profile__top">
            <div class="profile__user">
                <div class="profile__avatar">
                    @php
                        $hasImage = !empty($user->profile_image);
                    @endphp
                    @if($hasImage)
                        <img class="profile__avatar-img" src="{{ asset($user->profile_image) }}" alt="ユーザーアイコン">
                    @else
                        <div class="profile__avatar-placeholder"></div>
                    @endif
                </div>
                <div class="profile__name">
                    {{ $user->name ?? 'ユーザー名' }}
                </div>
            </div>
            <div class="profile__edit">
                <a href="{{ route('profile.edit') }}" class="profile__edit-button">
                    プロフィールを編集
                </a>
            </div>
        </section>
        
        <section class="profile__tabs">
            <a
                href="{{ route('mypage', ['page' => 'sell']) }}"
                class="profile__tab {{ ($tab ?? 'sell') === 'sell' ? 'is-active' : '' }}"
            >
                出品した商品
            </a>
            <a
                href="{{ route('mypage', ['page' => 'buy']) }}"
                class="profile__tab {{ ($tab ?? 'sell') === 'buy' ? 'is-active' : '' }}"
            >
                購入した商品
            </a>
        </section>
        <section class="profile__content">
            {{-- 商品一覧 --}}
            @if(isset($items) && $items->count() > 0)
                <div class="items">
                    @foreach($items as $item)
                        <a href="{{ route('item', ['item' => $item->id]) }}" class="item-card">
                            <div class="item-card__image">
                                @if($item->image_path)
                                    <img src="{{ asset($item->image_path) }}" alt="商品画像">
                                @else
                                    <div class="item-card__placeholder">商品画像</div>
                                @endif
                            </div>

                            <div class="item-card__name">
                                {{ $item->name }}
                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                {{-- ダミー表示 --}}
                <div class="items">
                    @for($i = 0; $i < 8; $i++)
                        <div class="item-card">
                            <div class="item-card__image">
                                <div class="item-card__placeholder">商品画像</div>
                            </div>
                            <div class="item-card__name">商品名</div>
                        </div>
                    @endfor
                </div>
            @endif
        </section>
    </main>
</body>
</html>










