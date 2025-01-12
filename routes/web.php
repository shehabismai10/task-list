<?php

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Http\Response;
use Illuminate\Http\Request;


Route::get('/',function(){

    return redirect()->route('tasks.index');

});

Route::get('/tasks', function ()  {
    return view('index', [
        
        'tasks'=> Task::latest()->paginate()
    ]);

})->name('tasks.index');//route diplay more than one elements called {task.index}


Route::view('/tasks/create/','layouts.create')->name('tasks.create');


Route::get('/tasks/{task}', function (Task $task)  {


  return view('show',['task' => $task]);
})->name('tasks.show');//route diplay one elements called (task.show}


Route::get('/tasks/{task}/edit', function (Task $task) {
  return view('layouts.edit', [
      'task' => $task
  ]);
})->name('tasks.edit');
  



Route::get('/xxx', function () {
    return "hello";

})-> name("hello");


Route::get('/hallo' , function(){
    return redirect()->route('hello');

});

Route::get('/greet/{name}' , function($name){
    return 'hello ' . $name . ' BITCHHHHH';

}) ;

Route::fallback(function (){
    return 'يسطا في حاجة غلط';

});


Route::post('\task',function(TaskRequest $request){
  
  $data=$request->validated();
  $task=new Task;
  $task->title = $data['title'];
  $task->description = $data['description'];
  $task->long_description = $data['long_description'];
  
  
  $task->save();


  return redirect()->route('tasks.show',['task'=> $task->id])
  ->with('sucess','task created successfully');

  
})-> name('tasks.store');



Route::put('\task\{task}',function(Task $task, TaskRequest $request){
  
  $data=$request->validated();

  $task->title = $data['title'];
  $task->description = $data['description'];
  $task->long_description = $data['long_description'];
  
  
  $task->save();


  return redirect()->route('tasks.show',['task'=> $task->id])
  ->with('sucess','task updated successfully');

  
})-> name('tasks.update');





Route::delete('/tasks/{task}',function (Task $task){

  $task->delete();

  return redirect()->route('tasks.index')
        ->with('sucess','task deleted successfully');

})->name('tasks.delete');


Route::put('tasks/{task}/toggle-complete',function(Task $task){
  $task->togglecomplete();


  return redirect()->back()->with('success','Task updated successfully');
})->name('tasks.toggle-complete'); 