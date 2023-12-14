<div
    x-data
    @click="
        const clicked = $event.target
        const target = clicked.tagName.toLowerCase()

        const ignores = ['button', 'svg', 'path', 'a']

        if (! ignores.includes(target)) {
            clicked.closest('.idea-container').querySelector('.idea-link').click()
        }
    "
    class="idea-container  hover:border-green shadow-lg mt-10 transition duration-150 ease-in   rounded-3xl flex cursor-pointer"
>
    <div class="hidden md:block border-r border-gray-100  px-5 py-6">
        <div class="text-center">
            <div class="font-semibold text-2xl @if ($hasVoted) text-green @endif">{{ $votesCount }}</div>
            <div class="text-gray-500">Prospect(s)</div>
        </div>

        <div class="mt-8">
            @if ($hasVoted)
                <button wire:click.prevent="vote" class="w-20 bg-green text-white border border-green hover:bg-green-hover font-bold text-xxs uppercase rounded-xl transition duration-150 ease-in px-4 py-3">Decline</button>
            @else
                <button wire:click.prevent="vote" class="w-20 bg-gray-200 border border-gray-200 hover:border-gray-400 font-bold text-xxs uppercase rounded-xl transition duration-150 ease-in px-4 py-3">Request</button>
            @endif
        </div>
    </div>
    <div class="flex md:flex-row flex-1  px-2 py-6 ">
{{--        <div class="flex-none mx-2 md:mx-0">--}}
{{--            <a href="#">--}}
{{--                <img src="{{asset($idea->user->getAvatar())}}"  alt="avatar" class="w-14 h-14 rounded-xl">--}}
{{--            </a>--}}
{{--        </div>--}}
        <div class="w-full flex flex-col justify-between  md:mx-4">
            <h4 class="text-xl hidden font-semibold mt-5 md:mt-0">
                <a href="{{ route('idea.show', $idea) }}" class="idea-link hover:underline">{{ $idea->title }}</a>
            </h4>
            <div class="w-full mt-3">
                <img src="{{asset($idea->photo)}}" alt="{{ $idea->title}}s">
            </div>
            <div class="text-gray-600 mt-3 line-clamp-3">
                {{ $idea->description }}
            </div>

            <div class="flex flex-col md:flex-row md:items-center justify-between mt-6">
                <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">

                    <a href="#">
                        <img src="{{asset($idea->user->getAvatar())}}"  alt="avatar" class="w-14 h-14 rounded-xl">
                    </a>

                    <div class="md:block font-bold text-gray-900">{{ $idea->user->name }}</div>
                    <div class="md:block">&bull;</div>
                    <div>{{ $idea->created_at->diffForHumans() }}</div>
                    <div>&bull;</div>
                    <div>{{ $idea->category->name }}s</div>
                    <div>&bull;</div>
                    <div class="text-gray-900">3 Replies</div>
                </div>
                <div

                    class="flex items-center space-x-2 mt-4 md:mt-0"
                >
                    <div class="{{ $idea->status->classes }} text-xxs  mt-4  font-bold uppercase leading-none rounded-full text-center w-28 h-10 py-4 px-4">{{ $idea->status->name }}</div>
                    <div class="flex items-center md:hidden mt-4 md:mt-0">
                        <div class="bg-gray-100 text-center rounded-xl h-10 px-4 py-2 pr-8">
                            <div class="text-sm font-bold leading-none @if ($hasVoted) text-green @endif">{{ $votesCount }}</div>
                            <div class="text-xxs font-semibold leading-none text-gray-400">Prospect(s)</div>
                        </div>
                        @if ($hasVoted)
                            <button
                                wire:click.prevent="vote"
                                class="w-20 bg-green text-white border border-green font-bold text-xxs uppercase rounded-xl hover:bg-green-hover transition duration-150 ease-in px-4 py-3 -mx-5"
                            >
                                Decline
                            </button>
                        @else
                            <button
                                wire:click.prevent="vote"
                                class="w-20 bg-green border border-gray-200 font-bold text-xxs uppercase rounded-xl hover:border-gray-400 transition duration-150 ease-in px-4 py-3 -mx-5"
                            >
                                Request
                            </button>
                        @endif
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
