<x-app-layout>
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-4 py-12">
        <!-- Table -->
        <div class="w-full mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
            <header class="px-5 py-4 border-b border-gray-100">
                <h2 class="font-semibold text-gray-800">People Who Like Me</h2>
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
                        </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-gray-100">

                        @foreach($likedMe as $liked)
                            <tr>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 flex-shrink-0 mr-2 sm:mr-3"><img class="rounded-full" src="{{$liked->user->getMedia('display_image')?->last()?->getUrl()}}" width="40" height="40" alt="{{$liked->user->name}}"></div>
                                        <div class="font-medium text-gray-800">{{$liked->user->name}}</div>
                                    </div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left">{{$liked->user->email}}</div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$likedMe->links()}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

