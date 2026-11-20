@extends('layouts.app')

@section('title', 'Home')

@section('content')
<section class="card" style="border-top: 4px solid var(--yellow); background: linear-gradient(135deg, #ffffff 0%, #fefce8 65%, #dcfce7 100%);">
    <span style="display: inline-block; background: var(--red-soft); color: var(--red-hover); border: 1px solid #fecaca; padding: 0.2rem 0.65rem; border-radius: 999px; font-size: 0.78rem; font-weight: 700; margin-bottom: 0.5rem;">
        TERKINI
    </span>
    <h2 style="margin: 0 0 0.4rem 0;">Portal Berita Sederhana</h2>
    <p style="margin: 0 0 0.75rem 0;">
        Selamat datang di portal berita sederhana berbasis Laravel. Berita di bawah ini diambil dari tabel <code>articles</code>.
    </p>

    @guest
        <p class="muted" style="margin: 0;">
            Kamu belum login. Untuk mengelola berita, silakan
            <a href="{{ route('login') }}">Login</a> atau
            <a href="{{ route('register') }}">Register</a>.
        </p>
    @endguest

    @auth
        <p class="muted" style="margin: 0;">
            Kamu login sebagai <strong>{{ auth()->user()->name }}</strong>.
            Kamu dapat menambah berita di menu <a href="{{ route('articles.index') }}">Artikel</a>.
        </p>
    @endauth
</section>

<section class="card" style="margin-top: 1.25rem;">
    <h3 style="margin-top: 0; margin-bottom: 1rem;">Berita Terbaru</h3>

    @if ($articles->isNotEmpty())
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(270px, 1fr)); gap: 1rem;">
            @foreach ($articles as $article)
                <article style="border: 1px solid var(--border); border-radius: 10px; overflow: hidden; background: var(--surface); display: flex; flex-direction: column;">
                    <img src="{{ $article->image_url }}"
                         alt="Gambar {{ $article->title }}"
                         style="width: 100%; height: 165px; object-fit: cover; border-bottom: 3px solid var(--yellow);">

                    <div style="padding: 1rem; display: flex; flex-direction: column; flex: 1;">
                        <h4 style="margin: 0 0 0.3rem 0;">
                            <a href="{{ route('articles.show', $article) }}">
                                {{ $article->title }}
                            </a>
                        </h4>
                        <p class="muted" style="margin: 0 0 0.6rem 0; font-size: 0.82rem;">
                            {{ $article->created_at->format('d M Y') }} &bull; {{ $article->user->name }}
                        </p>
                        <p style="margin: 0 0 0.9rem 0; font-size: 0.92rem; flex: 1;">
                            {{ \Illuminate\Support\Str::limit($article->body, 120) }}
                        </p>
                        <a href="{{ route('articles.show', $article) }}" style="font-size: 0.9rem;">
                            Baca selengkapnya &rarr;
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
    @else
        <p class="muted" style="margin: 0;">Belum ada berita yang tersedia.</p>
        @auth
            <p class="muted" style="margin: 0.4rem 0 0 0;">
                Silakan buat berita baru di menu <a href="{{ route('articles.create') }}">Tambah Artikel</a>.
            </p>
        @endauth
    @endif
</section>
@endsection