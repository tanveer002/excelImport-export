
    <ul class="list-group list-group-flush">
        <form wire:submit.prevent="addTicket">
            <textarea name="ticket" id="" cols="30" rows="5" placeholder="Add Your Text Here" wire:model.debounce.500ms="newTicket"></textarea>
            <li class="list-group-item ">
                <button class="btn btn-success">Create Support Ticket</button>
            </li>
        </form>
       @foreach ($tickets as $ticket)
       <li class="list-group-item {{$active == $ticket->id ? 'border border-danger' : ''}}" wire:click="$emit('ticketSelected', {{$ticket->id}})">
        <span class="badge badge-success float-right">{{$ticket->user->name}}</span>   
        {{$ticket->name}}
        </li>
       @endforeach
       {{$tickets->links('pagination-links')}}
    </ul>
  