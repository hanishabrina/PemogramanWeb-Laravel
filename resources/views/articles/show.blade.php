@extends('layouts.app')

@section('title', $article->title)

@section('content')
<section class="card">
    <div style="margin-bottom: 1rem;">
        <a href="{{ route('articles.index') }}">&larr; Kembali ke Daftar Artikel</a>
    </div>

    <span style="display: inline-block; background: var(--yellow-soft); color: var(--text); border: 1px solid #fde047; padding: 0.2rem 0.65rem; border-radius: 999px; font-size: 0.78rem; font-weight: 700; margin-bottom: 0.5rem;">
        ARTIKEL
    </span>

    <h2 style="margin-top: 0; margin-bottom: 0.5rem;">{{ $article->title }}</h2>

    <p class="muted" style="margin-top: 0; margin-bottom: 1.25rem; font-size: 0.9rem;">
        Dipublikasikan pada {{ $article->created_at->format('d M Y H:i') }}
        oleh <strong style="color: var(--green);">{{ $article->user->name }}</strong>
    </p>

    @if ($article->image)
        <div style="margin-bottom: 1.5rem;">
            <img src="{{ $article->image }}"
                 alt="Gambar {{ $article->title }}"
                 style="max-width: 100%; height: auto; max-height: 400px; object-fit: cover; border-radius: 10px; border: 1px solid var(--border); border-bottom: 4px solid var(--yellow);">
        </div>
    @endif

    <div style="line-height: 1.7; white-space: pre-line; background: var(--bg); padding: 1.15rem; border-radius: 10px; border: 1px solid var(--border);">
        {{ $article->body }}
    </div>

    @can('update', $article)
    @if ($article->user_id === auth()->id())
        <div style="margin-top: 1.75rem; padding-top: 1rem; border-top: 1px solid var(--border); display: flex; gap: 0.65rem; flex-wrap: wrap;">
            <a href="{{ route('articles.edit', $article) }}" class="button">Edit Artikel</a>

            <form action="{{ route('articles.destroy', $article) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus artikel ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="button button-danger">Hapus Artikel</button>
            </form>
        </div>
    @endif
    @endcan
</section>
@endsection