<?php
    class page{
        // phương thức tính ra số trang
        function findPage($count,$limit) {
            $page = (($count%$limit)==0?$count/$limit:ceil($count/$limit));
            return $page;
        }
        // phương thức tính start dựa vào url
        // tạo ra biến trang hiện tại 
        function findStart($limit) {
            if (!isset($_GET['page'])||$_GET['page']==1) {
                # code...
                $start =0;
            }
            else {
                $start = ($_GET['page']-1)*$limit;
            }
            return $start;
        }
    }
?>