@props(['comment'])
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




