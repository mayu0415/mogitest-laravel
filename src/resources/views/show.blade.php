<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品詳細</title>

    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/item.css') }}">
</head>
<body>
    @auth
        @include('partials.header-auth')
    @else
        @include('partials.header-guest')
    @endauth

    <main class="item-detail">

        <section class="item-detail__top">
            <div class="item-detail__image">
                @if($item->image_path)
    <img src="{{ asset($item->image_path) }}" alt="{{ $item->name }}">
                @else
                    <div class="item-detail__placeholder">商品画像</div>
                @endif
            </div>
            <div class="item-detail__info">
                <h1 class="item-detail__name">{{ $item->name }}</h1>

                @if($item->brand)
                    <p class="item-detail__brand">{{ $item->brand }}</p>
                @endif

                <p class="item-detail__price">
                    ¥{{ number_format($item->price) }} <span>(税込)</span>
                </p>

                <div class="item-detail__icons">
                    <span class="icon">♡ {{ $item->likes->count() }}</span>
                <span class="icon"> {{ $item->comments->count() }}</span>
                </div>

                <button class="item-detail__buy">
                    購入手続きへ
                </button>
            </div>
        </section>

        <section class="item-detail__description">
            <h2>商品説明</h2>
            <p>{{ $item->description }}</p>
        </section>

            <section class="item-detail__data">
            <h2>商品の情報</h2>

                <p>
                カテゴリ：
                @forelse($item->categories as $category)
                    <span class="item-tag">{{ $category->name }}</span>
                @empty
                    <span class="item-tag item-tag--none">未分類</span>
                @endforelse
                </p>

            <p>
                商品の状態：{{ $item->condition }}
            </p>
        </section>


        <section class="item-detail__comments">
            <h2>コメント（{{ $item->comments->count() }}）</h2>
            @foreach($item->comments as $comment)
                <div class="comment">
                    <div class="comment__user">
                        {{ $comment->user->name }}
                    </div>
                    <div class="comment__content">
                         {{ $comment->content }}
                </div>
                </div>
            @endforeach
        </section>
        {{-- コメント投稿（後で実装） --}}
        @auth
        <section class="item-detail__comment-form">
        <h2>商品へのコメント</h2>
            <textarea placeholder="コメントを入力してください"></textarea>
            <button>コメントを送信する</button>
        </section>
        @endauth
    </main>

</body>
</html>