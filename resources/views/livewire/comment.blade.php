<div class="col-6">
    <h1 class="text-3xl">Comments</h1>
    @error('newComment') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    <div>
        @if (session()->has('message'))
        <div class="p-3 bg-success rounded shadow-sm">
            {{ session('message') }}
        </div>
        @endif
    </div>

    <section>
        @if($image)
        <img src={{$image}} width="200" />
        @endif
        <input type="file" id="image" wire:change="$emit('fileChoosen')">
    </section>


    <form class="my-4 flex" wire:submit.prevent="addComment">
        @error('newComment')
            <span class="text-danger">{{$message}}</span>
        @enderror
        <input type="text" class="w-full rounded border shadow p-2 mr-2 my-2 col-8" placeholder="What's in your mind." wire:model.debounce.500ms="newComment">
        
        <div class="py-2">
            <button type="submit" class="p-2 bg-blue-500 w-20 rounded shadow text-white btn btn-success">Add</button>
        </div>
    </form>
    @foreach($comments as $comment)
    <div class="rounded border shadow p-3 my-2">
        <button type="button" class="btn btn-sm btn-danger float-right" data-bs-dismiss="modal" aria-label="Close" wire:click="remove({{$comment->id}})">x</button>
        <div class="flex justify-between my-2">
            <div class="row">
                <p class="text-bold text-lg col-6">{{$comment->user->name}}</p>
                <p class="mx-3 py-1 text-secondary col-4">{{$comment->created_at->diffForHumans() }}
                </p>
            </div>
        </div>
        <p class="text-gray-800">{{$comment->comment}}</p> 
         @if($comment->image)
         <img src="{{$comment->imagePath}}" style="width: 100px; height:80px;"/>
        @endif
    </div>
    @endforeach

    {{$comments->links('pagination-links')}}
</div>

<script>
    window.livewire.on('fileChoosen', () => {
        let inputField = document.getElementById('image')
        let file = inputField.files[0]
        let reader = new FileReader();
        reader.onloadend = () => {
            window.livewire.emit('fileUpload', reader.result)
        }
        reader.readAsDataURL(file);
    })
</script>