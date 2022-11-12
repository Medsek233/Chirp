@props(['chirp'])
@auth
    <div class=" flex flex-col p-6 ">
        <form method="POST" action="{{route('Mycomment.store',$chirp->id)}}">
            @csrf

            <div class=" flex items-center">
                <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}"
                     alt=""
                     width="40"
                     height="40"
                     class="rounded-full">
                <span class="font-semibold pl-2">Comment:</span>
            </div>
            <div class="mt-2">
                <textarea
                    name="body"
                    class="w-full text-sm focus:outline-none rounded focus:ring"

                    placeholder="Quick, thing of something to say!"
                    required></textarea>
                <input type="hidden" name="chirp_id" value="{{$chirp->id}}">
                @error('body')
                <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end mt-1 pt-2  ">
                <x-form.button>Comment</x-form.button>
            </div>

        </form>
</div>
@endauth
