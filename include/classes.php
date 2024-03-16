<?php
class Tools {
    static function connect(
        $host='localhost',
        $user="root",
        $pass="",
        $dbname="diplom"
    ) {
        $cs='mysql:host='.$host.';dbname='.$dbname.';charset=utf8;';
        $options=array(
            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
            PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES UTF8'
        );
        try {
            $pdo = new PDO($cs,$user,$pass,$options);
            return $pdo;
        }
        catch(PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

}
class Item {
    public $id, $title, $price, $image, $count, $catid;
    function __construct($title, $price, $image, $count, $catid, $id=0) {
        $this->id=$id;
        $this->title=$title;
        $this->price=$price;
        $this->image=$image;
        $this->count=$count;
        $this->catid=$catid;
    }
    static function GetItems($catid=0)
	{
		$ps=null;
		$items=null;
		try{
			$pdo=Tools::connect();
			if($catid == 0)
			{
				$ps=$pdo->prepare('select * from goods');
				$ps->execute();
			}
			else
			{
				$ps=$pdo->prepare('select * from goods where catid=?');
				$ps->execute(array($catid));
			}
			while ($row=$ps->fetch())
			{
				$item=new Item($row['title'], $row['price'], $row['image'],
					$row['count'], $row['catid'],$row['id']);
				$items[]=$item;
			}
			return $items;
		}
		catch(PDOException $e) 
		{
  			echo $e->getMessage();
  			return false;
		}
	}
    function Draw()
	{
		echo 	"<div class='category-card'>";
		echo 		"<a href='single.php?id=".$this->id."' class='pull-left'>";
		echo 			"<img class='category-card-img' src='./Img/".$this->image."'/>";			
		echo 			"<div class='category-card-title'>";
		echo 				"".$this->title;
		echo 			"</div>";
		echo 			"<div class='category-card-price'>";
		echo 				$this->price."$";
		echo 			"</div>";
		echo 		"</a>";
		echo 	"</div>";
	}
}