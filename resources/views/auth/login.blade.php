<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - APLIKASI NO SURAT LB</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gradient-to-br from-indigo-600 via-indigo-700 to-slate-900 flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <div class="text-center text-white mb-6">
            <div class="mx-auto mb-3 h-14 w-14 rounded-2xl bg-white/15 flex items-center justify-center">
                <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l9 6 9-6M5 6h14a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2z"/></svg>
            </div>
            <h1 class="text-2xl font-bold">APLIKASI NO SURAT LB</h1>
            <p class="text-indigo-200 text-sm">Silakan masuk untuk melanjutkan</p>
        </div>
        <form method="POST" action="{{ route('login') }}" class="bg-white rounded-2xl shadow-2xl p-8 space-y-5">
            @csrf
            @if ($errors->any())
                <div class="rounded-lg bg-red-50 border border-red-200 text-red-700 text-sm px-4 py-3">{{ $errors->first() }}</div>
            @endif
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" autofocus required class="w-full rounded-lg border border-slate-300 px-3 py-2.5 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Password</label>
                <input type="password" name="password" required class="w-full rounded-lg border border-slate-300 px-3 py-2.5 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>
            <label class="flex items-center gap-2 text-sm text-slate-600">
                <input type="checkbox" name="remember" class="rounded border-slate-300 text-indigo-600"> Ingat saya
            </label>
            <button class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2.5 rounded-lg transition">Masuk</button>
        </form>
    </div>
</body>
</html>

