@extends('layouts.app')

@section('title', 'Daftar Artikel')

@section('content')
<section class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; gap: 0.75rem; flex-wrap: wrap; margin-bottom: 1rem;">
        <h2 style="margin: 0;">Daftar Artikel</h2>
        <a href="{{ route('articles.create') }}" class="button">+ Tambah Artikel</a>
    </div>

    @if (session('success'))
        <div style="background: var(--green-soft); color: var(--green-hover); border: 1px solid #86efac; border-left: 4px solid var(--green); padding: 0.75rem 1rem; border-radius: 8px; margin-bottom: 1rem; font-weight: 500;">
            {{ session('success') }}
        </div>
    @endif

    @if ($articles->isNotEmpty())
        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; text-align: left;">
                <thead>
                    <tr style="background: var(--yellow-soft); border-bottom: 2px solid var(--yellow);">
                        <th style="padding: 0.75rem; border-top-left-radius: 8px;">Judul</th>
                        <th style="padding: 0.75rem;">Penulis</th>
                        <th style="padding: 0.75rem;">Tanggal</th>
                        <th style="padding: 0.75rem; text-align: right; border-top-right-radius: 8px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($articles as $article)
                        <tr style="border-bottom: 1px solid var(--border); transition: background 0.15s ease;"
                            onmouseover="this.style.background='#fefce8'"
                            onmouseout="this.style.background='transparent'">
                            <td style="padding: 0.75rem;">
                                <a href="{{ route('articles.show', $article) }}">{{ $article->title }}</a>
                            </td>
                            <td style="padding: 0.75rem;" class="muted">{{ $article->user->name }}</td>
                            <td style="padding: 0.75rem;" class="muted">{{ $article->created_at->format('d M Y') }}</td>
                            <td style="padding: 0.75rem; text-align: right; white-space: nowrap;">
                                <a href="{{ route('articles.show', $article) }}">Detail</a>

                                @can('update', $article)
                                @if ($article->user_id === auth()->id())
                                    <span class="muted"> | </span>
                                    <a href="{{ route('articles.edit', $article) }}">Edit</a>
                                    <span class="muted"> | </span>
                                    <form action="{{ route('articles.destroy', $article) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus artikel ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="background: var(--red-soft); color: var(--red-hover); border: 1px solid #fecaca; border-radius: 6px; padding: 0.2rem 0.55rem; font-size: 0.85rem; font-weight: 600; cursor: pointer;">
                                            Hapus
                                        </button>
                                    </form>
                                @endif
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div style="margin-top: 1rem;">
            {{ $articles->links() }}
        </div>
    @else
        <p class="muted" style="margin: 0;">Belum ada artikel yang tersedia.</p>
    @endif
</section>
@endsection