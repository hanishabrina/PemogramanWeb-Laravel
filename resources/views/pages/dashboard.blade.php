@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<section class="card">
    <h2 style="margin-top: 0; margin-bottom: 0.35rem;">Dashboard</h2>
    <p class="muted" style="margin-top: 0;">Selamat datang kembali, <strong style="color: var(--text);">{{ $user->name }}</strong>!</p>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 1rem; margin-top: 1.25rem;">
        <div style="background: var(--yellow-soft); border: 1px solid #fde047; border-left: 5px solid var(--yellow); border-radius: 10px; padding: 1.15rem;">
            <h4 style="margin: 0 0 0.4rem 0; color: var(--muted); font-size: 0.9rem;">Total Artikel di Sistem</h4>
            <p style="font-size: 1.85rem; font-weight: 700; margin: 0; color: var(--text);">{{ $totalArticles }}</p>
        </div>

        <div style="background: var(--green-soft); border: 1px solid #86efac; border-left: 5px solid var(--green); border-radius: 10px; padding: 1.15rem;">
            <h4 style="margin: 0 0 0.4rem 0; color: var(--green-hover); font-size: 0.9rem;">Artikel Milik Saya</h4>
            <p style="font-size: 1.85rem; font-weight: 700; margin: 0; color: var(--green-hover);">{{ $myArticles }}</p>
        </div>
    </div>
</section>

<section class="card" style="margin-top: 1.25rem; border-top-color: var(--yellow);">
    <h3 style="margin-top: 0; margin-bottom: 0.85rem;">Artikel Terbaru di Sistem</h3>

    @if ($latestArticles->isNotEmpty())
        <ul style="list-style: none; padding: 0; margin: 0;">
            @foreach ($latestArticles as $article)
                <li style="padding: 0.65rem 0.25rem; border-bottom: 1px solid var(--border); display: flex; justify-content: space-between; align-items: center; gap: 0.75rem; flex-wrap: wrap;">
                    <a href="{{ route('articles.show', $article) }}">{{ $article->title }}</a>
                    <span style="background: var(--bg); border: 1px solid var(--border); padding: 0.2rem 0.6rem; border-radius: 999px; font-size: 0.8rem;" class="muted">
                        {{ $article->user->name }}
                    </span>
                </li>
            @endforeach
        </ul>
    @else
        <p class="muted" style="margin: 0;">Belum ada artikel.</p>
    @endif
</section>
@endsection