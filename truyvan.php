<?
require 'inc/vendor/autoload.php';
require $path_be['function'];
if(isset($_GET['action'])){
    define('ACTION', $_GET['action']);
}else{
    echo 0; die();
}
?>
<? if(ACTION == 'truyvan') : ?>

<?
    if(isset($_GET['entry'])){
        $entry = $_GET['entry'];
        if($entry == 'khoa'){
            $sql = "SELECT * FROM khoa";
            $kq = $lvd->query($sql);
            if($kq->num_rows > 0){
                echo '<option value="0" selected disabled>Chọn một mục</option>';
                while($e = mysqli_fetch_assoc($kq)){
                    echo '<option value="'.$e['ID'].'">'.$e['name'].'</option>';
                }
            }else{
                echo 'No data'; exit();
            }
        }elseif($entry == 'nganh'){
            if(isset($_GET['khoa'])){
                $khoa = $_GET['khoa'];
                $sql = "SELECT * FROM khoa WHERE ID = '$khoa'";
                if($lvd->query($sql)->num_rows > 0){
                    $sql = "SELECT * FROM nganh WHERE khoa = '$khoa'";
                    $kq = $lvd->query($sql);
                    if($kq->num_rows > 0){
                        if(!isset($_GET['type']) || (isset($_GET['type']) && $_GET['type'] == 'option')){
                            echo '<option value="0" selected disabled>Chọn một mục</option>';
                            while($e = mysqli_fetch_assoc($kq)){
                                echo '<option value="'.$e['id'].'">'.$e['name'].'</option>';
                            }
                        }elseif(isset($_GET['type']) && $_GET['type'] == 'table'){
                                echo '<div class="table-responsive"><table class="table table-bordered border-primary text-center mb-3" style="background-color: #fff; border: 1px solid #000">
                                <thead style="background-color: #000; color: #fff">
                                  <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                  </tr>
                                </thead>
                                <tbody>';
                                while($e = mysqli_fetch_assoc($kq)){
                                    echo '<tr>
                                        <td>'.$e['id'].'</td>
                                        <td>'.$e['name'].'</td>
                                    </tr>';
                                }
                                echo '</tbody></table></div>';
                        }else{
                            echo 'WRONG DATA'; exit();
                        }
                    }else{
                        echo 'NO DATA'; exit();
                    }
                }else{
                    echo 'WRONG DATA'; exit();
                }
            }else{
                echo 'MISSING DATA'; exit();
            }
        }else{
            echo 'WRONG DATA'; exit();
        }
    }else{
        echo 'WRONG DATA'; exit();
    }

?>
<? else : ?>

<? endif ?><?
require 'inc/vendor/autoload.php';
require $path_be['function'];
if(isset($_GET['action'])){
    define('ACTION', $_GET['action']);
}else{
    echo 0; die();
}
?>
<? if(ACTION == 'truyvan') : ?>

<?
    if(isset($_GET['entry'])){
        $entry = $_GET['entry'];
        if($entry == 'khoa'){
            $sql = "SELECT * FROM khoa";
            $kq = $lvd->query($sql);
            if($kq->num_rows > 0){
                echo '<option value="0" selected disabled>Chọn một mục</option>';
                while($e = mysqli_fetch_assoc($kq)){
                    echo '<option value="'.$e['ID'].'">'.$e['name'].'</option>';
                }
            }else{
                echo 'No data'; exit();
            }
        }elseif($entry == 'nganh'){
            if(isset($_GET['khoa'])){
                $khoa = $_GET['khoa'];
                $sql = "SELECT * FROM khoa WHERE ID = '$khoa'";
                if($lvd->query($sql)->num_rows > 0){
                    $sql = "SELECT * FROM nganh WHERE khoa = '$khoa'";
                    $kq = $lvd->query($sql);
                    if($kq->num_rows > 0){
                        if(!isset($_GET['type']) || (isset($_GET['type']) && $_GET['type'] == 'option')){
                            echo '<option value="0" selected disabled>Chọn một mục</option>';
                            while($e = mysqli_fetch_assoc($kq)){
                                echo '<option value="'.$e['id'].'">'.$e['name'].'</option>';
                            }
                        }elseif(isset($_GET['type']) && $_GET['type'] == 'table'){
                                echo '<div class="table-responsive"><table class="table table-bordered border-primary text-center mb-3" style="background-color: #fff; border: 1px solid #000">
                                <thead style="background-color: #000; color: #fff">
                                  <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                  </tr>
                                </thead>
                                <tbody>';
                                while($e = mysqli_fetch_assoc($kq)){
                                    echo '<tr>
                                        <td>'.$e['id'].'</td>
                                        <td>'.$e['name'].'</td>
                                    </tr>';
                                }
                                echo '</tbody></table></div>';
                        }else{
                            echo 'WRONG DATA'; exit();
                        }
                    }else{
                        echo 'NO DATA'; exit();
                    }
                }else{
                    echo 'WRONG DATA'; exit();
                }
            }else{
                echo 'MISSING DATA'; exit();
            }
        }else{
            echo 'WRONG DATA'; exit();
        }
    }else{
        echo 'WRONG DATA'; exit();
    }

?>
<? elseif(ACTION == 'update_info') : ?>
<?
    if(isset($_POST['type_user'])){
        if(login()){
            $fb_id = $_SESSION['fb_id'];
            $type = $_POST['type_user'];
            if($type == 1){
                if(isset($_POST['k']) && isset($_POST['khoa']) && isset($_POST['nganh'])){
                    $k = $_POST['k'];
                    $khoa = $_POST['khoa'];
                    $nganh = $_POST['nganh'];
                    $sql = "UPDATE users SET type = 1, nganh = '$nganh', khoa = '$k' WHERE fb_id = '$fb_id'";
                }else{
                    echo 2; exit(); // Missing additional infomation
                }
            }else{
                $sql = "UPDATE users SET type = '$type' WHERE fb_id = '$fb_id'";
            }
            echo ($lvd->query($sql)) ? 3 : 4; exit();//3 is success, 4 is error
        }else{
            echo 1; exit(); //Not login
        }
    }else{
        echo 0; exit(); // missing require state
    }


?>




<? else : ?>

<? endif ?>