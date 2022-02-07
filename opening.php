<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
	<title>opening</title>
</head>
<body>
<?php
    for($i=0;$i<10;$i++)
    {
        $savedp[$i]=0;
    }
    $pricee= (double)$_POST['price'];
    $q1="SELECT money FROM users WHERE user_id='$user_data[user_id]'";
    $r1=mysqli_query($con,$q1);
    $money = mysqli_fetch_assoc($r1);
    //echo $money['money'];
    if((double)$money<(double)$pricee)
    {
        echo "you do not have enough money for this pack!";
    }
    else
    {
        $a = (double)$money-(double)$price;
        $q2="UPDATE users SET money='$a' WHERE user_id = '$user_data[user_id]'";
        $pack=$_POST['pack'];
        echo "<table cellpadding='20'><tr>";
        for($i=0;$i<5;$i++)
        {
            $q2= "SELECT * FROM cards WHERE pack_id='$pack' AND rarity = '1' ORDER BY RAND() LIMIT 1";
            $r2=mysqli_query($con,$q2);
            $common=mysqli_fetch_assoc($r2);
            echo "<td><img src='$common[image]' width='200px'><div style='text-align:center;font-size:24px;font-weight:900'>$common[price]</div></td>";
            $savedp[$i]=$common['card_id'];
            $sum+=$common['price'];
        }
        echo "</tr><tr>";
        for($i=5;$i<9;$i++)
        {
            $q3= "SELECT * FROM cards WHERE pack_id='$pack' AND rarity = '2' ORDER BY RAND() LIMIT 1";
            $r3=mysqli_query($con,$q3);
            $uncommon=mysqli_fetch_assoc($r3);
            echo "<td><img src='$uncommon[image]' width='200px'><div style='text-align:center;font-size:24px;font-weight:900'>$uncommon[price]</div></td>";
            $savedp[$i]=$uncommon['card_id'];
            $sum+=$uncommon['price'];
        }
        $mif = rand(1,101);
        if($mif>95)
        {
            $q5= "SELECT * FROM cards WHERE pack_id='$pack' AND rarity = '4' ORDER BY RAND() LIMIT 1";
            $r5=mysqli_query($con,$q5);
            $ultrarare=mysqli_fetch_assoc($r5);
            $rndultrarare = random_num($ultrararel);
            echo "<td><img src='$ultrarare[image]' width='200px'><div style='text-align:center;font-size:24px;font-weight:900'>$ultrarare[price]</div></td>";
            $savedp[9]=$ultrarare['card_id'];
            $sum+=$ultrarare['price'];
        }
        else
        {
            $q4= "SELECT * FROM cards WHERE pack_id='$pack' AND rarity = '3' ORDER BY RAND() LIMIT 1";
            $r4=mysqli_query($con,$q4);
            $rare=mysqli_fetch_assoc($r4);
            $rndrare = random_num($rarel);
            echo "<td><img src='$rare[image]' width='200px'><div style='text-align:center;font-size:24px;font-weight:900'>$rare[price]</div></td>";
            $savedp[9]=$rare['card_id'];
            $sum+=$rare['price'];
        }
        echo "</tr></table>";
        /*foreach( $savedp as $aaa ) {
            echo $aaa;
        }*/
        echo "your earning from this opening: $sum";
        //save all
        echo "<form action='album.php' method='post'>";
        for($i=0;$i<10;$i++){
            echo "<input type='hidden' name='saveh$i' value = '$savedp[$i]'>";}
        echo "<input type='hidden' name='sumh' value='$sum'>";
        echo "<input type='submit' name='saveall' value='save to album'/></form>";
        //sell all
        echo "<form action='album.php' method='post' id='sell' name='sell'><input type='hidden' name='sum' value='$sum'/><input type='submit' name='sellall' value='sell all'/></form>";
        //sell dup
        echo "<form action='album.php' method='post' id='selldup'>";
        for ($i = 0; $i < count($savedp); $i++)
        {
            if(!checkdup($con,$savedp[$i]))
                echo "<input type='hidden' name='savec$i' value='$savedp[$i]'/>";
        }   
        echo "<input type='submit' name='selldup' value='sell duplicates'/></form>";

    }
    
?>
</body>
</html>