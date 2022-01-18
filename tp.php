<?php
    $tab = range(0, 41);
    shuffle($tab);
    $tab = array_slice($tab, 0, 16);
    $tab = array_merge($tab, $tab);
    shuffle($tab);
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

		body > table {
			margin: 20px;
			padding: 30px;
			border-radius: 15px;
			background-color: white;
            text-align: center;
		}

        table { border-collapse: collapse; margin-bottom: 30px; }
        td img { margin: 0; padding: 3px; }
    </style>
</head>
<body>
    <table>
        <?php
            for($i=0; $i<4; $i++) {
                ?>
                    <tr>
                        <?php
                            for($j=0; $j<8; $j++) {
                                echo "<td><img src='./images/".$tab[$i*8+$j].".jpg' alt='pict".$tab[$i*8+$j]."' width='100'></td>";
                            }
                        ?>
                    </tr>
                <?php
            }
        ?>
    </table>
</body>
</html>