<div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
    @foreach($users as $user)
    <div class="text-center justify-center items-center">
        <a href="{{route('post.index', $user)}}" class="font-bold uppercase text-2xl text-center hover:text-gray-300">{{$user->username}}</a> 
        <div class="w-64 h-64 overflow-hidden rounded-full ml-14 my-3">
            <a href="{{route('post.index', $user)}}">
                @if($user->imagen)
                <img src="{{ asset('perfiles') . '/' . $user->imagen}}" alt="{{$user->imagen}}" class="w-full h-full object-cover">
                @else
                <img src="{{ asset('img/usuario.svg')}}" alt="{{$user->imagen}}">
                @endif
            </a>          
        </div>  
        <p class=" uppercase text-xl text-center">Publicaciones: {{$user->posts->count()}}</p>
        <p class=" uppercase text-xl text-center">Seguidores: {{$user->followers->count()}}</p>    
    </div>
    @endforeach
</div>