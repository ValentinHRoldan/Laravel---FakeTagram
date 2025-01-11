<div>
    <div class="flex items-center gap-3">
        @if($likeCheck)
        <button type="submit" id="btn-like" wire:click='like'>
            <i class="fa-solid fa-heart fa-2xl fa-beat" style="color: #ff0000; animation-iteration-count: 1;"></i>
        </button>
        @else
        <button type="submit" id="btn-like" wire:click='like'>
            <i class="fa-regular fa-heart fa-2xl" style="color: #ffffff; animation-iteration-count: 1;"></i>
        </button> 
        @endif
        <p class="text-lg font-bold" id="like-count">{{$likeCount}} @choice('Me gusta|Me gustas', $likeCount)</p>
    </div>

</div>
