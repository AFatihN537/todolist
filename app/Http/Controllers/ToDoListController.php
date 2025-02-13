<?php

namespace App\Http\Controllers;

use App\Models\ToDoList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ToDoListController extends Controller
{
    public function index()
    {
        $hariIni = Carbon::now()->translatedFormat('l, d F Y H:i:s');
        $tanggalHariIni = Carbon::now()->toDateString();
        $todolists = ToDoList::where('user_id', Auth::id())->whereDate('created_at', $tanggalHariIni)->get();
        return view('dashboard', compact('todolists','hariIni'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama_tugas' => ['required','string','max:255'],
        ]);
        ToDoList::create([
            'user_id' => Auth::id(),
            'nama_tugas' => $request->nama_tugas,
            'status_tugas' => 'pending',
        ]);
        return redirect()->route('dashboard')->with('success','Tugas berhasil ditambahkan');
    }
    public function update(Request $request, ToDoList $todolist)
    {
        if($todolist->user_id != Auth::id()){
            return redirect()->route('dashboard')->with('error','Tidak bisa mengubah tugas orang lain');
        }
        $todolist->update([
            'status_tugas' => $request->status_tugas,
        ]);
        return redirect()->route('dashboard')->with('success','Status tugas berhasil diubah');
    }
    public function destroy(ToDoList $todolist)
    {
        if($todolist->user_id != Auth::id()){
            return redirect()->route('dashboard')->with('error','Tidak bisa menghapus tugas orang lain');
        }
        $todolist->delete();
        return redirect()->route('dashboard')->with('success','Tugas berhasil dihapus');
    }
    public function edit(ToDoList $todolist)
    {
        if($todolist->user_id != Auth::id()){
            return redirect()->route('dashboard')->with('error','Tidak bisa mengubah tugas orang lain');
        }
        return view('edit_todolist', compact('todolist'));
    }
    public function updateName(Request $request, ToDoList $todolist)
    {
        if($todolist->user_id != Auth::id()){
            return redirect()->route('dashboard')->with('error','Tidak bisa mengubah tugas orang lain');
        }
        $request->validate([
            'nama_tugas' => ['required','string','max:255'],
        ]);
        $todolist->update([
            'nama_tugas' => $request->nama_tugas,
        ]);
        return redirect()->route('dashboard')->with('success','Nama tugas berhasil diubah');
    }
    public function history()
    {
        $todolists = ToDoList::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        return view('history_todolist', compact('todolists'));
    }
}
