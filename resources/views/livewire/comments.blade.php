
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-4">Comment Section</h1>
        <div id="comment-section" class="bg-white rounded-lg shadow-md p-4">
            <h2 class="text-2xl font-bold mb-4">Add a Comment</h2>
            @error('newComment') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            <form class="my-4 flex" wire:submit.prevent="addComment">
                <input type="text" class="w-full rounded border shadow p-2 mr-2 my-2" placeholder="What's in your mind."
                    wire:model.lazy="newComment">
                <div class="py-2">
                    <button type="submit" class="p-2 bg-blue-500 w-20 rounded shadow text-white">Add</button>
                </div>
            </form>
            @foreach($comments as $comment)
    <div class="rounded border shadow p-3 my-2">
        <div class="flex justify-between my-2">
            <div class="flex">
                <p class="font-bold text-lg">{{$comment->creator->name}}</p>
                <p class="mx-3 py-1 text-xs text-gray-500 font-semibold">{{$comment->created_at->diffForHumans()}}
                </p>
            </div>
            <i class="fas fa-times text-red-200 hover:text-red-600 cursor-pointer"
                wire:click="remove({{$comment->id}})"></i>
        </div>
        <p class="text-gray-800">{{$comment->body}}</p>
    </div>
    @endforeach
            <div id="comments-display" class="bg-gray-100 p-4 rounded-lg"></div>
        </div>
    </div>

