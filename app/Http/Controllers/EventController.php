<?php
 namespace App\Http\Controllers;

 use Illuminate\Http\Request;
 use Calendar;
 use App\Event;
 
 class EventController extends Controller
 {
 
    public function index()
    {
        $calendar_events = CalendarEvent::all();
        return view('events', compact('calendar'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('events');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $calendar_event = new CalendarEvent();
        $calendar_event->title            = $request->input("title");
        $calendar_event->start            = $request->input("start");
        $calendar_event->end              = $request->input("end");
        $calendar_event->is_all_day       = $request->input("is_all_day");
        $calendar_event->background_color = $request->input("background_color");
        $calendar_event->save();
        return redirect()->route('calendar_events.index')->with('message', 'Item created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $calendar_event = CalendarEvent::findOrFail($id);
        return view('events', compact('calendar'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $calendar_event = CalendarEvent::findOrFail($id);
        return view('events', compact('calendar'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  int    $id
     * @param Request $request
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $calendar_event = CalendarEvent::findOrFail($id);
        $calendar_event->title            = $request->input("title");
        $calendar_event->start            = $request->input("start");
        $calendar_event->end              = $request->input("end");
        $calendar_event->is_all_day       = $request->input("is_all_day");
        $calendar_event->background_color = $request->input("background_color");
        $calendar_event->save();
        return redirect()->route('events')->with('message', 'Item updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $calendar_event = CalendarEvent::findOrFail($id);
        $calendar_event->delete();
        return redirect()->route('events')->with('message', 'Item deleted successfully.');
    }
}