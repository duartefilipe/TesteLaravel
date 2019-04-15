<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Calendar;
 use App\Event; 
 use Validator;
 use Carbon\Carbon;

class HomeController extends Controller
{

    public function __construct(User $user, Event $event)    {
        $this->middleware('auth');
        $this->user = $user;
        $this->event = $event;
    }
 
    public function index(){
        $user = $this->user->all();
        return view('home', compact('user'));
    }
    
    public function store (Request $request){
        $dados = $this->user->create($request->all());

        return view('home');
    }

    public function delete ($id) {

        $user = $this->user->find($id);

        $delete = $user->delete();
        if($delete) {
            return redirect()->route('home')
                   ->with('success','User deleted');
        } else {
            return redirect()->route('home')
                   ->with('error','Error');
        }
    }

    public function edit ($id) {
        $userid = $this->user->find($id);

        return view('edit', compact('userid'));


    }

    public function update(Request $request, $id) {
        $id = $this->user->find($id);

        $id->name = $request->get('name');
        $id->email = $request->get('email');
        

        $id->save();

        return redirect()->route('home');
    }

    public function calender()
     {
         $current = Carbon::now();
         $data = Event::all();
         $events = [];
         if($data->count()) {
             foreach ($data as $key => $value) {
                 $events[] = Calendar::event(
                     $value->title,
                     true,
                     $current = $value->start_date,
                     $current= $value->end_date,
                     null,// Add color and link on event
                     [
                         'color' => '#f05050',
                         'textColor' => '#fff',
                         'url' => 'pass here url and any route',
                     ]
                 );
             }
         }
         $calendar = Calendar::addEvents($events);
        
         return view('fullcalender', compact('calendar'));
     }

    public function addEvent(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);
 
        $event = new Event;
        
        $event->title = $request['title'];
        $event->start_date = $request['start_date'];
        $event->end_date = $request['end_date'];
        $event->save();
 
        return redirect('events');
    }

}
