@extends('layouts.app')
@section('title', 'Riwayat To-Do List')
@section('header', 'Riwayat To-Do List')
@section('content')
    <p>Berikut semua tugas yang pernah Anda buat.</p>
    <table class="w-full mt-6 border-collapse border table-auto border-gray-300">
        <thead class="bg-gray-200">
            <tr>
                <th class="border p-2">No</th>
                <th class="border p-2">Nama Tugas</th>
                <th class="border p-2">Status</th>
                <th class="border p-2">Waktu Dibuat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($todolists as $index => $todolist)
                <td class="border p-2">{{ $index+1 }}</td>
                <td class="border p-2">{{ $todolist->nama_tugas }}</td>
                <td class="border p-2">
                    @if ($todolist->status_tugas == 'pending')
                        <span class="inline-block px-2 py-1 text-xs font-semibold text-black bg-yellow-500 rounded-full">Pending</span>
                    @else
                        <span class="inline-block px-2 py-1 text-xs font-semibold text-white bg-green-500 rounded-full">Completed</span>
                    @endif
                </td>
                <td class="border p-2">{{ \Carbon\Carbon::parse($todolist->created_at)->translatedFormat('l, d F Y H:i:s') }} WIB</td>
            @endforeach
        </tbody>
    </table>
    <div class="mt-6">
    <a href="{{ route('dashboard') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md">Kembali ke Dashboard</a></div>
@endsection