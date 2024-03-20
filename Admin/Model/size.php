<?php
    class size{
        function getSize() {
            $db = new connect();
            $select = "select * from size where trangthai=0";
            $result = $db->getList($select);
            return $result;
        }
        function insertSize($tensize) {
            $db = new connect();
            $query = "insert into size(idsize, tensize) values (NULL, '$tensize')";
            $result = $db->exec($query);
            return $result;
        }
        function delSize($id) {
            $db = new connect();
            $query = "update size set trangthai = 1 where idsize=$id";
            $result = $db->exec($query);
            return $result;
        }
    }

?>