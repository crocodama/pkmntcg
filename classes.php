<?php 
session_start();

	include("connection.php");
	include("functions.php");
    
class obj_card
{
    public $card_id;
    public $image;
    public $price;
    public $pack_id;
    public $rarity;
    public $name;
    public $number;
    function card($cid,$img,$prc,$pid,$rar,$nam,$num)
    {
        $this->card_id = $cid;
        $this->image = $img;
        $this->price = $prc;
        $this->pack_id = $pid;
        $this->rarity= $rar;
        $this->name = $nam;
        $this->number = $num;
    }
    function get_cid()
    {
        return $this->card_id;
    }
    function get_img()
    {
        return $this->image;
    }
    function get_prc()
    {
        return $this->price;
    }
    function get_pid()
    {
        return $this->pack_id;
    }
    function get_rar()
    {
        return $this->rarity;
    }
    function get_nam()
    {
        return $this->name;
    }
    function get_num()
    {
        return $this->number;
    }
    function set_cid($cid)
    {
        $this->card_id = $cid;
    }
    function set_img($img)
    {
        $this->image = $img;
    }
    function set_prc($prc)
    {
        $this->price = $prc;
    }
    function set_pid($pid)
    {
        $this->pack_id = $pid;
    }
    function set_rar($rar)
    {
        $this->rarity = $rar;
    }
    function set_nam($nam)
    {
        $this->name = $nam;
    }
    function set_num($num)
    {
        $this->number = $num;
    }
}