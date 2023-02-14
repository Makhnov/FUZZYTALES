<section id="imageZoom">
    <button id="closeImage" onclick="closeImageZoom()">  
        <i class="fas fa-times"></i>    
    </button>
    <div id="imageOverlay" onclick="closeImageZoom()"></div>
    <div id ="containerZoom" class="modal imgZoom">
        <div class="modalImage">
        </div>

        <div class="modalDesc">
            <div class="closeModal">
                <button><ion-icon name="close-outline"></ion-icon></button>
            </div>

            <div class="userDesc">
                <div class="profileImg">
                </div>
                <h2>Username</h2>
                <button class="followUser">follow</button>
            </div>

            <div class="imgDesc">
                <h3>img Title</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quos nesciunt cupiditate amet voluptatem
                    corrupti ipsam maxime, blanditiis est alias ipsa dignissimos, eum fugit aut esse nulla, eveniet
                    recusandae officia repellat?</p>
            </div>
            <div class="likes">
                <img src="../../divers/img/likes.png" height="100px" width="100px" alt=""><span></span>
            </div>
        </div>
    </div>
</section>    
