<nav class="nav-bar">
    <span id="ham-menu-btn" class="fas fa-bars"></span>
    <span class="title">
        <?php echo $title; ?>
    </span>

    <div id="ham-menu-cont" class="menu-cont">
        <div class="nav-menu-cont">
            <div class="close-cont">
                <h2>rentALL</h2>
                <h2 id="ham-menu-close-btn" class="fas fa-times"></h2>
            </div>
            <ul class="nav-menu-list">
                <li><a href="/pages/homepage">HOME</a></li>
                <li><a href="/pages/sell-item">RENT ITEM</a></li>
                <li><a href="/pages/profile">PROFILE</a></li>
                <li><a href="/pages/catalogue">CATALOGUE</a></li>
                <li>CATEGORIES</li>
            </ul>
            <ul class="nav-menu-list">
                <li>ABOUT US</li>
                <li>CONTACT US</li>
            </ul>
        </div>
        <div id="back-dim" class="back-dim"></div>
    </div>

    <div class="desktop-nav-cont">
        <ul>
            <li><a href="/pages/homepage">Home</a></li>
            <li><a href="/pages/catalogue">Catalogue</a></li>
            <li><a href="">Categories</a></li>
        </ul>
    </div>

    <div class="right-nav-cont">
        <span id="profile-nav"><a href="/pages/profile">Profile</a></span>
        <div class="signupin-cont">
            <span id="sign-up"><a href="/pages/signup">Sign up</a></span>
            <span>|</span>
            <span><a href="/pages/login">Login</a></span>
        </div>
    </div>
</nav>
