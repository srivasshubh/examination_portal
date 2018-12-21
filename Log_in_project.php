<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Arimo|Chicle|IBM+Plex+Serif|Open+Sans|Source+Sans+Pro" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bitter|Pacifico|Work+Sans" rel="stylesheet">
    <style>
        body {
            margin: 0px;
            padding: 0px;
            background-color: #fff;
            overflow-x: hidden;
        }

        .top_div {
            width: 100%;
            height: 23%;
            position: relative;
            background-color: brown;
            display: flex;
        }

        .top_div_text1 {
            margin-left: 20px;
            margin-top: 10px;
            flex: 4;
            z-index: 10;
        }

        .top_div_text img {
            position: absolute;
            top: 100px;
            left: 50px;

        }

        .top_div_text2 {
            font-family: cursive;
            color: white;
            font-size: 33px;
            letter-spacing: 4px;
            margin-top: 45px;
            flex: 2;
        }

        .big_form_container {
            background-color: black;
            margin-left: 30%;
            margin-top: 2%;
            position: absolute;
            width: 50vw;
            height: 50vh;

        }

        .side_div {
            margin-top: 50px;
            width: 75vw;
            left: 0;
            height: 48vh;
            position: absolute;
        }

        .burger_container {
            width: 36px;
            height: 34px;
            position: relative;
            margin-left: 95%;
        }

        .lower_div {
            position: absolute;
            width: 25vw;
            height: 55vh;
            left: 100%;
            background: linear-gradient(45deg, blueviolet, #0ec37f);
            transition-duration: 1s;
        }

        .inner_div {
            margin-top: 35px;
            width: 100%;
            position: absolute;
            padding-bottom: 10px;
        }

        .fill_style {
            width: 150px;
            height: 30px;
        }

        .burger {
            width: 100%;
            margin-top: 25px;
            position: relative;
            font-family: cursive;
            font-size: 25px;
            border-radius: 10px;
            display: inline-block;
            margin-left: 35px;
        }

        a {
            color: black;
            text-decoration: none;
            font-family: bitter;
        }

        .burger:hover {
            background-color: floralwhite;
            cursor: pointer;
            margin-left: 10px;
            color: mediumvioletred;
        }

        .small_burger {
            width: 36px;
            height: 7px;
            border-radius: 3px;
            position: absolute;
            transition-duration: 0.4s;
            background-color: blueviolet;
        }

        .small_burger:nth-child(1) {
            top: 3px;
        }

        .small_burger:nth-child(2) {
            top: 13px;
        }

        .small_burger:nth-child(3) {
            top: 23.5px;
        }

        .cross_burger:nth-child(1) {
            transform: rotate(45deg);
            top: 45%;

        }

        .cross_burger:nth-child(2),
        .cross_burger:nth-child(3) {
            transform: rotate(-45deg);
            top: 45%;
        }

        a {
            color: black;
            text-decoration: none;
        }

        .burger:hover {
            background-color: floralwhite;
            cursor: pointer;
            margin-left: 10px;
            transition-duration: 0.5s;
        }

        .burger a:hover {
            color: darkgoldenrod;
        }


        @keyframes anim1 {
            0% {
                margin-left: 10%;
            }
            75% {
                margin-left: 45%;
            }
            100% {
                margin-left: 40%
            }
        }

        .block_container {
            position: relative;
            width: 80%;
            border: 0.8px solid grey;
            border-radius: 10px;
            height: 15%;
            margin-left: 10%;
            box-shadow: 2px 0px 15px azure;
        }

        .container p {
            font-family: sans-serif;
            font-size: 20px;
            color: blue;
            margin-left: 45px;
        }

        .button {
            display: inline-block;
            padding: 12px 40px;
            font-size: 15px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            position: relative;
            outline: none;
            color: #fff;
            background: rgb(40, 40, 240);
            border: none;
            border-radius: 7px;
            box-shadow: 0 9px #999;
            margin-left: 35%;
            margin-top: 5%;
        }

        .button:active {
            box-shadow: 0 5px #666;
            transform: translateY(4px);
        }

        .button:hover {
            background: rgb(20, 20, 240);
        }

        .container {
            margin-left: 40%;
            margin-top: 0%;
            position: absolute;
            width: 450px;
            height: 300px;
            border: 1px solid black;
            border-radius: 15px;
            opacity: 0.8;
            background-color: #dbdbdb;
            box-shadow: 0px 0px 15px yellow;
            animation: anim1;
            animation-duration: 2s;
        }

    </style>
</head>

<body>
    <div class="top_div ">
        <div class="top_div_text1 "><img src="logo.png " /> </div>
        <div class="top_div_text2 "> Examination Portal </div>
    </div>
    <div class="burger_container " onclick="func();">
        <div class="small_burger "> </div>
        <div class="small_burger "> </div>
        <div class="small_burger "> </div>
    </div>
    <div class="lower_div ">
        <div class="inner_div ">
            <div class="burger "><a href="index.html "> About</a> </div><br/>
            <div class="burger "> <a href="Log_in_project.php "> Log_in </a></div><br/>
            <div class="burger "> <a href="Sign_up_project.html "> Sign_up</a> </div><br/>
            <div class="burger "> <a href="admit_card.php "> Admit Card </a></div><br/>
        </div>
    </div>
    <div class="side_div">
        <div class="container">
            <form method="POST" action="Log_in_action.php">
                <p>Enter Your Roll_no : </p>
                <input class="block_container" type="text" name="roll_no" placeholder="Enter your Roll No" required /><br/>
                <p> Password : </p>
                <input class="block_container" type="password" name="password" placeholder="Enter your password" required /><br/>
                <input class="button" type="submit" name="submit" value="Log in" />
            </form>
            <p style="color:Red;">
                <?php if(isset($_GET['error'])) echo($_GET['error']); ?>
            </p>
        </div>

    </div>
</body>
<script>
    function func() {
        var y = document.querySelector(".cross_burger");
        if (y == null) {
            y = document.querySelectorAll(".small_burger");
            for (var i = 0; i < y.length; i++) {
                y[i].classList.add("cross_burger");
            }
            var p = document.querySelector(".lower_div");
            p.style.left = "76%";
        } else {
            y = document.querySelectorAll(".small_burger");
            for (var j = 0; j < y.length; j++) {
                y[j].classList.remove("cross_burger");
            }
            var p = document.querySelector(".lower_div");
            p.style.left = "100%";
        }
    }

</script>

</html>
