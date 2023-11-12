<x-app-layout>
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-4 py-12">
                <!-- Table -->
                <div class="w-full mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
                    <header class="px-5 py-4 border-b border-gray-100">
                        <h2 class="font-semibold text-gray-800">People I Like</h2>
                    </header>
                    <div class="p-3">
                        <div class="overflow-x-auto">
                            <table class="table-auto w-full">
                                <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                <tr>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Name</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Email</div>
                                    </th>

{{--                                    <th class="p-2 whitespace-nowrap">--}}
{{--                                        <div class="font-semibold text-center">Action</div>--}}
{{--                                    </th>--}}
                                </tr>
                                </thead>
                                <tbody class="text-sm divide-y divide-gray-100">

                                @foreach($likedByMe as $liked)
                                    <tr>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="w-10 h-10 flex-shrink-0 mr-2 sm:mr-3"><img class="rounded-full" src="{{$liked->likedUser->getMedia('display_image')?->last()?->getUrl()}}" width="40" height="40" alt="{{$liked->likedUser->name}}"></div>
                                                <div class="font-medium text-gray-800">{{$liked->likedUser->name}}</div>
                                            </div>
                                        </td>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="text-left">{{$liked->likedUser->email}}</div>
                                        </td>

{{--                                        <td class="p-2 whitespace-nowrap">--}}
{{--                                            <div class="text-lg text-center">--}}
{{--                                                <a href="{{route('profile.show',$liked->likedUser->id)}}">--}}
{{--                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">--}}
{{--                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />--}}
{{--                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />--}}
{{--                                                    </svg>--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                        </td>--}}
                                    </tr>
                                @endforeach


                                </tbody>
                            </table>
                            {{$likedByMe->links()}}

                        </div>
                    </div>
                </div>
            </div>
</x-app-layout>

