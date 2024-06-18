<div class="stories-container">
    <div class="content">
        <div class="previous-btn">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6" width="10" height="10">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>
        </div>

        <div class="stories"></div>

        <div class="next-btn active">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6" width="10" height="10">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
            </svg>
        </div>
    </div>
</div>

<div class="stories-full-view">
    <div class="close-btn">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6" width="10" height="10">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </div>

    <div class="content">
        <div class="previous-btn">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6" width="10" height="10">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>
        </div>

        <div class="story">
            <img src="" alt="" style="display: none" />
            <video src="" autoplay playsinline style="display: none"></video>
            <div class="author">Author</div>
            <button class="mute-btn">Mute</button>
            <div class="video-text">Video Text</div>
        </div>

        <div class="next-btn">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6" width="10" height="10">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
            </svg>
        </div>
    </div>

</div>

<style>
    body {
        background: #e2f1ed;
    }

    .stories-container {
        margin: 24px auto;
        position: relative;
    }

    .stories-container .previous-btn,
    .stories-container .next-btn,
    .stories-full-view .previous-btn,
    .stories-full-view .next-btn {
        width: 30px;
        position: absolute;
        z-index: 2;
        top: 50%;
        transform: translateY(-50%);
        background: #444;
        color: #fff;
        border-radius: 50%;
        padding: 10px;
        display: flex;
        cursor: pointer;
    }

    .stories-container .previous-btn,
    .stories-container .next-btn {
        opacity: 0;
        pointer-events: none;
        transition: all 400ms ease;
    }

    .stories-container .previous-btn.active,
    .stories-container .next-btn.active {
        opacity: 1;
        pointer-events: auto;
    }

    .stories-container .previous-btn,
    .stories-full-view .previous-btn {
        left: 8px;
    }

    .stories-container .next-btn,
    .stories-full-view .next-btn {
        right: 8px;
    }

    .stories-container .story {
        aspect-ratio: 120/180;
        max-height: <?php echo esc_attr($atts['max_height']); ?>px;
        flex-shrink: 0;
        border-radius: 16px;
        overflow: hidden;
        position: relative;
        cursor: pointer;
    }

    @media only screen and (max-width: 767px) {
        .stories-container .story {
            max-height: <?php echo esc_attr($atts['thumbnail_size_mobile']); ?>px;
        }
    }

    .stories-container .story img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .stories-container .story:before {
        content: "\25BA";
        font-size: 48px;
        color: white;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .stories-container .stories {
        display: flex;
        gap: <?php echo esc_attr($atts['gap']); ?>px;
    }

    .stories-container .content {
        overflow-x: scroll;
        scrollbar-width: none;
        scroll-behavior: smooth;
    }

    .stories-container .content::-webkit-scrollbar {
        display: none;
    }

    .stories-container .author {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 8px 16px;
        font-size: 15px;
        font-family: 'Roboto', sans-serif;
        font-weight: bold;
        color: #fff;
        background: linear-gradient(transparent, #222 130%);
    }

    .stories-full-view {
        position: fixed;
        inset: 0;
        z-index: 9999;
        background: rgba(0, 0, 0, 0.9);
        display: none;
        place-items: center;
    }

    .stories-full-view.active {
        display: grid;
    }

    .stories-full-view .close-btn {
        position: absolute;
        top: 16px;
        right: 16px;
        width: 30px;
        background: #444;
        color: #fff;
        border-radius: 50%;
        padding: 10px;
        display: flex;
        z-index: 20;
        cursor: pointer;
    }

    .stories-full-view .content {
        height: 90vh;
        width: 100%;
        max-width: 700px;
        position: relative;
    }

    .stories-full-view .story {
        height: 100%;
        text-align: center;
        position: relative;
    }

    .stories-full-view .story video {
        width: 88%;
        aspect-ratio: 9/16;
        object-fit: cover;
        border-radius: 16px;
    }

    .stories-full-view .story img {
        width: 88%;
        aspect-ratio: 9/16;
        object-fit: cover;
        border-radius: 16px;
    }

    .stories-full-view .author {
        position: absolute;
        top: 8px;
        left: 50%;
        transform: translateX(-50%);
        font-family: 'Roboto', sans-serif;
        font-size: 18px;
        background: rgba(0, 0, 0, 0.6);
        color: #fff;
        padding: 4px 32px;
        border-radius: 8px;
    }

    .stories-full-view .mute-btn {
        position: absolute;
        bottom: 20px;
        right: 20px;
        font-family: 'Roboto', sans-serif;
        font-size: 18px;
        background: rgba(0, 0, 0, 0.6);
        color: #fff;
        padding: 4px 16px;
        border-radius: 100%;
        cursor: pointer;
    }

    .stories-full-view .video-text {
        position: absolute;
        bottom: 60px;
        left: 50%;
        transform: translateX(-50%);
        font-family: 'Roboto', sans-serif;
        font-size: 18px;
        background: rgba(0, 0, 0, 0.6);
        color: #fff;
        padding: 4px 16px;
        border-radius: 8px;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const storiesFullView = document.querySelector('.stories-full-view');
        const jsonDataDiv = document.querySelector('.json-content-for-stories');
        let jsonData = jsonDataDiv.getAttribute('data-json');

        jsonData = jsonData.replace(/“/g, '"').replace(/”/g, '"').replace(/‘/g, "'").replace(/’/g, "'");
        jsonData = jsonData.replace(/&quot;/g, '"');

        let allStories;
        try {
            allStories = JSON.parse(jsonData);
        } catch (e) {
            console.error('Invalid JSON data:', e);
            return;
        }

        let touchStartX = 0;
        let touchEndX = 0;
        let touchStartY = 0;
        let touchEndY = 0;

        const stories = document.querySelector('.stories');
        const closeBtn = document.querySelector('.close-btn');
        const storyVideoFull = document.querySelector('.stories-full-view .story video');
        const storyImageFull = document.querySelector('.stories-full-view .story img');
        const storyAuthorFull = document.querySelector('.stories-full-view .story .author');
        const muteBtn = document.querySelector('.stories-full-view .mute-btn');
        const videoText = document.querySelector('.stories-full-view .video-text');
        const nextBtn = document.querySelector('.stories-container .next-btn');
        const previousBtn = document.querySelector('.stories-container .previous-btn');
        const storiesContent = document.querySelector('.stories-container .content');
        const nextBtnFull = document.querySelector('.stories-full-view .next-btn');
        const previousBtnFull = document.querySelector('.stories-full-view .previous-btn');

        let currentActive = 0;
        let isMuted = false;

        function doStuff(allStories) {
            const createStories = () => {
                allStories.forEach((s, i) => {
                    const story = document.createElement('div');
                    story.classList.add('story');
                    const img = document.createElement('img');
                    img.src = s.imageUrl;

                    story.appendChild(img);

                    stories.appendChild(story);

                    story.addEventListener('click', () => {
                        showFullView(i);
                    });
                });
            };

            createStories();

            function disableBodyScroll() {
                document.body.style.overflow = 'hidden';
            }

            function enableBodyScroll() {
                document.body.style.overflow = '';
            }

            const showFullView = (index) => {
                currentActive = index;
                updateFullView();
                storiesFullView.classList.add('active');
                disableBodyScroll();
            };

            closeBtn.addEventListener('click', () => {
                storiesFullView.classList.remove('active');
                storyVideoFull.pause();
                enableBodyScroll();
            });

            muteBtn.addEventListener('click', () => {
                isMuted = !isMuted;
                storyVideoFull.muted = isMuted;
                muteBtn.textContent = isMuted ? 'Unmute' : 'Mute';
            });

            const updateFullView = () => {
                const currentStory = allStories[currentActive];

                if (currentStory.videoUrl) {
                    storyVideoFull.src = currentStory.videoUrl;
                    storyVideoFull.style.display = '';
                    storyImageFull.style.display = 'none';
                    storyVideoFull.play();
                    videoText.textContent = currentStory.text || 'Video Text';
                } else if (currentStory.imageUrl) {
                    storyVideoFull.style.display = 'none';
                    storyVideoFull.pause();
                    storyImageFull.src = currentStory.imageUrl;
                    storyImageFull.style.display = '';
                    videoText.textContent = currentStory.text || 'Image Text';
                }

                storyAuthorFull.style.opacity = 0;
            };

            nextBtn.addEventListener('click', () => {
                storiesContent.scrollLeft += 300;
            });

            previousBtn.addEventListener('click', () => {
                storiesContent.scrollLeft -= 300;
            });

            storiesContent.addEventListener('scroll', () => {
                if (storiesContent.scrollLeft <= 24) {
                    previousBtn.classList.remove('active');
                } else {
                    previousBtn.classList.add('active');
                }

                let maxScrollValue = storiesContent.scrollWidth - storiesContent.clientWidth - 24;

                if (storiesContent.scrollLeft >= maxScrollValue) {
                    nextBtn.classList.remove('active');
                } else {
                    nextBtn.classList.add('active');
                }
            });

            nextBtnFull.addEventListener('click', () => {
                if (currentActive >= allStories.length - 1) {
                    return;
                }
                currentActive++;
                updateFullView();
            });

            previousBtnFull.addEventListener('click', () => {
                if (currentActive <= 0) {
                    return;
                }
                currentActive--;
                updateFullView();
            });

            storyVideoFull.addEventListener("ended", () => {
                if (currentActive >= allStories.length - 1) {
                    storiesFullView.classList.remove('active');
                    storyVideoFull.pause();
                    return;
                }

                currentActive++;
                updateFullView();
            });

            function handleSwipe() {
                const deltaX = touchEndX - touchStartX;
                const deltaY = touchEndY - touchStartY;

                if (Math.abs(deltaX) > Math.abs(deltaY)) {
                    if (deltaX < 0) {
                        if (currentActive < allStories.length - 1) {
                            currentActive++;
                            updateFullView();
                        }
                    } else {
                        if (currentActive > 0) {
                            currentActive--;
                            updateFullView();
                        }
                    }
                }
            }

            storiesFullView.addEventListener('touchstart', e => {
                touchStartX = e.changedTouches[0].screenX;
                touchStartY = e.changedTouches[0].screenY;
            });

            storiesFullView.addEventListener('touchend', e => {
                touchEndX = e.changedTouches[0].screenX;
                touchEndY = e.changedTouches[0].screenY;
                handleSwipe();
            });

            storiesFullView.addEventListener('mousedown', e => {
                touchStartX = e.screenX;
                touchStartY = e.screenY;
                e.preventDefault();
            });

            storiesFullView.addEventListener('mouseup', e => {
                touchEndX = e.screenX;
                touchEndY = e.screenY;
                handleSwipe();
            });
        }

        doStuff(allStories);
    });
</script>