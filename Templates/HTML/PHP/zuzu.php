<!DOCTYPE html>
<html>
<head>
    <title>Order Form Example</title>
    <link href="sushi.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
</head>

<body>
    <h1><a href="/Templates/HTML/PHP/index.php">Welkom bij ZUZU</a></h1>
    <img src="/img/2163026.jpg" alt="lol">
    <link rel="stylesheet" href="/Public/CSS/CSS/zuzu.css">

    <?php
    // require "index.php";
    require_once('database.php');
    require('process2.php');
    // (A) PROCESS ORDER FORM
    if (isset($_POST["name"])) {

        echo $result == ""
            ? "<div class='notify'>Bedankt! uw bestelling komt eraan!</div>"
            : "<div class='notify'>$result</div>";
    }
    ?>

    <form id="orderform" method="post" target="_self">
        <label for="name">Naam:</label>
        <input type="text" name="name" required value="" />
        
        <label for="email">Email:</label>
        <input type="email" name="email" required value="" />
        <br><br>
        <label for="address">Address:</label>
        <input type="text" name="address" required value="" />
        
        <label for="zipcode">Postcode:</label>
        <input type="text" name="zipcode" required value="" />
        <br><br>
        <label for="city">Stad:</label>
        <input type="text" name="city" required value="" />




        <form method="post">
            <select name="sushi_id">
                <option selected disabled value="">Kies een sushi!</option>
                <?php
                global $pdo;
                $sql = $pdo->prepare("SELECT * FROM sushi");
                $sql->execute();
                $result = $sql->fetchAll(PDO::FETCH_ASSOC);

                foreach ($result as $data) {
                    echo "
                    <option selected enabled id='$data[id]' value='$data[name]'>" . $data['name'] .  ". Vooraad: " . $data['amount'] . "</option>
                ";
                }
                ?>
            </select> <br>
            <p class=hoeveelheid>Aantal</p>
            <input type="number" name="amount" placeholder="1"> <br>

            <input type="submit" name="submit">
        </form>

        <?php
        global $pdo;
        if (isset($_POST['submit'])) {
            if ($_POST['amount'] != 0 && !empty($_POST['amount'])) {
                $amount = $_POST['amount'];
                $sushi = $_POST['sushi_id'];


                $sql = $pdo->prepare("SELECT * FROM sushi");
                $sql->execute();
                $result = $sql->fetchAll(PDO::FETCH_ASSOC);

                foreach ($result as $data) {
                    if ($data['name'] == $sushi) {
                        $sn = $data['name'];
                        $sp = $data['price'];
                        $id = $data['id'];
                        $sa = $amount;
                        if ($sa > 1) {
                            $stp = $data['price'] * $sa;
                        } else {
                            $stp = $sp;
                        }
                    }
                }

                $new_amount = $data['amount'] - $amount;

                if ($amount > $data['amount']) {
                    echo 'Je kunt niet meer bestellen dan onze vooraad.';
                } else {
                    $sql2 = $pdo->prepare("UPDATE sushi SET amount = $new_amount WHERE id = $id");
                    $sql2->execute();

                    echo "<table>

                    <tr>
                        <th>Sushi</th>
                        <th>Prijs</th>
                        <th>Hoeveelheid</th>
                        <th>Totaal Prijs</th>
                    </tr>
                    <tr>
                        <td>" . $sn . "</td>
                        <td>" . $sp . "</td>
                        <td>" . $sa . "</td>
                        <td>" . $stp . "</td>
                    </tr>
                </table>";
                }

                // $sql2 = $pdo->prepare("SELECT * FROM sushi WHERE id = '$id'");
                // $sql2->execute();
                // $result2 = $sql2->fetchAll(PDO::FETCH_ASSOC);

                // $available = $result2['amount'];
                // $uitslag = $available - $sa;

                // $sql3 = $pdo->prepare("UPDATE sushi SET amount = '$uitslag' WHERE id = '$id'");
                // $sql3->execute();
            } else {
                echo '<script>alert("Fill in all fields.");</script>';
            }
        }
        ?>



</body>

</html>