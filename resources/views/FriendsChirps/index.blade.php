<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">


        <div class="mt-6 bg-white shadow-sm  rounded-lg divide-y">
            @foreach ($chirps as $chirp)

                    <div class="p-6 flex items-center space-x-2">
                        <img src="https://i.pravatar.cc/60?u={{$chirp->user->id }}"
                             alt=""
                             width="60"
                             height="10"
                             class="rounded-full">
                        <div class="flex-1">
                            <div class="flex justify-between items-center">
                                <div>
                                    <span class="text-gray-800">{{ $chirp->user->name }}</span>
                                    <small class="ml-2 text-sm text-gray-600">{{$chirp->created_at->diffForHumans()}}</small>
                                </div>
                            </div>
                            <p class="mt-4 text-lg text-gray-900">{{ $chirp->body }}</p>

                        </div>
                    </div>


            @foreach($chirp->comments as $comment )
                    <div class="flex flex-row pt-3 md-10 md:ml-16">
                        <img src="https://i.pravatar.cc/60?u={{ $comment->user_id}}"
                             alt=""
                             width="40"
                             height="20"
                             class="rounded-full">
                        <div class="flex-col mt-1">
                            <div class="flex items-center flex-1 px-4 text-sm  leading-tight"><span> Commented by <strong>{{$comment->author->name}}</strong></span>
                                <span class="ml-2 text-xs font-normal text-gray-500">{{$comment->created_at->diffForHumans()}}</span>
                            </div>
                            <div class="flex-1 px-2 ml-2 text-sm font-medium leading-loose text-gray-600">
                                {{$comment->body}}
                            </div>

                        </div>
                    </div>

                @endforeach
                    @include('FriendsChirps.add-comment')


            @endforeach
                {{$chirps->links()}}
        </div>

    </div>
</x-app-layout>
