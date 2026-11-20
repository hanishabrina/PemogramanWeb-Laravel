@extends('layouts.app')

@section('title', 'Tambah Artikel')

@section('content')
<section class="card" style="max-width: 720px; margin: 0 auto; border-top-color: var(--yellow);">
    <div style="margin-bottom: 1rem;">
        <a href="{{ route('articles.index') }}">&larr; Kembali ke Daftar Artikel</a>
    </div>

    <h2 style="margin-top: 0; margin-bottom: 1.25rem;">Tambah Artikel Baru</h2>

    @if ($errors->any())
        <div style="background: var(--red-soft); color: var(--red-hover); border: 1px solid #fecaca; border-left: 4px solid var(--red); padding: 0.75rem 1rem; border-radius: 8px; margin-bottom: 1.15rem;">
            <ul style="margin: 0; padding-left: 1.25rem;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('articles.store') }}" method="POST">
        @csrf

        <div style="margin-bottom: 1rem;">
            <label for="title" style="display: block; font-weight: 600; margin-bottom: 0.35rem;">Judul Artikel</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required
                   style="width: 100%; padding: 0.55rem 0.75rem; border: 1px solid var(--border); border-radius: 8px; background: var(--surface);">
        </div>

        <div style="margin-bottom: 1rem;">
            <label for="image" style="display: block; font-weight: 600; margin-bottom: 0.35rem;">URL Gambar (Opsional)</label>
            <input type="url" id="image" name="image" value="{{ old('image') }}" placeholder="https://example.com/image.jpg"
                   style="width: 100%; padding: 0.55rem 0.75rem; border: 1px solid var(--border); border-radius: 8px; background: var(--surface);">
        </div>

        <div style="margin-bottom: 1.5rem;">
            <label for="body" style="display: block; font-weight: 600; margin-bottom: 0.35rem;">Isi Artikel</label>
            <textarea id="body" name="body" rows="8" required
                      style="width: 100%; padding: 0.55rem 0.75rem; border: 1px solid var(--border); border-radius: 8px; background: var(--surface);">{{ old('body') }}</textarea>
        </div>

        <div style="display: flex; gap: 0.65rem; flex-wrap: wrap;">
            <button type="submit" class="button">Simpan Artikel</button>
            <a href="{{ route('articles.index') }}" class="button button-accent">Batal</a>
        </div>
    </form>
</section>
@endsection