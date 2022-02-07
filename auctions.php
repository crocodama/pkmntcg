<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Auctions</title>
</head>
<body>
<a href="index.php">home</a><br>
<?php
    if($_POST['subuy']!=null)
    {
        $q3="SELECT users.user_id,users.money,album.card_id,album.amount FROM album INNER JOIN users WHERE album.user_id=users.user_id AND album.user_id='$user_data[user_id]'";
        $r3 = mysqli_query($con,$q3);
        /*if($r3)
            echo "noice";
        else
            echo mysqli_error($con);*/
        $albm = mysqli_fetch_assoc($r3);
        $prc=$_POST['prc'];
        $mny=$albm['money'];
        if($mny<$prc)
        {
            echo "not enough money!";
        }
        else
        {
            $a = $mny-$prc;
            $q4 = "UPDATE users SET money='$a' WHERE user_id='$user_data[user_id]'";
            mysqli_query($con,$q4);
            $cid=$_POST['cid'];
            $q4 = "SELECT amount FROM album WHERE user_id='$user_data[user_id]' AND card_id='$cid'";
            $r4 = mysqli_query($con,$q4);
            /*if($r4)
                echo "noice";
            else
                echo mysqli_error($con);*/
            $bb = mysqli_fetch_assoc($r4);
            $am = $_POST['amnt'];
            $am2 = $bb['amount'];
            if(mysqli_num_rows($r4)>0)
            {
                $fam = $am+$am2;
                $q5 = "UPDATE album SET amount='$fam' WHERE user_id='$user_data[user_id]' AND card_id='$cid'";
                mysqli_query($con,$q5);
                echo "bought!";
            }
            else
            {
                $q5 = "INSERT INTO album VALUES('$user_data[user_id]','$cid','$am')";
                if(!mysqli_query($con,$q5))
                    echo mysqli_error($con);
                else
                {
                    mysqli_query($con,$q5);echo "bought!";}
            }
            $sid = $_POST['seller'];
            $q6 = "SELECT money FROM users WHERE user_id='$sid'";
            $r6 = mysqli_query($con,$q6);
            $money2 = mysqli_fetch_assoc($r6);
            $mon2 = $money2['money'];
            $mon3 = $mon2+$prc;
            $q7 = "UPDATE users SET money='$mon3' WHERE user_id='$sid'";
            mysqli_query($con,$q7);
            $aid = $_POST['aid'];
            $q8 = "DELETE FROM auctions WHERE auction_id='$aid'";
            mysqli_query($con,$q8);
            
        }
    }
    echo "<form action='auctions.php' method='post'><input type='submit' name='prc' value='orgenize-price'></form>";
    echo "<form action='auctions.php' method='post'><input type='submit' name='num' value='orgenize-number'></form>";
    echo "<form action='auctions.php' method='post'><input type='submit' name='set' value='orgenize-set'></form>";
    $c=0;
    echo "<table cellpadding='20' border='1'>";
    echo "<tr><td>seller name</td><td>card image</td><td>card name</td><td>amount</td><td>card number</td><td>card rarity</td><td>card set</td><td>price</td><td></td></tr>";
    $q2 = "SELECT * FROM auctions";
    $r2 = mysqli_query($con,$q2);
    $q1="SELECT users.user_id,users.user_name,auctions.seller_id,auctions.card_id,auctions.price,auctions.amount,auctions.auction_id,cards.card_id,cards.image,cards.pack_id,cards.rarity,cards.name,cards.number FROM auctions INNER JOIN cards INNER JOIN users WHERE auctions.card_id=cards.card_id AND users.user_id=auctions.seller_id ";
    if($_POST['prc']!=null)
    $q1="SELECT users.user_id,users.user_name,auctions.seller_id,auctions.card_id,auctions.price,auctions.amount,auctions.auction_id,cards.card_id,cards.image,cards.pack_id,cards.rarity,cards.name,cards.number FROM auctions INNER JOIN cards INNER JOIN users WHERE auctions.card_id=cards.card_id AND users.user_id=auctions.seller_id ORDER BY auctions.price";
    if($_POST['num']!=null)
    $q1="SELECT users.user_id,users.user_name,auctions.seller_id,auctions.card_id,auctions.price,auctions.amount,auctions.auction_id,cards.card_id,cards.image,cards.pack_id,cards.rarity,cards.name,cards.number FROM auctions INNER JOIN cards INNER JOIN users WHERE auctions.card_id=cards.card_id AND users.user_id=auctions.seller_id ORDER BY cards.number";
    if($_POST['set']!=null)
    $q1="SELECT users.user_id,users.user_name,auctions.seller_id,auctions.card_id,auctions.price,auctions.amount,auctions.auction_id,cards.card_id,cards.image,cards.pack_id,cards.rarity,cards.name,cards.number FROM auctions INNER JOIN cards INNER JOIN users WHERE auctions.card_id=cards.card_id AND users.user_id=auctions.seller_id ORDER BY cards.pack_id";
        $r1 = mysqli_query($con,$q1);
    for($i=0;$i<mysqli_num_rows($r2);$i++)
    {
        $auctions = mysqli_fetch_assoc($r1);
        if($c<mysqli_num_rows($r2))
        {
            echo "<form name='sold' method='post' action='auctions.php'><tr>";
            echo "<td>$auctions[user_name]</td>";
            echo "<td><img src='$auctions[image]' width='50px'></td>";
            echo "<td>$auctions[name]</td>";
            echo "<td>$auctions[amount]</td>";
            echo "<td>$auctions[number]</td>";
            switch ($auctions['rarity'])
            {
                case 1: echo "<td>common</td>";
                break;
                case 2: echo "<td>uncommon</td>";
                break;
                case 3: echo "<td>rare</td>";
                break;
                case 4: echo "<td>ultra rare</td>";
                break;
            }
            switch($auctions['pack_id'])
            {
                case 83: echo "<td>Sword & Shield Base Set</td>";
                break;
                case 84: echo "<td>Sword & Shield Rebel Clash</td>";
                break;
                case 85: echo "<td>Sword & Shield Darkness Ablaze</td>";
                break;
                case 86: echo "<td>Sword & Shield Vivid Voltage</td>";
                break;
            }
            echo "<td>$auctions[price]</td>";
            echo "<input type='hidden' name='seller' value='$auctions[user_id]'><input type='hidden' name='amnt' value='$auctions[amount]'><input type='hidden' name='prc' value='$auctions[price]'><input type='hidden' name='cid' value='$auctions[card_id]'><input type='hidden' name='aid' value='$auctions[auction_id]'>";
            //<input type='hidden' name='' value=''>
            echo "<td><input type='submit' id='subuy' name='subuy' value='buy'/></td></tr></form>";
            $c++;
        }
        else
            echo "<tr><td></td></tr>";
    }
?>
</body>
</html>