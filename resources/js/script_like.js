
document.addEventListener('DOMContentLoaded', function(e){
    fetch(`/posts/${postId}/likecount`, {
        method: 'GET'
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('like-count').innerText = `${data.likeCount} Me gustas`
    })
    .catch(error => {
        console.error('Error:', error);
    });    
})
