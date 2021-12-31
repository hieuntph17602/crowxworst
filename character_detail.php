<?php
require_once './db/character.php';
require_once './db/connection.php';
$id_character = $_GET['id_character'];
$dataCharacter = findCharacterById($id_character);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>CrowXworst | <?php echo $dataCharacter['name_character'] ?></title>
    <meta charset="utf-8">
    <meta name="author" content="pixelhint.com">
    <meta name="description" content="Magnetic is a stunning responsive HTML5/CSS3 photography/portfolio website  template" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <link rel="short icon" href="./img/crow-head-vector-24390236.jpg">
    <script type="text/javascript" src="js/main.js"></script>
    <link rel="stylesheet" href="./css/loading.css">
    <style>
        table {
            border: 1px solid #ccc;
            border-collapse: collapse;
            margin: 0;
            padding: 0;
            width: 100%;
            table-layout: fixed;
        }

        table caption {
            font-size: 1.5em;
            margin: .5em 0 .75em;
        }

        table tr {
            background-color: #f8f8f8;
            border: 1px solid #ddd;
            padding: .35em;
        }

        table th,
        table td {
            padding: .625em;
            text-align: center;
        }

        table th {
            font-size: .85em;
            letter-spacing: .1em;
            text-transform: uppercase;
        }

        @media screen and (max-width: 600px) {
            table {
                border: 0;
            }

            table caption {
                font-size: 1.3em;
            }

            table thead {
                border: none;
                clip: rect(0 0 0 0);
                height: 1px;
                margin: -1px;
                overflow: hidden;
                padding: 0;
                position: absolute;
                width: 1px;
            }

            table tr {
                border-bottom: 3px solid #ddd;
                display: block;
                margin-bottom: .625em;
            }

            table td {
                border-bottom: 1px solid #ddd;
                display: block;
                font-size: .8em;
                text-align: right;
            }

            table td::before {
                /*
    * aria-label has no advantage, it won't be read inside a table
    content: attr(aria-label);
    */
                content: attr(data-label);
                float: left;
                font-weight: bold;
                text-transform: uppercase;
            }

            table td:last-child {
                border-bottom: 0;
            }
        }
    </style>
</head>

<body class="preloading">
    <div class="load">
        <img src="./img/loading.gif">
    </div>
    <?php require_once './header.php' ?>

    <!-- end header -->

    <section class="main clearfix">
        <section class="top" style="background-image:url('./img/<?= $dataCharacter['image_character'] ?>');">
            <div class="wrapper content_header clearfix">
                <h1 class="title"><?= $dataCharacter['name_character'] ?></h1>
            </div>
        </section><!-- end top -->

        <section class="wrapper">
            <table>
                <caption>Statement Summary</caption>
                <thead>
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Account</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td data-label="Image"><img src="./img/<?=$dataCharacter['image_character']?>" alt="" srcset=""></td>
                    </tr>
                        <td data-label="Account">Visa - 3412</td>
                        <td data-label="Account">Visa - 3412</td>
                </tbody>
            </table>
            <div class="content">
                <?= $dataCharacter['history_character'] ?>
            </div><!-- end content -->
        </section>
    </section><!-- end main -->
    <script src="./js/loading.js"></script>
</body>

</html>