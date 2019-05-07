window.onload = function() {
    let replyLinks = document.querySelectorAll(".comment .reply-btn")

    for (let i = 0; i < replyLinks.length; i++) {
        replyLinks[i].addEventListener('click', function(e) {
            e.preventDefault()

            let comment = e.currentTarget.closest(".comment")
            comment.classList.toggle('replying')
        })
    }
}