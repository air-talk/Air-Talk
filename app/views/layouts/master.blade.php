<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

</head>
<body>
<header class="topbar   topbar-blue">
    <div class="container">
        <a href="/" class="topbar-brand navigate-home track-click white smaller-logo"></a>
        <div id="global-loading-indicator" class="loading-indicator  smaller-logo" style="display: none;">
            <div class="loader"></div>
        </div>
        <nav class="topbar-nav">
            <ul class="topbar-nav-main" style="font-size: 15px">
                <li id="home-nav" class="active"><a href="/">Home</a></li>
                <li id="vocab-nav"><a href="/words">Words</a></li>
                <li id="stream-nav"><a href="/activity_stream">Activity</a></li>
                <li id="questions-nav"><a href="/discussion">Discussion</a></li>
                <li id="translations-nav"><a href="/translations">Immersion</a></li>
            </ul>
        </nav>
        <div class="topbar-right" style="font-size: 15px;">
            <div class="hamburger"></div>
            <div class="dropdown topbar-language">
                <div data-toggle="dropdown" class=""><span class="flag flag-svg-small flag-es"></span></div>
                <ul class="dropdown-menu arrow-top languages" role="menu" aria-labelledby="dLabel">
                    <li class="head">
                        <h6>Learning</h6>
                    </li>
                    <li class="language-choice active" data-value="es"><a href="javascript:;"><span class="flag flag-svg-micro flag-es"></span><span data-value="es">Spanish</span> <span class="gray">level 2</span></a></li>
                    <li class="divider"></li>
                    <li data-value="more"><a href="/courses">Add a new course</a></li>
                </ul>
            </div>
            <div class="dropdown topbar-username">
                <div data-toggle="dropdown" class=""><a href="/nikiwilliams" class="avatar avatar-small " title="nikiwilliams"><img src="//duolingo-images.s3.amazonaws.com/avatars/11747121/uQ9_Aqxi0P/large"><span class="ring"></span></a> <span class="name">nikiwilliams</span><span class="icon icon-arrow-down-white"></span></div>
                <ul class="dropdown-menu arrow-top" role="menu" aria-labelledby="dLabel" style="display: none;">
                    <li><a href="/nikiwilliams">Your Profile</a></li>
                    <li><a href="/settings/account" class="track-click" id="header_userdrop_settings">Settings</a></li>
                    <li><a href="/help">Help</a></li>
                    <li><a id="show-shortcuts">Keyboard shortcuts</a></li>
                    <li><a class="track-click" id="header_userdrop_logout">Logout</a></li>
                </ul>
            </div>
            <ul class="topbar-stats">
                <li class="streak" data-toggle="tooltip" title="0 day streak" data-placement="bottom"><span class="icon icon-streak-small "></span> 0</li>
                <li class="lingots" data-toggle="tooltip" title="Lingots" data-placement="bottom"><a href="/show_store"><span class="icon icon-lingot-small"></span><span id="num_lingots"> 6</span></a></li>
                <li class="notifications">
                    <button class="toggle-notifications btn btn-custom btn-notifications " data-placement="bottom" title=""><span class="icon icon-notification-small"></span></button>
                    <div id="popover-notifications" class="popover notification-popover-content hidden" style="position:fixed;"></div>
                </li>
            </ul>
        </div>
        <div id="logged-out-message" class="logged-out-message"></div>
    </div>
</header>
<main>
    
</main>
<footer>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</footer>
</body>
</html>
