@php $input = 'w-full rounded-lg border border-slate-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-400'; $edit = isset($user); @endphp
@if ($errors->any())
    <div class="mb-4 rounded-lg bg-red-100 border border-red-300 text-red-800 px-4 py-3"><ul class="list-disc pl-5">@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
@endif
<div class="space-y-4">
    <div><label class="block text-sm font-medium mb-1">Nama</label><input name="name" value="{{ old('name', $user->name ?? '') }}" class="{{ $input }}" required></div>
    <div><label class="block text-sm font-medium mb-1">Email</label><input type="email" name="email" value="{{ old('email', $user->email ?? '') }}" class="{{ $input }}" required></div>
    <div>
        <label class="block text-sm font-medium mb-1">Role</label>
        <select name="role" class="{{ $input }}" required>
            @foreach ([1 => 'Admin (1)', 2 => 'User (2)'] as $v => $l)
                <option value="{{ $v }}" @selected((int) old('role', $user->role ?? 2) === $v)>{{ $l }}</option>
            @endforeach
        </select>
    </div>
    <div><label class="block text-sm font-medium mb-1">Password @if($edit)<span class="text-slate-400 font-normal">(kosongkan jika tidak diubah)</span>@endif</label><input type="password" name="password" class="{{ $input }}" @required(! $edit)></div>
    <div><label class="block text-sm font-medium mb-1">Konfirmasi Password</label><input type="password" name="password_confirmation" class="{{ $input }}" @required(! $edit)></div>
    <div class="flex gap-2">
        <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">Simpan</button>
        <a href="{{ route('user.index') }}" class="px-4 py-2 rounded-lg border border-slate-300 hover:bg-slate-50">Batal</a>
    </div>
</div>
