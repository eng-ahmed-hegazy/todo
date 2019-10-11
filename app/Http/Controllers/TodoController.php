<?php

namespace App\Http\Controllers;
use App\Todo;
use Illuminate\Http\Request;
use Session;
class TodoController extends Controller
{
    public function __construct(){
        return $this->middleware('auth');
    }

    public function index(){
        $all_todo = Todo::orderBy('completion')->paginate(5);
        return view('todos',compact('all_todo'));
    }

    public function add(Request $request){
        if($request->isMethod('post')){
            $this->validate(request(),[
                'title'=>'required',
                'todo'=> 'required',
                'date'=> 'required'
            ]);

            $add=new Todo;
            $add->title=request('title');
            $add->todo=request('todo');
            $add->completion=0;
            $add->date=request('date');
            $add->save();
            Session::flash('success','your Todo  has been added successfully');
            return redirect('/todos');
        }else{
            return view('add');
        }
    }

    public function delete($id){
        $add=Todo::find($id);
        $add->delete();
        Session::flash('success','your Todo has been deleted successfully');
        return redirect('/todos');
    }
    public function edit(Request $request,$id){
        if($request->isMethod('post')){
            $this->validate(request(),[
                'title'=>'required',
                'todo'=> 'required',
                'date'=> 'required'
            ]);

            $add=Todo::find($id);
            $add->title=request('title');
            $add->todo=request('todo');
            $add->completion=0;
            $add->date=request('date');
            $add->save();
            Session::flash('success','your Todo  has been updated successfully');
            return redirect('/todos');
        }else{
            $todo_edit=Todo::find($id);
            return view('edit',compact('todo_edit'));
        }
    }

    public function complete($id){
        $add=Todo::find($id);
        $add->completion=1;
        $add->save();
        Session::flash('success','your Todo  has been completed successfully');
        return back();
    }
}
