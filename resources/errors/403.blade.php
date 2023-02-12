

<!DOCTYPE html>
<html lang="en" >

<head>

    <meta charset="UTF-8">

    <link rel="apple-touch-icon" type="image/png" href="https://cpwebassets.codepen.io/assets/favicon/apple-touch-icon-5ae1a0698dcc2402e9712f7d01ed509a57814f994c660df9f7a952f3060705ee.png" />
    <meta name="apple-mobile-web-app-title" content="CodePen">

    <link rel="shortcut icon" type="image/x-icon" href="https://cpwebassets.codepen.io/assets/favicon/favicon-aec34940fbc1a6e787974dcd360f2c6b63348d4b1f4e06c77743096d55480f33.ico" />

    <link rel="mask-icon" type="image/x-icon" href="https://cpwebassets.codepen.io/assets/favicon/logo-pin-8f3771b1072e3c38bd662872f6b673a722f4b3ca2421637d5596661b4e2132cc.svg" color="#111" />


    <title>CodePen - 403 Forbidden #codepenchallenge</title>

    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Cabin+Sketch|Cinzel+Decorative|Ewert|Geo|Josefin+Sans|Rye|Sancreek|Spirax|Ultra|UnifrakturMaguntia|Vast+Shadow" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">



    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }
        body {
            font-family: "Sancreek", cursive;
        }
        .container {
            position: relative;
            height: 100vh;
            overflow: hidden;
            background: #282820;
            z-index: -1;
        }
        .message {
            text-align: center;
            position: absolute;
            left: 0;
            right: 0;
            z-index: 1;
            top: 150px;
            width: 432px;
            height: 324px;
            margin: 0 auto;
            border: 20px solid #b1811d;
            background: #b1811d;
            border-radius: 20px;
            box-shadow: 0px 0px 0px 4px #471f05;
            animation-delay: 1s;
            animation-duration: 1.3s;
        }
        .message::before,
        .message::after {
            content: "";
            position: absolute;
            bottom: 107%;
            width: 50px;
            height: 300px;
            background: url(https://i.postimg.cc/0QbqNZYv/chain-4.png) repeat-y center;
            z-index: -10;
        }
        .message::before {
            left: 20px;
        }
        .message::after {
            right: 20px;
        }
        .message-inner {
            padding: 40px;
            border-radius: 20px;
            position: absolute;
            top: 2%;
            right: 2%;
            bottom: 2%;
            left: 2%;
            color: #291b03;
            background: #825301;
        }
        .message-title {
            font-size: 4em;
            margin: 0 0 20px;
        }
        .message-subtitle {
            font-size: 2em;
            margin: 0;
        }
        .chain {
            position: absolute;
            top: 0;
            height: 200%;
            width: 50px;
            background: url(https://i.postimg.cc/0QbqNZYv/chain-4.png) repeat-y center;
            animation: chain 1.8s ease-in-out;
        }
        .chain.left {
            left: 0;
        }
        .chain.right {
            right: 0;
        }
        .cog {
            position: absolute;
            bottom: -50px;
        }
        .cog.left {
            left: -50px;
            animation: cog-spin-left 1.8s ease-in-out;
        }
        .cog.right {
            right: -50px;
            animation: cog-spin-right 1.8s ease-in-out;
        }
        .cog-outer {
            fill: #955112;
        }
        .cog-inner {
            fill: #633d03;
        }
        .rivet {
            position: absolute;
            background-color: #8f6002;
            width: 3%;
            border-radius: 100px;
            padding-bottom: 3%;
        }
        .rivet.top-left {
            top: -7px;
            left: -7px;
        }
        .rivet.top-right {
            top: -7px;
            right: -7px;
        }
        .rivet.bottom-left {
            bottom: -7px;
            left: -7px;
        }
        .rivet.bottom-right {
            bottom: -7px;
            right: -7px;
        }
        @keyframes cog-spin-left {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }
        @keyframes cog-spin-right {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(-360deg);
            }
        }
        @keyframes chain {
            from {
                top: 0;
            }
            to {
                top: -100%;
            }
        }
    </style>

    <script>
        window.console = window.console || function(t) {};
    </script>



    <script>
        if (document.location.search.match(/type=embed/gi)) {
            window.parent.postMessage("resize", "*");
        }
    </script>


</head>

<body translate="no" >
<div class="container">
    <div class="chain left"></div>
    <div class="chain right"></div>
    <div class="cog left">
        <svg width="150px" height="150px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g id="cog" fill-rule="nonzero">
                    <path d="M36.601563,23.199219 C36.699219,22.5 36.800781,21.800781 36.800781,21 C36.800781,20.199219 36.699219,19.5 36.601563,18.800781 L41.101563,15.601563 C41.5,15.300781 41.699219,14.699219 41.398438,14.199219 L37,6.800781 C36.699219,6.300781 36.199219,6.101563 35.699219,6.398438 L30.699219,8.699219 C29.5,7.800781 28.300781,7.101563 26.898438,6.5 L26.398438,1 C26.300781,0.5 25.898438,0.101563 25.398438,0.101563 L16.800781,0.101563 C16.300781,0.101563 15.800781,0.5 15.800781,1 L15.300781,6.5 C13.898438,7.101563 12.601563,7.800781 11.5,8.699219 L6.5,6.398438 C6,6.199219 5.398438,6.398438 5.199219,6.800781 L0.898438,14.199219 C0.601563,14.699219 0.800781,15.300781 1.199219,15.601563 L5.699219,18.800781 C5.601563,19.5 5.5,20.199219 5.5,21 C5.5,21.800781 5.601563,22.5 5.699219,23.199219 L1,26.398438 C0.601563,26.699219 0.398438,27.300781 0.699219,27.800781 L5,35.199219 C5.300781,35.699219 5.800781,35.898438 6.300781,35.601563 L11.300781,33.300781 C12.5,34.199219 13.699219,34.898438 15.101563,35.5 L15.601563,41 C15.699219,41.5 16.101563,41.898438 16.601563,41.898438 L25.199219,41.898438 C25.699219,41.898438 26.199219,41.5 26.199219,41 L26.699219,35.5 C28.101563,34.898438 29.398438,34.199219 30.5,33.300781 L35.5,35.601563 C36,35.800781 36.601563,35.601563 36.800781,35.199219 L41.101563,27.800781 C41.398438,27.300781 41.199219,26.699219 40.800781,26.398438 L36.601563,23.199219 Z M21,31 C15.5,31 11,26.5 11,21 C11,15.5 15.5,11 21,11 C26.5,11 31,15.5 31,21 C31,26.5 26.5,31 21,31 Z" id="Shape" fill="#C7A005" class="cog-outer"></path>
                    <path d="M21,9 C14.398438,9 9,14.398438 9,21 C9,27.601563 14.398438,33 21,33 C27.601563,33 33,27.601563 33,21 C33,14.398438 27.601563,9 21,9 Z M21,26 C18.199219,26 16,23.800781 16,21 C16,18.199219 18.199219,16 21,16 C23.800781,16 26,18.199219 26,21 C26,23.800781 23.800781,26 21,26 Z" id="Shape" fill="#F1C40F" class="cog-inner"></path>
                </g>
            </g>
        </svg>
    </div>
    <div class="cog right">
        <svg width="150px" height="150px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g id="cog" fill-rule="nonzero">
                    <path d="M36.601563,23.199219 C36.699219,22.5 36.800781,21.800781 36.800781,21 C36.800781,20.199219 36.699219,19.5 36.601563,18.800781 L41.101563,15.601563 C41.5,15.300781 41.699219,14.699219 41.398438,14.199219 L37,6.800781 C36.699219,6.300781 36.199219,6.101563 35.699219,6.398438 L30.699219,8.699219 C29.5,7.800781 28.300781,7.101563 26.898438,6.5 L26.398438,1 C26.300781,0.5 25.898438,0.101563 25.398438,0.101563 L16.800781,0.101563 C16.300781,0.101563 15.800781,0.5 15.800781,1 L15.300781,6.5 C13.898438,7.101563 12.601563,7.800781 11.5,8.699219 L6.5,6.398438 C6,6.199219 5.398438,6.398438 5.199219,6.800781 L0.898438,14.199219 C0.601563,14.699219 0.800781,15.300781 1.199219,15.601563 L5.699219,18.800781 C5.601563,19.5 5.5,20.199219 5.5,21 C5.5,21.800781 5.601563,22.5 5.699219,23.199219 L1,26.398438 C0.601563,26.699219 0.398438,27.300781 0.699219,27.800781 L5,35.199219 C5.300781,35.699219 5.800781,35.898438 6.300781,35.601563 L11.300781,33.300781 C12.5,34.199219 13.699219,34.898438 15.101563,35.5 L15.601563,41 C15.699219,41.5 16.101563,41.898438 16.601563,41.898438 L25.199219,41.898438 C25.699219,41.898438 26.199219,41.5 26.199219,41 L26.699219,35.5 C28.101563,34.898438 29.398438,34.199219 30.5,33.300781 L35.5,35.601563 C36,35.800781 36.601563,35.601563 36.800781,35.199219 L41.101563,27.800781 C41.398438,27.300781 41.199219,26.699219 40.800781,26.398438 L36.601563,23.199219 Z M21,31 C15.5,31 11,26.5 11,21 C11,15.5 15.5,11 21,11 C26.5,11 31,15.5 31,21 C31,26.5 26.5,31 21,31 Z" id="Shape" fill="#927d0a" class="cog-outer"></path>
                    <path d="M21,9 C14.398438,9 9,14.398438 9,21 C9,27.601563 14.398438,33 21,33 C27.601563,33 33,27.601563 33,21 C33,14.398438 27.601563,9 21,9 Z M21,26 C18.199219,26 16,23.800781 16,21 C16,18.199219 18.199219,16 21,16 C23.800781,16 26,18.199219 26,21 C26,23.800781 23.800781,26 21,26 Z" id="Shape" fill="#F1C40F" class="cog-inner"></path>
                </g>
            </g>
        </svg>
    </div>
    <div class="steam left"></div>
    <div class="steam right"></div>
    <div class="message animated bounceInDown">
        <div class="rivet top-left"></div>
        <div class="rivet top-right"></div>
        <div class="rivet bottom-left"></div>
        <div class="rivet bottom-right"></div>
        <div class="message-inner">
            <h1 class="message-title">الوصول <br />محظور</h1>
            <p class="message-subtitle">لا يمكنك الوصول الى محتوى حاليًا</p>
        </div>
    </div>
</div>





</body>

</html>

