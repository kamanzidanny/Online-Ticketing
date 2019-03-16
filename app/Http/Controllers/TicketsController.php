<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TicketFormRequest;
use App\Ticket;

#telling laravel that you want to use the Mail facade
use Illuminate\Support\Facades\Mail;

class TicketsController extends Controller
{
    public function create()
    {
        return view('tickets.create');
    }
    public function store(TicketFormRequest $request)
    {
        $slug = uniqid();
        $user_id = uniqid();
        $ticket = new Ticket(array(
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'slug' => $slug,
            'user_id' => $user_id
        ));
        $ticket->save();
        $data = array(
            'ticket' => $slug,
            );
            Mail::send('emails.ticket', $data, function ($message) {
            $message->from('kamanziman@gmail.com', 'Online Ticketing');
            $message->to('kamanziman@gmail.com')->subject('There is a new ticket!');
            });
        return redirect('/contact')->with('status','your ticket has been created! Its unique Id is: '.$slug);
    }
    public function index()
    {
        $tickets = Ticket::all();
        return view('tickets.index', compact('tickets'));
    }
    public function show($slug)
    {
        $ticket = Ticket::whereSlug($slug)->firstOrFail();
        return view('tickets.show', compact('ticket'));
    }
    public function edit($slug)
    {
        $ticket = Ticket::whereSlug($slug)->firstOrFail();
        return view('tickets.edit', compact('ticket'));
    }
    public function update($slug, TicketFormRequest $request)
        {
            $ticket = Ticket::whereSlug($slug)->firstOrFail();
            $ticket->title = $request->get('title');
            $ticket->content = $request->get('content');
        
            if($request->get('status') != null) {
                $ticket->status = 0;
            } else {
                        $ticket->status = 1;
                    }
                        $ticket->save();
                        return redirect(action('TicketsController@edit', $ticket->slug))->with('status', 'The ticket '.$slug.' has been updated!');
        }
        public function destroy($slug)
        {
            $ticket = Ticket::whereSlug($slug)->firstOrFail();
            $ticket->delete();
            return redirect('/tickets')->with('status', 'The ticket '.$slug.' has been deleted!');
        }
}