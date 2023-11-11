<x-app-layout>
    <div class="py-12">
        <!-- component -->
        <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-4 py-12">
            <div class="text-center pb-12">
                <h1 class="font-bold text-3xl md:text-4xl lg:text-5xl font-heading text-gray-900">
                    Meet new friends
                </h1>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @foreach($users as $user)
                    <div class="w-full bg-white rounded-lg p-12 flex flex-col justify-center items-center">
                        <div class="mb-8">
                            <img class="object-center object-cover rounded-full h-36 w-36" src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1170&q=80" alt="photo">
                        </div>
                        <div class="text-center">
                            <p class="text-xl text-gray-700 font-bold mb-2">{{$user->name}}</p>
                            <button class="bg-green-500 text-white px-4 py-2 rounded-full mr-2">Like</button>
                        </div>
                    </div>
                @endforeach

            </div>
        </section>

    </div>
</x-app-layout>
