<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Http\Requests;
use App\Comment;
use Auth;
use App\Joboffer;


class EmployerCommentsController extends Controller
{
    
    public function __construct() 
    {
        $this->middleware('auth');
        $this->middleware('employer');
    }

    public function index()
    {
        $user = Auth::user();
        $comments = Comment::where('employer_id', $user->employer->id)->paginate(10);
                
        $today = date("Y-m-d");
        $joboffers = Joboffer::where([
            ['status', '=', 'accepted'],
            ['employer_id', '=', Auth::user()->employer->id],
            ['date', '<', $today],
            ['review_left', '=', 0]
        ])->get();
        
        return view('employer-comments.index', compact('comments', 'joboffers'));
    }

    public function store(Request $request)
    {   
        //$this->validate($request, Comment::$rules);
        $comment = new Comment($request->all());
        //punctual and able  - positive
        if(substr($comment->comment, -7) == "future."){
            $comment->rating = 2;
        }
        //Neutral – Employee did not turn up
        elseif(substr($comment->comment, -7) == " level."){
            $comment->rating = 1;
        }
        //Neutral – Employee was a 
        elseif(substr($comment->comment, -7) == "ployer."){
            $comment->rating = 1;
        }
        //Negative – Employee was not able
        elseif(substr($comment->comment, -7) == "istory."){
            $comment->rating = 0;
        }
        //Negative – Employee never showed
        elseif(substr($comment->comment, -7) == "he job."){
            $comment->rating = 0;
        }
        $comment->approved = true;
        $comment->employer_id = Auth::user()->employer->id;
        $comment->save();
        $joboffers = $this->fetchJobs($comment->employee_id);
        foreach($joboffers as $joboffer){
            $joboffer->review_left = 1;
            $joboffer->save();
        }
        return redirect('/reviews');
    }

        public function customStore(Request $request)
    {   
        $this->validate($request, Comment::$rules);
        $comment = new Comment($request->all());
        $comment->approved = 0;
        $comment->employer_id = Auth::user()->employer->id;
        $comment->save();
        //sets the jobs that the employer is leave a review for to 'reviewed'.
        // $joboffers = $this->fetchJobs($comment->employee_id);
        $joboffers = Joboffer::where('employer_id', $comment->employer_id)->where('employee_id', $comment->employee_id)->get();
        foreach($joboffers as $joboffer){
            $joboffer->review_left = 1;
            $joboffer->save();
        }
        return redirect('/reviews');
    }

    public function destroy($id)
    {
        
        $comment = Comment::find($id);
        if(Auth::user()->employer->id == $comment->employer_id){
        $comment->delete();
        return redirect('/reviews');
        }
        else
        return view('home');
    }
    

        public function create($id)
    {
        $currid = Auth::user()->employer->id;
        $user = Employee::find($id);     
        $today = date("Y-m-d");

        $joboffers = $this->fetchJobs($user->id);
        if(count($joboffers) > 0){
            return view('comments.create', compact('user'));
        }
        else return redirect()->back()->with('error', 'You must have employed the staff member  to leave a review.');
    }


        public function customCreate($id) 
    {
        $user = Employee::find($id);     
        return view('comments.createcustom', compact('user'));
    }

        private function fetchJobs($employee_id){
        //there must be at least one joboffer where the user viewing is the owner, the status is accepted, the date is past today, the employee's id matches up and the review_left field is false//
        $today = date("Y-m-d");
        $joboffers = Joboffer::where([
            ['status', '=', 'accepted'],
            ['employee_id', '=', $employee_id],
            ['employer_id', '=', Auth::user()->employer->id],
            ['date', '<', $today],
            ['review_left', '=', 0]
        ])->get();
        return $joboffers;
        }


}
