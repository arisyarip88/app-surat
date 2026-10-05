@extends('layouts.app')
@section('title', 'Manajemen User')
@section('content')
@if ($errors->any())
    <div class="mb-4 rounded-lg bg-red-100 border border-red-300 text-red-800 px-4 py-3">{{ $errors->first() }}</div>
@endif
<div class="flex flex-wrap gap-2 mb-4">
    <form method="GET" class="flex flex-1 gap-2">
        <input name="q" value="{{ request('q') }}" placeholder="Cari nama / email..." class="flex-1 rounded-lg border border-slate-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-400">
        <button class="bg-slate-700 text-white px-4 py-2 rounded-lg">Cari</button>
    </form>
    <a href="{{ route('user.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">+ Tambah User</a>
</div>
<div class="bg-white rounded-xl shadow-sm overflow-x-auto">
    <table class="w-full text-sm text-left">
        <thead class="bg-slate-50 text-slate-600 uppercase text-xs"><tr><th class="px-4 py-3">Nama</th><th class="px-4 py-3">Email</th><th class="px-4 py-3">Role</th><th class="px-4 py-3 text-right">Aksi</th></tr></thead>
        <tbody class="divide-y">
        @forelse ($users as $u)
            <tr class="hover:bg-slate-50">
                <td class="px-4 py-3 font-medium">{{ $u->name }}</td>
                <td class="px-4 py-3">{{ $u->email }}</td>
                <td class="px-4 py-3">
                    <span class="px-2 py-0.5 rounded-full text-xs {{ $u->isAdmin() ? 'bg-indigo-100 text-indigo-700' : 'bg-slate-100 text-slate-600' }}">{{ $u->isAdmin() ? 'Admin (1)' : 'User (2)' }}</span>
                </td>
                <td class="px-4 py-3 text-right whitespace-nowrap">
                    <a href="{{ route('user.edit', $u) }}" class="text-amber-600 hover:underline">Edit</a>
                    <form method="POST" action="{{ route('user.destroy', $u) }}" class="inline" onsubmit="return confirm('Hapus user ini?')">@csrf @method('DELETE')<button class="text-red-600 hover:underline ml-2">Hapus</button></form>
                </td>
            </tr>
        @empty
            <tr><td colspan="4" class="px-4 py-8 text-center text-slate-500">Belum ada user.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
<div class="mt-4">{{ $users->links() }}</div>
@endsection
