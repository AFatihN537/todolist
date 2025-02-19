@extends('layouts.app')
@section('title', 'Dashboard')
@section('header', 'Dashboard')
@section('content')
    <h3 class="text-lg font-semibold mb-2">To-Do List Hari Ini: <strong>{{ $hariIni }} WIB</strong></h3>
    <form action="{{ route('todolist.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <input type="text" name="nama_tugas" class="bg-white w-full border px-3 py-1.5 rounded-md outline-gray-500 outline-1 -outline-offset-1 focus:outline-2 focus:-outline-offset-2 focus:outline-gray-900" placeholder="Tambahkan Tugas Baru" required>
        </div>
        <div class="mt-3 flex gap-2">
            <button type="submit" class="bg-[#fe3b72] text-white px-4 py-2 rounded-xl shadow-2xl hover:bg-[#ff5182] border-5 border-white ring-1 ring-gray-300">Tambah</button> 
            <a href="{{ route('todolist.history') }}" class="bg-gray-200 text-black px-4 py-2 rounded-xl hover:bg-gray-100 border-5 border-white ring-1 ring-gray-300 shadow-2xl">Lihat Riwayat To-Do List</a>
        </div>
    </form>
    <div class="relative rounded-md">
    <table class="w-full mt-6 border-collapse border table-auto border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border p-2">No</th>
                <th class="border p-2">Nama Tugas</th>
                <th class="border p-2">Status</th>
                <th class="border p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($todolists as $index => $todolist)
                <tr>
                    <td class="border p-2 text-center">{{ $index + 1 }}</td>
                    <td class="border p-2">{{ $todolist->nama_tugas }}</td>
                    <td class="border p-2">
                        <form action="{{ route('todolist.update', $todolist->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <select name="status_tugas" class="border px-3 py-1.5 rounded-md w-full outline-1 outline-gray-300 focus:outline-gray-900" onchange="this.form.submit()">
                                <option value="pending" {{ $todolist->status_tugas =='pending' ? 'selected' : '' }}>Pending</option>
                                <option value="completed" {{ $todolist->status_tugas =='completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                        </form>
                    </td>
                    <td class="border p-2">
                        <div class="gap-2 flex">
                            <a href="{{ route('todolist.edit', $todolist->id) }}" class="bg-gray-200 hover:bg-gray-100 text-black px-3 py-1 rounded-xl shadow-2xl border-5 border-white ring-1 ring-gray-300"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form action="{{ route('todolist.destroy', $todolist->id) }}" method="POST" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-[#cc0000] text-white px-3 py-1 rounded-xl shadow-2xl hover:bg-[#900000] border-5 border-white ring-1 ring-gray-300"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    <form action="{{ route('logout') }}" method="POST" class="mt-6 flex">
        @csrf
        <button type="submit" class="bg-[#cc1000] text-white px-4 py-2 rounded-xl shadow-2xl hover:bg-red-900 border-5 border-white ring-1 ring-gray-300">Logout</button>
    </form>
@endsection