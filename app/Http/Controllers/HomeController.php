<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Calendar;
 use App\Event; 
 use Validator;
 use Carbon\Carbon;
 use interaction;
 use  daygrid;
 use core;

class HomeController extends Controller
{

    public function __construct(User $user, Event $event)    {
        $this->middleware('auth');
        $this->user = $user;
        $this->event = $event;
    }
 
    public function index(){
        $user = $this->user->all();
        $event = $this->event->all();
        return view('home', compact('user', 'event'));
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

    public function calender(){

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
                     null,
                     [
                         'color' => 'green',
                         'textColor' => '#fff',
                         'url' => 'pass here url and any route',
                         
                     ]
                 );
             }
         }
         //$calendar = Calendar::addEvents($events);

         $calendar = Calendar::addEvents($events, [ //set custom color fo this event
            //'color' => '#800',
            
                    ])->setOptions([ //set fullcalendar options
                        //'firstDay' => 1,
                        'selectable' => true,
                        'selectHelper' =>true,
                        'slotLabelFormat' => 'HH:mm',
                        'allDay' => true,
                    ]);
            
            $event = $this->event->all();
           
         return view('fullcalender', compact('calendar', 'event'));
    }


    
     public function addEvent(Request $request){
        $event = new Event;
        
        $event->title = $request['title'];
        $event->start_date = $request['start_date'];
        $event->end_date = $request['end_date'];
        $event->save();
 
        return redirect('events');
    }

    public function deleteEvent ($id) {

        $event = $this->event->find($id);

        $delete = $event->delete();
        if($delete) {
            return redirect('events');
        } else {
            return redirect('events');
        }
    }

    public function updateEvent(Request $request, $id) {
       
        $id = $this->event->find($id);
       
        $id->title = $request->get('title');
        $id->start_date = $request->get('start_date');
        $id->end_date = $request->get('end_date');
        
        $id->save();

        return redirect('events');
    }
    


}
