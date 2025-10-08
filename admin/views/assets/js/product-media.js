document.addEventListener('DOMContentLoaded', function() {
    // Video handling
    const videoLinkInput = document.querySelector('.video-link');
    const addVideoBtn = document.querySelector('.add-video-link');
    const videoPreview = document.getElementById('videoPreview');
    const videoLinksInput = document.getElementById('videoLinksInput');
    let videoLinks = [];

    function extractVideoId(url) {
        // YouTube
        let match = url.match(/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/);
        if (match) return { type: 'youtube', id: match[1] };

        // TikTok - support both short and full URL formats
        match = url.match(/(?:tiktok\.com\/@[\w.-]+\/video\/|video\/)(\d+)/);
        if (match) return { type: 'tiktok', id: match[1] };

        return null;
    }

    function createVideoPreview(videoInfo) {
        const wrapper = document.createElement('div');
        wrapper.className = 'video-preview-item mb-2 position-relative';
        
        if (videoInfo.type === 'youtube') {
            wrapper.innerHTML = `
                <iframe width="200" height="150" 
                    src="https://www.youtube.com/embed/${videoInfo.id}" 
                    frameborder="0" allowfullscreen>
                </iframe>
                <button type="button" class="btn btn-danger btn-sm remove-video" style="position:absolute;top:0;right:0;">×</button>
            `;
        } else if (videoInfo.type === 'tiktok') {
            // Try to extract username from full tiktok URL if available
            let username = videoInfo.username || '';
            if (!username && videoInfo.url) {
                const m = videoInfo.url.match(/tiktok\.com\/@([\w.-]+)/i);
                if (m) username = m[1];
            }

            const displayUser = username ? `@${username}` : '';
            const userHref = username ? `https://www.tiktok.com/@${username}` : '#';

            wrapper.innerHTML = `
               
               
                
                <iframe 
                src="https://www.tiktok.com/embed/v2/${videoInfo.id}" 
                width="325" 
                height="580" 
                frameborder="0" 
                allowfullscreen>
                </iframe>

                <button type="button" class="btn btn-danger btn-sm remove-video" style="position:absolute;top:0;right:0;">×</button>
                
                `;

            // Append TikTok embed script only once
            if (!document.querySelector('script[src="https://www.tiktok.com/embed.js"]')) {
                const script = document.createElement('script');
                script.src = 'https://www.tiktok.com/embed.js';
                document.body.appendChild(script);
            }
        }

        wrapper.querySelector('.remove-video').addEventListener('click', function() {
            const index = videoLinks.indexOf(videoInfo.url);
            if (index > -1) {
                videoLinks.splice(index, 1);
                updateVideoLinksInput();
            }
            wrapper.remove();
        });

        return wrapper;
    }

    function updateVideoLinksInput() {
        videoLinksInput.value = JSON.stringify(videoLinks);
    }

    addVideoBtn.addEventListener('click', function() {
        const url = videoLinkInput.value.trim();
        if (!url) return;

        const videoInfo = extractVideoId(url);
        if (!videoInfo) {
            alert('Link video không hợp lệ. Vui lòng sử dụng link YouTube hoặc TikTok.');
            return;
        }

        videoInfo.url = url;
        videoLinks.push(url);
        updateVideoLinksInput();
        
        videoPreview.appendChild(createVideoPreview(videoInfo));
        videoLinkInput.value = '';
    });

    // Load existing videos if any
    if (videoLinksInput.value) {
        try {
            const existingLinks = JSON.parse(videoLinksInput.value);
            existingLinks.forEach(url => {
                const videoInfo = extractVideoId(url);
                if (videoInfo) {
                    videoInfo.url = url;
                    videoLinks.push(url);
                    videoPreview.appendChild(createVideoPreview(videoInfo));
                }
            });
        } catch (e) {
            console.error('Error loading existing videos:', e);
        }
    }
});




