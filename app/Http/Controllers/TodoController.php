<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use Carbon\Carbon;

class TodoController extends Controller
{
    public function index()
    {
        $list = Todo::all();
        return view('index', compact('list'));
    }

    public function save(Request $request)
    {
        Todo::create(['description' => $request->description,
                      'time' => $request->time  
                    ]);
        return redirect()->back();
    }
    public function edit($id)
    {
        $q = Todo::find($id);
        return response()->json([
            'status'=>200,
            'todo' =>$q,
        ]);
    }

     public function delete($id)
    {
        $q = Todo::find($id);
        $q -> delete();
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $id = $request->input('desid');
        $q = Todo::find($id);
        $q->description = $request->editdescription;
        $q->time = $request->time;
        $q->update();
        return redirect()->back();
    }
}
