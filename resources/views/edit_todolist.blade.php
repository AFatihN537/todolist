@extends('layouts.app')
@section('title', 'Edit To-Do List')
@section('header', 'Edit To-Do List')
@section('content')
    <form action="{{ route('todolist.updateName',$todolist->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="nama_tugas" class="form-label">Nama Tugas</label>
            <input type="text" name="nama_tugas" class="bg-white w-full border px-3 py-1.5 rounded-md outline-gray-300 outnline-1 -outline-offset-1 focus:outline-2 focus:-outline-offset-2 focus:outline-blue-600 my-3" value="{{ $todolist->nama_tugas }}" required>
        </div>
        <div class="flex gap-2">
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-md">Simpan Perubahan</button>
        <a href="{{ route('dashboard') }}" class="bg-gray-600 text-white px-4 py-2 rounded-md">Batal</a></div>
    </form>
@endsection