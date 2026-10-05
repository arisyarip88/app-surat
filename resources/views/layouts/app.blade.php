<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard') - APLIKASI NO SURAT LB</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 text-slate-800 min-h-screen">
@php
    $menu = [
        ['dashboard', 'Dashboard', 'dashboard', 'M3 12l9-9 9 9M5 10v10h5v-6h4v6h5V10'],
        ['surat.index', 'Daftar Surat', 'surat.*', 'M3 8l9 6 9-6M5 6h14a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2z'],
        ['Kode', 'kode.*', 'M7 7h.01M7 3h5l9 9a2 2 0 010 3l-5 5a2 2 0 01-3 0L4 11V6a3 3 0 013-3z', [['Kode 1', route('kode.index', 1), request()->routeIs('kode.*') && request()->route('jenis') == 1], ['Kode 2', route('kode.index', 2), request()->routeIs('kode.*') && request()->route('jenis') == 2], ['Kode 3', route('kode.index', 3), request()->routeIs('kode.*') && request()->route('jenis') == 3]]],
        ['Setting', 'setting.*', 'M10.3 4.3a1 1 0 011.4 0l.9.9a1 1 0 001 .3l1.2-.3a1 1 0 011.2.8l.2 1.2a1 1 0 00.7.8l1.1.5a1 1 0 01.5 1.3l-.5 1.1a1 1 0 000 1l.5 1.1a1 1 0 01-.5 1.3l-1.1.5a1 1 0 00-.7.8l-.2 1.2a1 1 0 01-1.2.8l-1.2-.3a1 1 0 00-1 .3l-.9.9a1 1 0 01-1.4 0l-.9-.9a1 1 0 00-1-.3l-1.2.3a1 1 0 01-1.2-.8l-.2-1.2a1 1 0 00-.7-.8l-1.1-.5a1 1 0 01-.5-1.3l.5-1.1a1 1 0 000-1l-.5-1.1a1 1 0 01.5-1.3l1.1-.5a1 1 0 00.7-.8l.2-1.2a1 1 0 011.2-.8l1.2.3a1 1 0 001-.3l.9-.9zM12 9a3 3 0 100 6 3 3 0 000-6z', [['Nomor', route('setting.index'), request()->routeIs('setting.*')]]],
    ];
    if (auth()->user()->isAdmin()) {
        $menu[] = ['user.index', 'Manajemen User', 'user.*', 'M17 20h5v-2a4 4 0 00-3-3.9M9 20H4v-2a4 4 0 013-3.9m6-4.1a4 4 0 11-8 0 4 4 0 018 0zm6 0a3 3 0 11-6 0 3 3 0 016 0z'];
    }
@endphp
<div id="overlay" class="fixed inset-0 bg-black/50 z-30 hidden lg:hidden"></div>
<aside id="sidebar" class="fixed inset-y-0 left-0 z-40 w-64 bg-slate-900 text-slate-300 transform -translate-x-full lg:translate-x-0 transition-transform flex flex-col">
    <div class="h-16 flex items-center gap-3 px-6 border-b border-slate-800">
        <div class="h-9 w-9 rounded-lg bg-indigo-600 flex items-center justify-center text-white font-bold">S</div>
        <span class="text-white font-semibold text-sm leading-tight">APLIKASI<br>NO SURAT LB</span>
    </div>
    <nav class="flex-1 p-4 space-y-1 overflow-y-auto">
        @foreach ($menu as $item)
            @if (is_array($item[3] ?? null))
                @php [$label, $pattern, $icon, $children] = $item; $open = request()->routeIs($pattern); @endphp
                <details class="group" @if($open) open @endif>
                    <summary class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm cursor-pointer list-none transition {{ $open ? 'text-white' : 'hover:bg-slate-800 hover:text-white' }}">
                        <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $icon }}"/></svg>
                        <span class="flex-1">{{ $label }}</span>
                        <svg class="h-4 w-4 transition-transform group-open:rotate-90" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" d="M9 5l7 7-7 7"/></svg>
                    </summary>
                    <div class="mt-1 ml-5 pl-3 border-l border-slate-700 space-y-1">
                        @foreach ($children as [$cl, $url, $active])
                            <a href="{{ $url }}" class="block px-3 py-2 rounded-lg text-sm transition {{ $active ? 'bg-indigo-600 text-white' : 'hover:bg-slate-800 hover:text-white' }}">{{ $cl }}</a>
                        @endforeach
                    </div>
                </details>
            @else
                @php [$route, $label, $pattern, $icon] = $item; @endphp
                <a href="{{ route($route) }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm transition {{ request()->routeIs($pattern) ? 'bg-indigo-600 text-white' : 'hover:bg-slate-800 hover:text-white' }}">
                    <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $icon }}"/></svg>
                    {{ $label }}
                </a>
            @endif
        @endforeach
    </nav>
    <div class="p-4 border-t border-slate-800 text-xs text-slate-500">&copy; {{ date('Y') }} APLIKASI NO SURAT LB</div>
</aside>

<div class="lg:pl-64 min-h-screen flex flex-col">
    <header class="h-16 bg-white shadow-sm flex items-center justify-between px-4 sm:px-6 sticky top-0 z-20">
        <div class="flex items-center gap-3">
            <button id="menuBtn" class="lg:hidden p-2 rounded hover:bg-slate-100" aria-label="Menu">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
            <h2 class="font-semibold text-slate-700">@yield('title', 'Dashboard')</h2>
        </div>
        <div class="flex items-center gap-3">
            <div class="hidden sm:block text-right leading-tight">
                <div class="text-sm font-medium">{{ auth()->user()->name }}</div>
                <div class="text-xs text-slate-500">{{ auth()->user()->email }}</div>
            </div>
            <div class="h-9 w-9 rounded-full bg-indigo-100 text-indigo-700 font-semibold flex items-center justify-center">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
            <form method="POST" action="{{ route('logout') }}">@csrf
                <button class="text-sm text-red-600 hover:bg-red-50 px-3 py-1.5 rounded-lg">Keluar</button>
            </form>
        </div>
    </header>
    <main class="flex-1 p-4 sm:p-6">
        @if (session('success'))
            <div class="mb-4 rounded-lg bg-green-100 border border-green-300 text-green-800 px-4 py-3">{{ session('success') }}</div>
        @endif
        @yield('content')
    </main>
</div>
<script>
    const sb = document.getElementById('sidebar'), ov = document.getElementById('overlay');
    const toggle = () => { sb.classList.toggle('-translate-x-full'); ov.classList.toggle('hidden'); };
    document.getElementById('menuBtn').addEventListener('click', toggle);
    ov.addEventListener('click', toggle);
</script>
</body>
</html>



