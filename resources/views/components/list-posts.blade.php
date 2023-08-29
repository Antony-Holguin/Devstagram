<div>
    <div class="flex flex-col items-center">
        @if ($posts->count())
            <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

                @foreach ($posts as $post )
                    <div>
                        <a href="{{route('posts.show', ['post' => $post, 'user' => $post->user])}}">
                            <img src="{{asset('uploads').'/'.$post->image}}" alt="{{$post->title}}">
                        </a>
                    </div>
                    
                    
                @endforeach
                @else
                    <h2>No post yet</h2>

            </div>

            <div class="my-10">
                {{$posts->links('pagination::tailwind')}}
            </div>

        @endif
        
    </div>
</div>