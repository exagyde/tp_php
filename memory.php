<?php
    session_start();
    $tab = [];

    if(isset($_SESSION["tab"]) && !empty($_SESSION["tab"])) {
        $tab = $_SESSION["tab"];
    }

    if(isset($_GET["key"]) && (!empty($_GET["key"]) || $_GET["key"] == 0)) {
        if(isset($_SESSION["select"]) && (!empty($_SESSION["select"]) || $_SESSION["select"] == 0) && $tab[$_GET["key"]] == $tab[$_SESSION["select"]]) {
            $tab[$_GET["key"]] = "blank";
            $tab[$_SESSION["select"]] = "blank";
            $_SESSION["tab"] = $tab;
            if(count(array_unique($tab)) == 1) {
                header("Location: ./memory.php");
            }
        }
        $_SESSION["select"] = $_GET["key"];
    } else {
        $tab = range(0, 41);
        shuffle($tab);
        $tab = array_slice($tab, 0, 16);
        $tab = array_merge($tab, $tab);
        shuffle($tab);
        $_SESSION["tab"] = $tab;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Memory</title>
    <style>
        body {
			margin: 0;
			padding: 0;
			height: 100vh;
			display: flex;
			flex-direction: column;
			justify-content: center;
			align-items: center;
			background-color: black;
			font-family: "Arial";
			font-size: 1.2em;
		}

		body > article {
			margin: 20px;
			padding: 30px;
			border-radius: 15px;
			background-color: white;
            text-align: center;
		}

		.btn {
			all: unset;
			color: white;
			background-color: black;
			margin: 15px;
			padding: 10px;
			border-radius: 10px;
			font-weight: bold;
			text-align: center;
			transition: background-color 1s;
		}
		.btn:hover {
			cursor: pointer;
			background-color: grey;
		}

        table { border-collapse: collapse; margin-bottom: 30px; }
        td img { margin: 0; padding: 3px; }
        td.select img { border: 3px solid black; padding: 0; }
        td img:hover { filter: grayscale(100%); }
    </style>
</head>
<body>
    <article>
        <table>
            <?php
                for($i=0; $i<4; $i++) {
                    ?>
                        <tr>
                            <?php
                                for($j=0; $j<8; $j++) {
                                    if(isset($_GET["key"]) && (!empty($_GET["key"]) || $_GET["key"] == 0) && $i*8+$j == $_GET["key"]) {
                                        echo "<td class='select'><a href='./memory.php?key=".($i*8+$j)."'><img src='./images/".$tab[$i*8+$j].".jpg' alt='pict".$tab[$i*8+$j]."' width='100'></a></td>";
                                    } else {
                                        echo "<td><a href='./memory.php?key=".($i*8+$j)."'><img src='./images/".$tab[$i*8+$j].".jpg' alt='pict".$tab[$i*8+$j]."' width='100'></a></td>";
                                    }
                                }
                            ?>
                        </tr>
                    <?php
                }
            ?>
        </table>
        <a href="./memory.php" class="btn">RESET</a>
    </article>
</body>
</html>