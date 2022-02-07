<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
<title>packs</title>
</head>
<body>
<a href="index.php">to home</a>
    <?php 
        $q1 = "SELECT * FROM packs ORDER BY pack_id" ;
        $r = mysqli_query($con,$q1);
        $length = mysqli_num_rows($r);
        if($length>0)
        {
            
            $c=0;
            echo "<table cellpadding='20'>";
            for($i=0;$i*3<=$length;$i++)
            {
                echo "<tr>";
                for($j=0;$j<3;$j++)
                {
                    for($k=0;$k<$row = mysqli_fetch_assoc($r);$k++){
                    if($c<$length)
                    {
                        echo "<td><form name='image' action='opening.php' method='post'>";
                        echo "<input type='hidden' name='pack' value='$row[pack_id]'>";
                        echo "<input type='hidden' name='price' value='$row[price]'>";
                        echo "<button type='submit'><img src='$row[image]' width='200px'></button></form>";
                        echo "<div style='text-align:center;font-size:24px;font-weight:900;'>$row[price]<br>$row[name]</div></td>";
                        $c++;
                    }
                    else
                        echo "<td></td>";
                    }
                }
                echo "</tr>";
            }
            echo "</table>";
        }
    ?>
    </table>
</body>
</html>