<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\SupportTicket;
use Illuminate\Support\Facades\Auth;

class SupportTick extends Component
{
    use WithPagination;
    public $newTicket;
    public $active = 1 ;

    protected $listeners = [
        'ticketSelected',
    ];

    public function addTicket()
    {
        $ticket = new SupportTicket();
        $ticket->name = $this->newTicket;
        $ticket->user_id = Auth::user()->id;
        $ticket->save();
        $this->newTicket = "";
    }
    public function ticketSelected($ticketId)
    {
        $this->active = $ticketId;
        
    }
    public function render()
    {
        $tickets = SupportTicket::paginate(2);
        return view('livewire.support-tick', compact('tickets'));
    }
}
