<x-app-layout>
    <div class="py-12">
        <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-4 py-12">
            <div class="text-center pb-12">
                <h1 class="font-bold text-3xl md:text-4xl lg:text-5xl font-heading text-gray-900">
                    Meet new friends
                </h1>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @foreach($users as $user)
                    <div x-data="{ liked: false }" x-show="liked === false" class="w-full bg-white rounded-lg p-12 flex flex-col justify-center items-center">
                        <div class="mb-8">
                            <img class="object-center object-cover rounded-full h-36 w-36" src="{{$user?->getMedia('display_image')?->last()?->getUrl()}}" alt="photo">
                        </div>
                        <div class="text-center">
                            <p class="text-xl text-gray-700 font-bold mb-2">{{$user->name}}</p>
                            <button
                                x-on:click="likeUser({{ $user->id }}); liked = true"
                                class="bg-green-500 text-white px-4 py-2 rounded-full mr-2"
                            >
                                Like
                            </button>
                        </div>
                    </div>
                @endforeach

            </div>

            <div class="mt-4">
                {{ $users->links() }}
            </div>
        </section>
    </div>
</x-app-layout>

<script>
    function likeUser(userId) {
        axios.post(`/like/${userId}`)
            .then(response => {
                // Handle success, e.g., update UI
                console.log(response.data);
                alert('Liked successfully!');
                // The liked card will be hidden based on the x-show directive and liked variable
            })
            .catch(error => {
                // Handle error
                console.error(error);
            });
    }
</script>
