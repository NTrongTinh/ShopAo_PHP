<?php
    class cthanghoa{
        function insertCTHangHoa($mamh,$idsize,$soluongton)
        {
            $db=new connect();
            $query="insert into cthanghoa(mamh, idsize, soluongton) values ($mamh,$idsize,$soluongton)";
            $result=$db->exec($query);
            return $result;
        }
    }
?>