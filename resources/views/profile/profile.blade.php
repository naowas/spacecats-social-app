<x-app-layout>
    <div class="py-12">
{{--        @dd($user->getMedia('display_image'))--}}
        <div class="max-w-lg mx-auto my-10 bg-white rounded-lg shadow-md p-5">
            <img class="w-32 h-32 rounded-full mx-auto" src="{{$user->getMedia('display_image')?->last()?->getUrl()}}" alt="Profile picture">
            <h2 class="text-center text-2xl font-semibold mt-3">{{$user->name}}</h2>
            <p class="text-center text-gray-600 mt-1">{{$user->email}}</p>

        </div>
    </div>
</x-app-layout>

