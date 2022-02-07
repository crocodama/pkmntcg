<?php 
session_start();

	include("connection.php");
	//include("functions.php");
    include("classes.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
	<title>album</title>
</head>
<body>
    <a href="index.php">to home</a>
<?php
    $q1="SELECT * FROM album WHERE user_id='$user_data[user_id]' ORDER BY card_id";
    $r1=mysqli_query($con,$q1);
    $album=mysqli_fetch_assoc($r1);
    //save all
    if($_POST['saveall'])
    {
        //echo "hi";
        $sum=$_POST['sumh'];
        //echo $sum;
        $cc[0]=$_POST['saveh0'];
        $cc[1]=$_POST['saveh1'];
        $cc[2]=$_POST['saveh2'];
        $cc[3]=$_POST['saveh3'];
        $cc[4]=$_POST['saveh4'];
        $cc[5]=$_POST['saveh5'];
        $cc[6]=$_POST['saveh6'];
        $cc[7]=$_POST['saveh7'];
        $cc[8]=$_POST['saveh8'];
        $cc[9]=$_POST['saveh9'];
        
        for($i=0;$i<10;$i++)
        {
            /*$q2 = "SELECT * FROM cards WHERE card_id='$cc[$i]'";
            $r2= mysqli_query($con,$q2);
            $table = mysqli_fetch_assoc($r2);
            $tablel = mysqli_num_rows($r2);*/
            $cid = $cc[$i];
            //echo $cid;//working
            $q3 = "SELECT amount FROM album WHERE user_id='$user_data[user_id]' AND card_id='$cid'";
            $r3 = mysqli_query($con,$q3);
            $amount =mysqli_fetch_assoc($r3);
            //echo $amount['amount'];
            if($amount['amount']>0)
            {
                $aa = $amount['amount']+1;
                $q4 = "UPDATE album SET amount='$aa' WHERE user_id='$user_data[user_id]' AND card_id='$cid'";
                $r4 =mysqli_query($con,$q4);
                /*if($r4)
                    echo "updated";
                else
                    echo mysqli_error($con);*/
            }
            else
            {
                
                $q5 = "INSERT INTO album (user_id,card_id,amount) VALUES ('$user_data[user_id]','$cid','1')";
                $r5 = mysqli_query($con,$q5);
                /*if($r5)
                    echo "inserted";
                else
                    echo mysqli_error($con);*/
            }
        }
    }
    //sell all
    if($_POST['sellall']!=null)
    {
        $q1 = "SELECT money FROM users WHERE user_id='$user_data[user_id]'";
        $r1 = mysqli_query($con,$q1);
        $mon = mysqli_fetch_assoc($r1);
        $money = $_POST['sum'];
        $a = (double)$mon['money']+(double)$money;
        $q2 = "UPDATE users SET money='$a' WHERE user_id='$user_data[user_id]'";
        $r2 = mysqli_query($con,$q2);
        echo "$money added!";
    }
    //not save duplicates
    if($_POST['selldup']!=null)
    {
        $cc[0]=$_POST['savec0'];
        $cc[1]=$_POST['savec1'];
        $cc[2]=$_POST['savec2'];
        $cc[3]=$_POST['savec3'];
        $cc[4]=$_POST['savec4'];
        $cc[5]=$_POST['savec5'];
        $cc[6]=$_POST['savec6'];
        $cc[7]=$_POST['savec7'];
        $cc[8]=$_POST['savec8'];
        $cc[9]=$_POST['savec9'];
        $q1 = "SELECT money FROM users WHERE user_id='$user_data[user_id]'";
        $r1 = mysqli_query($con,$q1);
        $mon = mysqli_fetch_assoc($r1);
        //echo $mon['money'];
        $money = 0;
        for($i=0;$i<10;$i++){
            //echo $cc[$i];
            $q1 = "SELECT price FROM cards WHERE card_id='$cc[$i]'";
            $r1 = mysqli_query($con,$q1);
            $bb = mysqli_fetch_assoc($r1);
            $money +=(double)$bb['price'];}
        $a = (double)$mon['money']+(double)$money;
        //echo $a;
        $q2 = "UPDATE users SET money='$a' WHERE user_id='$user_data[user_id]'";
        $r2 = mysqli_query($con,$q2);
        for($i=0;$i<10;$i++)
        {
            if($cc[$i]!=null){
            $q3 = "SELECT amount FROM album WHERE user_id='$user_data[user_id]' AND card_id='$cc[$i]'";
            $r3 = mysqli_query($con,$q3);
            $amount =mysqli_fetch_assoc($r3);
            if($amount['amount']>0)
            {
                $aa = $amount['amount']+1;
                $q4 = "UPDATE album SET amount='$aa' WHERE user_id='$user_data[user_id]' AND card_id='$cid'";
                $r4 =mysqli_query($con,$q4);
                /*if($r4)
                    echo "updated";
                else
                    echo mysqli_error($con);*/
            }
            else
            {
                
                $q5 = "INSERT INTO album (user_id,card_id,amount) VALUES ('$user_data[user_id]','$cc[$i]','1')";
                $r5 = mysqli_query($con,$q5);
            }
            /*$q3 = "SELECT * FROM cards WHERE card_id='$cc[$i]'";
            $r3 = mysqli_query($con,$q3);
            $table = mysqli_fetch_assoc($r3);
            if(mysqli_query($con,$q3))
            {
                $temp = new obj_card($table['card_id'],$table['image'],$table['price'],$table['pack_id'],$table['rarity'],$table['name'],$table['number']);
                $ca[$i] = $temp; 
            }
            //if($table)
            //{
                $q4 = "INSERT INTO album VALUES (user_data['user_id'],,1)";
                $r4 = mysqli_query($con,$q4);
            //}*/
        }}
    }
    echo "<form name='org' action='album.php' method='post'>";
    echo "<table>";
    echo "<tr><td><input type='submit' name='swshbase' value='sword & shield base set'/></td></tr>";
    echo "<tr><td><input type='submit' name='swshrebel' value='sword & shield rebel clash'/></td></tr>";
    echo "<tr><td><input type='submit' name='swshdarkness' value='sword & shield darkness ablaze'/></td></tr>";
    echo "<tr><td><input type='submit' name='swshvivid' value='sword & shield vivid voltage'/></td></tr>";
    echo "</table></form>";
    //show base set
    if($_POST['swshbase']!=null)
    {
        $q1 = "SELECT album.user_id, album.card_id,cards.image,cards.name,cards.number,cards.pack_id,album.amount FROM album INNER JOIN cards WHERE album.card_id = cards.card_id AND cards.pack_id='83' AND album.user_id='$user_data[user_id]' ORDER BY card_id";
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
                        echo "<td><div style='text-align:center;font-size:24px;font-weight:900'>$albumbase[name]<br>";
                        echo "<img src='$albumbase[image]' width='200px'/><br>";
                        echo "amount: $albumbase[amount] <br>$albumbase[number]</div></td>";
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
    //show rebel clash
    if($_POST['swshrebel']!=null)
    {
        $q1 = "SELECT user_id, album.card_id,cards.image,cards.name,cards.number,cards.pack_id,album.amount FROM album INNER JOIN cards WHERE album.card_id = cards.card_id AND cards.pack_id='84' AND album.user_id='$user_data[user_id]' ORDER BY card_id";
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
                        echo "<td><div style='text-align:center;font-size:24px;font-weight:900'>$albumbase[name]<br>";
                        echo "<img src='$albumbase[image]' width='200px'/><br>";
                        echo "amount: $albumbase[amount] <br>$albumbase[number]</div></td>";
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
    //show darkness
    if($_POST['swshdarkness']!=null)
    {
        $q1 = "SELECT user_id, album.card_id,cards.image,cards.name,cards.number,cards.pack_id,album.amount FROM album INNER JOIN cards WHERE album.card_id = cards.card_id AND cards.pack_id='85' AND album.user_id='$user_data[user_id]' ORDER BY card_id";
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
                        echo "<td><div style='text-align:center;font-size:24px;font-weight:900'>$albumbase[name]<br>";
                        echo "<img src='$albumbase[image]' width='200px'/><br>";
                        echo "amount: $albumbase[amount] <br>$albumbase[number]</div></td>";
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
    //show vivid
    if($_POST['swshvivid']!=null)
    {
        $q1 = "SELECT user_id, album.card_id,cards.image,cards.name,cards.number,cards.pack_id,album.amount FROM album INNER JOIN cards WHERE album.card_id = cards.card_id AND cards.pack_id='86' AND album.user_id='$user_data[user_id]' ORDER BY card_id";
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
                        echo "<td><div style='text-align:center;font-size:24px;font-weight:900'>$albumbase[name]<br>";
                        echo "<img src='$albumbase[image]' width='200px'/><br>";
                        echo "amount: $albumbase[amount] <br>$albumbase[number]</div></td>";
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
?>
</body>
</html>