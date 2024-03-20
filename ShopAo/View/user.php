<div class="row ml-0 mb-5">
    <div class="col-md-3">
        <?php include_once "listmenuUser.php" ?>
    </div>
    <div class="col-md-9">
        <?php
            if (isset($_GET['act'])) {
                $act = $_GET['act'];
            } else {
                include_once "user.php";
            }
            switch ($act) {
                case 'thongtincanhan':
                    include_once "profile.php";
                    break;
                case "doimatkhau":
                    include_once "changepass.php";
                    break;
                case "lsgd":
                    include_once "lsgd.php";
                    break;
            }
        ?>
    </div>
</div>