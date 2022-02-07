<?php

function check_login($con)
{

	if(isset($_SESSION['user_id']))
	{

		$id = $_SESSION['user_id'];
		$query = "select * from users where user_id = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}

	//redirect to login
	header("Location: login.php");
	die;

}

function random_num($length)
{

	$text = "";
	if($length < 5)
	{
		$length = 5;
	}

	$len = rand(4,$length);

	for ($i=0; $i < $len; $i++) { 
		# code...

		$text .= rand(0,9);
	}

	return $text;
}

function duplicates($con,$arr)
{
    $cea=0;
    /*$q1= "SELECT * FROM '$arr";
    $r1= mysqli_query($con,$q1);
    $row=mysqli_fetch_assoc($r1);
    $arrlength=mysqli_num_rows($r1);*/
    for($i=0;$i<count($arr);$i++)
    {
        $sumdup=0;
        $q2= "SELECT * FROM album INNER JOIN cards WHERE card_id=$arr[$i].";
        $r2= mysqli_query($con,$q2);
        $tab1=mysqli_fetch_assoc($r2);
        if(mysqli_num_rows($r2)>0)
        {
           // $carddup[$cea]=0;
            $sumdup += $tab1['price'];
        }
        else
        {
            if(check($arr,$arr[$i],$i,$con))
            {
               // $carddup[$cea]=0;
                $sumdup+=$tabs1['price'];
            }
            else
            {
               // $carddup[$cea]=$arr[$i];
                $cea++;
            }
        }
    }
    return $cea;
}

function check($arr,$num,$index,$con)
{
    $q1= "SELECT * FROM cards";
    $r1= mysqli_query($con,$q1);
    $row=mysqli_fetch_assoc($r1);
    $arrlength=mysqli_num_rows($r1);
    for($i=$index+1;$i<$arrlength;$i++)
    {
        if($arr[$i]==$num)
        {
            return true;
        }
    }
    return false;
}

function checkdup($con,$cid)
{
    $q1 = "SELECT card_id FROM album WHERE card.id='$cid'";
    if(mysqli_query($con,$q1))
        return true;
    else
        return false;
}