<?php
    class hoadon {
        function getNam() {
            $db = new connect();
            $select = "SELECT DISTINCT YEAR(ngaydat) AS nam FROM hoadon ORDER BY nam ASC";
            $result = $db->getList($select);
            return $result;
            
        }
    }
?>