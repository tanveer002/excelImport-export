<ul class="list-group list-group-flush">
    <h3 class="text-3xl">Comments</h3>

    @if (session()->has('message'))
        <div class="p-3 bg-parimary rounded col-4">
            {{ session('message') }}
        </div>
    @endif

    <li class="list-group-item ">
        <section>
            <div class="row">
                <input type="file" class="col-8" id="image" wire:change="$emit('fileChoosen')">
                <div class="col-2">
                    @if ($image)
                        <img src={{ $image }} width="200" />
                    @endif
                </div>
            </div>
        </section>
    </li>
    <li class="list-group-item">
        <form class="my-4 flex" wire:submit.prevent="addComment">
            <div class="row">
                @error('newComment')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <input type="text" class="w-full rounded border shadow p-2 mr-2 my-2 col-8 offset-1"
                    placeholder="What's in your mind." wire:model.debounce.500ms="newComment">
                <div class="py-2">
                    <button type="submit"
                        class="p-2 bg-blue-500 w-20 rounded shadow text-white btn btn-success">Add</button>
                </div>
            </div>
        </form>
    </li>
    <li class="list-group-item ">
        @foreach ($comments as $comment)
            <div class="rounded border shadow p-3 my-2 border border-danger">
                <div class="row">
                    <div class="col-8">
                        <span class="badge badge-secondary">{{ $comment->user->name }}</span>
                    </div>
                    <div class="col-3">
                        <p class=" py-1 text-secondary">{{ $comment->created_at->diffForHumans() }} </p>
                    </div>
                    <div class="col-1">
                        <button type="button" class="btn btn-sm btn-danger float-right"
                            wire:click="remove({{ $comment->id }})">x</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <p class="text-gray-800">{{ $comment->comment }}</p>
                    </div>
                    <div class="col-3">
                        @if ($comment->image)
                            <img src="{{ $comment->imagePath }}" style="width: 100px; height:80px;" />
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
        {{ $comments->links('pagination-links') }}
    </li>
</ul>



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
