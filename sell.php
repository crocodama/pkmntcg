<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
	<title>sell</title>
</head>
<body>
    <a href="index.php">home</a>
    <?php
        if($_POST['cnfsell']!=null)
        {
            $id=rand(1,99999);
            $q1 = "SELECT * FROM auctions WHERE auction_id='$id'";
            $r1 = mysqli_query($con,$q1);
            while(mysqli_num_rows($r1)>0)
                $id=rand(1,99999);
            $cid = $_POST['cid'];
            $prc = $_POST['prc'];
            $amnt = $_POST['amnt'];
            if($cid != null&&$prc!=null&&$amnt!=null){//seller_id, card_id, price, amount, auction_id
            $q2 = "INSERT INTO auctions VALUES('$user_data[user_id]','$cid','$prc','$amnt','$id')";
            $r2 = mysqli_query($con,$q2);
            if(!$r2)
                echo mysqli_error($con);
                else{
            $q3 = "SELECT amount FROM album WHERE user_id='$user_data[user_id]' AND card_id='$cid'";
            $r3 = mysqli_query($con,$q3);
            $aa = mysqli_fetch_assoc($r3);
            if($aa['amount']==$amnt)
            {
                $q4 = "DELETE FROM album WHERE user_id='$user_data[user_id]' AND card_id='$cid'";
                $r4 = mysqli_query($con,$q4);
            }
            else
            {
                $am = $aa['amount']-$amnt;
                $q4 = "UPDATE album SET amount='$am' WHERE user_id='$user_data[user_id]' AND card_id='$cid'";
                $r4 = mysqli_query($con,$q4);
            }
            echo "sold!";}}
            else echo "null";
        }
        if($_POST['subsell']!=null)
        {
            if($_POST['price']==null)
                echo "price is not written.";
            else
            {
                echo "are you sure you want to sell $_POST[amount] $_POST[name] for $_POST[price]?";
                echo "<form name='aaa' method='post' action='sell.php'>";
                echo "<input type='hidden' name='cid' value='$_POST[cid]'>";
                echo "<input type='hidden' name='amnt' value='$_POST[amount]'>";
                echo "<input type='hidden' name='prc' value='$_POST[price]'>";
                echo "<input type='submit' name='cnfsell' value='yes'></form>";
            }
        }
        else
        {
            echo "<form name='select' action='sell.php' method='post'>";
            echo "<table>";
            echo "<tr><td><input type='submit' name='swshbase' value='sword & shield base set'/></td></tr>";
            echo "<tr><td><input type='submit' name='swshrebel' value='sword & shield rebel clash'/></td></tr>";
            echo "<tr><td><input type='submit' name='swshdarkness' value='sword & shield darkness ablaze'/></td></tr>";
            echo "<tr><td><input type='submit' name='swshvivid' value='sword & shield vivid voltage'/></td></tr>";
            echo "</table></form>";
            if($_POST['swshbase']!=null)
            {
                $q1 = "SELECT user_id, album.card_id,album.amount,cards.image,cards.name,cards.number,cards.pack_id,album.amount FROM album INNER JOIN cards WHERE album.card_id = cards.card_id AND cards.pack_id='83' AND album.user_id='$user_data[user_id]' ORDER BY card_id";
                $r1 = mysqli_query($con,$q1);
                echo mysqli_error($con);
                
                if(mysqli_num_rows($r1)<=0)
                    echo "there are no cards from this set in your album.";
                else
                {
                    $c=0;
                    echo "<table cellpadding='20'>";
                    for ($i = 0; $i * 5 <= mysqli_num_rows($r1); $i++)
                    {
                        echo "<tr>";
                        for ($j = 0; $j < 5; $j++)
                        {
                            if($c<mysqli_num_rows($r1))
                            {
                                $albumbase = mysqli_fetch_assoc($r1);
                                //print_r($albumbase);
                                echo "<form action='sell.php' method='post'>";
                                echo "<input type='hidden' name='cid' value='$albumbase[card_id]'>";
                                echo "<td><div style='text-align:center;font-size:24px;font-weight:900'><img src='$albumbase[image]' width='200px'/><br>";
                                echo "<input type='hidden' name='name' value='$albumbase[name]'>$albumbase[name]<br>";
                                echo "amount:<select name='amount' id='amount'>";
                                for($k=1;$k<=$albumbase['amount'];$k++)
                                    echo "<option value='$k'>$k</option>";
                                echo "</select><br/>price:<input type='number' name='price' min='0.01' max='99999.99' step='0.01'><br/><input type='submit' name='subsell' id='subsell' value='sell cards'/></div></td></form>";
                                $c++;
                            }
                            else
                                echo "<td></td>";
                        }
                        echo "</tr>";
                    }
                    echo "</table>";
                }
            }
        }
    ?>
</body>
</html>