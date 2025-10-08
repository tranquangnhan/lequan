document.addEventListener('DOMContentLoaded', function() {
    // Add video modal to body
    const modalHTML = `
        <div id="videoModal" class="video-modal">
            <span class="close-modal">&times;</span>
            <div class="video-container">
                <div id="videoPlayer"></div>
            </div>
        </div>
    `;
    document.body.insertAdjacentHTML('beforeend', modalHTML);

    const videoModal = document.getElementById('videoModal');
    const videoPlayer = document.getElementById('videoPlayer');
    const closeModal = document.querySelector('.close-modal');

    // Handle video thumbnail clicks
    document.querySelectorAll('.video-thumb').forEach(thumb => {
        thumb.addEventListener('click', function() {
            const videoType = this.dataset.videoType;
            const videoId = this.dataset.videoId;
            
            if (videoType === 'youtube') {
                videoPlayer.innerHTML = `
                    <iframe width="100%" height="100%" 
                        src="https://www.youtube.com/embed/${videoId}?autoplay=1" 
                        frameborder="0" allowfullscreen>
                    </iframe>
                `;
            } else if (videoType === 'tiktok') {
                videoPlayer.innerHTML = `
                      
                    <iframe 
                    src="https://www.tiktok.com/embed/v2/${videoId}" 
                    width="325" 
                    height="580" 
                    frameborder="0" 
                    allow=" clipboard-write; encrypted-media; picture-in-picture; fullscreen"
                    allowfullscreen>
                    </iframe>

                   
                `;
                // Reload TikTok embed script
                const script = document.createElement('script');
                script.src = 'https://www.tiktok.com/embed.js';
                document.body.appendChild(script);
            }
            
            videoModal.classList.add('active');
        });
    });

    // Close modal
    closeModal.addEventListener('click', function() {
        videoModal.classList.remove('active');
        videoPlayer.innerHTML = ''; // Clear video
    });

    // Close on outside click
    videoModal.addEventListener('click', function(e) {
        if (e.target === videoModal) {
            videoModal.classList.remove('active');
            videoPlayer.innerHTML = '';
        }
    });
});