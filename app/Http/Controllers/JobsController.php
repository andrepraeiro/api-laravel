<?php

namespace app\Http\Controllers;

use app\Job;
use Illuminate\Http\Request;

use app\Http\Requests;
use app\Http\Controllers\Controller;

class JobsController extends Controller
{
  public function  __construct()
  {
    $this->middleware('auth',['except'=> ['index', 'show']]);
  }
   
   public function index()
    {
      $jobs = Job::with('company')->get();
      return response()->json($jobs);
    }
  
  public function show($id)
  {
    $job = Job::with('company')->find($id);
   
    if (!$job) {
      return response()->json([
        'message' => 'Record not found'],404);
    }
    return response()->json($job);
  }
  
  public function store(Request $request)
  {
    $job = new Job();
    $job->fill($request->all());
    $job->save();
    
    return response()->json($job,201);
  }
  
  public function update(Request $request, $id)
  {    
    $job = Job::find($id);
    if(!$job){
      return response()->json(['message' => 'Record not found'],404);  
    }
    $job->fill($request->all());
    $job->save();
    
    return response()->json($job);
  }  
  
  public function destroy($id)
  {
    $job = Job::find($id);
    if(!$job) {
      return response()->json(['message' => 'Record not found'],404);
    }
    $job->delete;
  }
}
