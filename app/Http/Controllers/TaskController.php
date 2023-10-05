<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task;

class TaskController extends Controller
{
    //

    public function index()
    {
        
      return view('user/task');
    
    }


    public function save_task (Request $request) {
        $data =  new Task;

        $task= $request->task;
        $id_user= $request->id_user;
       

        $data->id_category = $task;
        $data->id_user = $id_user;
       

       


        $res = $data->save();

        if($res){ echo 'Success Save Data ...  '; }
        else{ echo 'Failed Save Data ...  '; }
    }

    public function delete_data (Request $request) {
        
         $id= $request->id;

        $data = Task::where('id', $id)->first();
    
        $res = $data->delete();

        if($res){ echo 'Success Delete Data ...  '; }
        elsE{ echo 'Failed Delete Data ...  '; }

    }


    public function update_data_task (Request $request) {
        $id= $request->id;
        $task= $request->task;
       

        $data = Task::where('id', $id)->first();

        
        $data->id_category = $task;
        


        $res = $data->update();

        if($res){ echo 'Success Update Data ...  '; }
        elsE{ echo 'Failed Update Data ...  '; }
    }

 

    // API
    public function get_data () {
        $task = Task::paginate(10);
        return response()->json(
            [
                'data' => $task->items(),
                'meta' => [
                    'current_page' => $task->currentPage(),
                    'last_page' => $task->lastPage(),
                    'per_page' => $task->perPage(),
                    'total' => $task->total(),
                ],
            ]
        );
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return response()->json(['message' => 'Success Delete Data ... ']);
    }

    public function update_api(Request $request, $id)
    {
       
       
        $id_category= $request->id_category;
       

        $data = Task::where('id', $id)->first();

        
        $data->id_category = $id_category;
        


        $res = $data->update();

        return response()->json(['message' => 'Success Update Data ... ']);
    }


    public function store(Request $request)
    {
       
        $data = $request->validate([
            'id_user' => 'required|integer',
            'id_category' => 'required|integer',
        ]);

        $task = Task::create($data);
        
       
      //  $data =  new Task;
      // $data->id_category = $request->id_category;
       // $data->id_user = $request->$id_user;

      // $task = $data->save();


       

        // return response()->json($task, 201);

        if($task){
            return response()->json( ['message' => 'Success Save Data ... ']);
        }
        else{
            return response()->json( ['message' => 'Failed Save Data ... ']);
        }

       

       
    }






}
