<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/crowxworst/css/header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0-13/css/all.min.css">
</head>
<style>
    .container-4 {
        overflow: hidden;
        width: 200px;
        vertical-align: middle;
        white-space: nowrap;
        /* position: relative; */
        /* margin-top: 30px; */
        border-bottom: 1px solid #000;
    }

    .container-4 input#search {
        width: 200px;
        height: 30px;
        background: #fff;
        border: none;
        font-size: 10pt;
        float: left;
        color: #fff;
        padding-left: 15px;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        -webkit-transition: all .55s ease;
        -moz-transition: all .55s ease;
        -ms-transition: all .55s ease;
        -o-transition: all .55s ease;
        transition: all .55s ease;
        
    }

    .container-4 input#search::-webkit-input-placeholder {
        color: #65737e;
    }

    .container-4 input#search:-moz-placeholder {
        /* Firefox 18- */
        color: #65737e;
    }

    .container-4 input#search::-moz-placeholder {
        /* Firefox 19+ */
        color: #65737e;
    }

    .container-4 input#search:-ms-input-placeholder {
        color: #65737e;
    }

    .container-4 button.icon {
        border: none;
        background: #232833;
        height: 30px;
        width: 30px;
        color: #4f5b66;
        opacity: 0;
        font-size: 10pt;
        -webkit-transition: all .55s ease;
        -moz-transition: all .55s ease;
        -ms-transition: all .55s ease;
        -o-transition: all .55s ease;
        transition: all .55s ease;
    }


    /* ANIMATION EFFECT */

    .container-4:hover button.icon,
    .container-4:active button.icon,
    .container-4:focus button.icon {
        outline: none;
        opacity: 1;
        margin-left: -30px;
        cursor: pointer;
    }

    .container-4:hover,
    .container-4:active,
    .container-4:focus {
        width: 200px;
    }

    .container-4 input#search:focus{
        outline: none;
        color: #000;
    }
</style>

<body>
    <header>
        <div class="logo">
            <a href="index.php"><img src="img/logo.png" title="Magnetic" alt="Magnetic" /></a>
        </div><!-- end logo -->
        <div id="menu_icon"></div>
        <nav>
            <ul>
                <li>
                    <a href="#">
                        <div class="box">
                            <div class="container-4">
                                <form action="./search_character.php" method="POST">
                                    <input required type="search" id="search" name="search" placeholder="Tìm kiếm nhân vật" />
                                    <button class="icon" name="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="box">
                            <div class="container-4">
                                <form action="./search_affiliation.php" method="POST">
                                    <input type="search" id="search" name="search" placeholder="Tìm kiếm chi nhánh" />
                                    <button class="icon" name="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="box">
                            <div class="container-4" >
                                <form action="./search_faction.php"method="POST">
                                    <input type="search" id="search" name="search" placeholder="Tìm kiếm băng nhóm" />
                                    <button class="icon" name="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </a>
                </li>
                <li><a href="index.php">Trang chủ</a></li>
                <li><a href="#">Đọc truyện</a></li>
                <li><a href="./location.php">Địa điểm</a></li>
                <li><a href="./affiliation.php">Chi nhánh</a></li>
                <li><a href="./faction.php">Băng đảng</a></li>
                <li><a href="./character.php">Nhân vật</a></li>
            </ul>
        </nav><!-- end navigation menu -->

        <div class="footer clearfix" style="margin-top: 100px;">
            <ul class="social clearfix">
                <li><a href="#" class="fb" data-title="Facebook"></a></li>
                <li><a href="#" class="google" data-title="Google +"></a></li>
                <li><a href="#" class="behance" data-title="Behance"></a></li>
                <!--<li><a href="#" class="twitter" data-title="Twitter"></a></li>
				<li><a href="#" class="dribble" data-title="Dribble"></a></li>-->
                <!-- <li><a href="#" class="rss" data-title="RSS"></a></li> -->
            </ul><!-- end social -->

            <div class="rights">
                <p>Copyright © NTH</p>
            </div><!-- end rights -->
        </div><!-- end footer -->
    </header>
</body>

</html>