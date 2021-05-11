<?
require_once 'inc/vendor/function.php';
if(isset($_POST['gui'])){
    $khoa = $_POST['khoa'];
    $nganh = $_POST['nganh'];
    $tinchi = $_POST['tinchi'];
    $sql = "INSERT INTO nganh (name, tinchi, khoa) VALUES ('$nganh', '$tinchi', '$khoa'";
    $lvd->query($sql);
}
?>

<!-- them nganh -->

<form action="" method="POST">
    <select name="khoa" id="khoa">  
    </select>
    <label>Tên ngành:</label>
    <input type="text" name="nganh" id="nganh" required />
    <label> Số tín chỉ tốt nghiệp:</label>
    <input type="number" name="tinchi" id="tinchi"/>
    <button type="submit" name="gui">Gửi dữ liệu</button>
</form>
<script>
    $(document).ready(function(){
        $('#nganh').load("truyvan.php?action=truyvan&entry=khoa");
    });
</script>