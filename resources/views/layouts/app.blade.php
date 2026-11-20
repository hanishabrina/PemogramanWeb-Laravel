<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Portal Berita') — Laravel</title>
    <style>
        :root {
            --bg: #fefce8;             /* kuning sangat lembut untuk latar */
            --surface: #ffffff;        /* putih bersih untuk kartu */
            --text: #14261c;           /* hijau gelap hampir hitam agar tajam */
            --muted: #4b6356;          /* hijau keabu-abuan untuk teks sekunder */
            --green: #15803d;          /* hijau utama */
            --green-hover: #166534;    /* hijau lebih gelap saat hover */
            --green-soft: #dcfce7;     /* hijau muda lembut */
            --yellow: #eab308;         /* kuning aksen */
            --yellow-soft: #fef9c3;    /* kuning muda */
            --red: #dc2626;            /* merah aksen tegas */
            --red-hover: #b91c1c;      /* merah lebih gelap saat hover */
            --red-soft: #fee2e2;       /* merah muda lembut */
            --border: #e2e8d8;         /* garis batas halus */
            --radius: 12px;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, sans-serif;
            background: linear-gradient(180deg, #fefce8 0%, #f0fdf4 100%);
            color: var(--text);
            line-height: 1.55;
            min-height: 100vh;
        }

        a {
            color: var(--green);
            text-decoration: none;
            font-weight: 500;
        }

        a:hover {
            color: var(--red);
            text-decoration: underline;
        }

        .container {
            max-width: 980px;
            margin: 0 auto;
            padding: 1.5rem 1rem 3rem;
        }

        .nav {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            flex-wrap: wrap;
            background: var(--surface);
            padding: 0.75rem 1.25rem;
            border-radius: var(--radius);
            border: 1px solid var(--border);
            border-bottom: 3px solid var(--yellow);
            box-shadow: 0 2px 6px rgba(21, 128, 61, 0.06);
        }

        .nav a {
            color: var(--text);
            padding: 0.45rem 0.85rem;
            border-radius: 8px;
            font-weight: 500;
            text-decoration: none;
            transition: background 0.15s ease, color 0.15s ease;
        }

        .nav a:hover {
            background: var(--yellow-soft);
            color: var(--text);
        }

        .nav a.active {
            background: var(--green);
            color: #ffffff;
        }

        .nav .right {
            margin-left: auto;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .nav button {
            background: var(--red-soft);
            color: var(--red-hover);
            border: 1px solid #fecaca;
            padding: 0.4rem 0.85rem;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.15s ease, color 0.15s ease;
        }

        .nav button:hover {
            background: var(--red);
            color: #ffffff;
            border-color: var(--red);
        }

        .card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-top: 4px solid var(--green);
            border-radius: var(--radius);
            padding: 1.5rem;
            box-shadow: 0 2px 6px rgba(20, 38, 28, 0.05);
        }

        .muted {
            color: var(--muted);
        }

        .inline {
            display: inline;
        }

        .button {
            display: inline-block;
            background: var(--green);
            color: #ffffff;
            padding: 0.55rem 1rem;
            border-radius: 8px;
            border: none;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.15s ease, transform 0.1s ease;
        }

        .button:hover {
            background: var(--green-hover);
            color: #ffffff;
            text-decoration: none;
        }

        .button-accent {
            background: var(--yellow);
            color: var(--text);
        }

        .button-accent:hover {
            background: #ca8a04;
            color: #ffffff;
        }

        .button-danger {
            background: var(--red);
            color: #ffffff;
        }

        .button-danger:hover {
            background: var(--red-hover);
            color: #ffffff;
        }

        input[type="text"],
        input[type="url"],
        input[type="email"],
        input[type="password"],
        textarea {
            font-family: inherit;
            font-size: 0.95rem;
            transition: border-color 0.15s ease, box-shadow 0.15s ease;
        }

        input[type="text"]:focus,
        input[type="url"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus,
        textarea:focus {
            outline: none;
            border-color: var(--green) !important;
            box-shadow: 0 0 0 3px rgba(234, 179, 8, 0.35);
        }
    </style>
</head>
<body>
    <div class="container">
        @include('partials.nav')

        <main style="margin-top: 1.25rem;">
            @yield('content')
        </main>
    </div>
</body>
</html>