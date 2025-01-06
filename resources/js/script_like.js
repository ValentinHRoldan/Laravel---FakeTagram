const $like = document.getElementById('btn-like');
const $likeIcon = $like.childNodes[1];
const $formLike = document.getElementById('form-like');
let formData = new FormData($formLike);
let postId = document.getElementById('post-id').value;


$like.addEventListener('click', function(e){
    if($likeIcon.classList.contains('fa-regular')){
        $likeIcon.classList.add('fa-solid', 'fa-beat');
        $likeIcon.classList.remove('fa-regular');
        $likeIcon.style["color"] = "red";

        e.preventDefault();

        fetch(`/posts/${postId}/like`, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[type="hidden"]').value
            }
        })
        .then(response => response.json())
        .then(data => {
            document.getElementById('like-count').innerText = `${data.likeCount} Likes`
        })
        .catch(error => {
            console.error('Error:', error);
        });

    }
    else{
        $likeIcon.classList.remove('fa-solid', 'fa-beat');
        $likeIcon.classList.add('fa-regular');
        $likeIcon.style["color"] = "white";        
    }
})

document.addEventListener('DOMContentLoaded', function(e){
    fetch(`/posts/${postId}/likecount`, {
        method: 'GET'
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('like-count').innerText = `${data.likeCount} Likes`
    })
    .catch(error => {
        console.error('Error:', error);
    });    
})
