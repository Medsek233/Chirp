<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('Mychirps.store') }}">
            @csrf
            <textarea
                name="body"
                placeholder="{{ __('What\'s on your mind?') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('body') }}</textarea>
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
            <x-primary-button class="mt-4">{{ __('Chirp') }}</x-primary-button>
        </form>

        <div class="mt-6 bg-white shadow-sm  rounded-lg divide-y">
            @foreach ($Mychirps as $Mychirp)
                @if ($Mychirp->user->is(auth()->user()))
                <div class="p-6 flex items-center space-x-2">
                    <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}"
                         alt=""
                         width="60"
                         height="20"
                         class="rounded-full">
                    <div class="flex-1">
                        <div class="flex justify-between items-center">
                            <div>



                                <span class="text-gray-800">{{ $Mychirp->user->name }}</span>
                                <small class="ml-2 text-sm text-gray-600">{{$Mychirp->created_at->diffForHumans()}}</small>
                                @unless ($Mychirp->created_at->eq($Mychirp->updated_at))
                                    <small class="text-sm text-gray-600"> &middot; {{ __('edited') }}</small>
                                @endunless
                            </div>
                            @if ($Mychirp->user->is(auth()->user()))
                                <x-dropdown>
                                    <x-slot name="trigger">
                                        <button>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                            </svg>
                                        </button>
                                    </x-slot>
                                    <x-slot name="content">
                                        <x-dropdown-link :href="route('Mychirps.edit', $Mychirp)">
                                            {{ __('Edit') }}
                                        </x-dropdown-link>
                                        <form method="POST" action="{{ route('Mychirps.destroy', $Mychirp) }}">
                                            @csrf
                                            @method('delete')
                                            <x-dropdown-link :href="route('Mychirps.destroy', $Mychirp)" onclick="event.preventDefault(); this.closest('form').submit();">
                                                {{ __('Delete') }}
                                            </x-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                            @endif

                        </div>
                        <p class="mt-4 text-lg text-gray-900">{{ $Mychirp->body }}</p>
                    </div>
                </div>
                <div >
                    @foreach($Mychirp->comments as $comment)
                        <x-comment-section :comment="$comment" />
                    @endforeach
                </div>
                @endif
            @endforeach


        </div>
    </div>
</x-app-layout>
