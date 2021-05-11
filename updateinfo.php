<?
require_once 'inc/vendor/header.php';
?>
    <div class="card mb-2 shadow" style="border: none">
        <div class="card-header text-white bg-primary">
            <i class="fas fa-info-circle"></i> Cập nhật thông tin
        </div>
        <div class="card-body">
            <div class="alert alert-primary" role="alert">
              Xin chào, bạn cần cập nhật thông tin để có thể tương tác trên hệ thống này!
            </div>
            <form id="update_info">
                <div class="mb-3">
                  <label class="form-label">Bạn đang là ?</label>
                  <?
                  $sql = "SELECT * FROM type_user";
                  $kq = $lvd->query($sql);
                  echo '<select class="form-select" name="type_user" id="type_user" required>
                  <option selected disabled>Chọn một phương án</option>';
                  while($e = mysqli_fetch_assoc($kq)){
                      echo '<option value="'.$e['type'].'">'.$e['name'].'</option>';
                  }
                  echo '</select>';
                  ?>
                </div>
                <div id="ctuer" style="display: none">
                    <div id="k" class="mb-3">
                        <label class="form-label">Bạn là K bao nhiêu nè ?</label>
                        <input type="text" name="k" class="form-control" required id="k" />
                    </div>
                    <div id="khoa" class="mb-3">
                        <label class="form-label">Khoa bạn đang theo học ?</label>
                        <select name="khoa" class="form-select" id="list_khoa">
                        </select>
                    </div>
                    <div class="mb-3" id="nganh">
                    <label class="form-label">Ngành bạn đang theo học ?</label>
                        <select class="form-select" name="nganh" id="chon_nganh" required></select>
                    </div>
                </div>

                <button type="button" class="btn btn-success" id="submit"><i class="fas fa-save"></i> Cập nhật thông tin</button>
            </form>
            <script>
                function buttonchange(num){
                    if(num == 0){
                        $('#submit').html('<i class="fas fa-save"></i> Cập nhật thông tin');
                    }else{
                        $('#submit').html('<i class="fas fa-spinner fa-spin"></i> Đang truy vấn...');
                    }
                }
                $('#type_user').change(function(){
                    var type1 = $(this).val();
                    if(type1 == 1){
                        $('#ctuer').show();
                        $('#list_khoa').load("truyvan.php?action=truyvan&entry=khoa");
                        $('#list_khoa').change(function(){
                            k = $(this).val();
                            $('#chon_nganh').load('truyvan.php?action=truyvan&entry=nganh&khoa=' + k + '&type=option');
                        });
                    }else{
                        $('#ctuer').hide();
                    }
                });
                $('#submit').click(function(){
                    $('#submit').attr("disabled", true);
                    buttonchange(1);
                    $.notify('Đang truy vấn..','success');
                    var data = $('#update_info').serialize();
                    $.ajax({
                        type: 'POST',
                        url: 'truyvan.php?action=update_info',
                        data: data,
                        success: function(res){
                            if(res == 0 || res == 2){
                                $.notify('Vui lòng chọn đầy đủ thông tin!', 'error');
                                $('#update_info').trigger("reset");
                                $('#submit').removeAttr("disabled");
                            }else if(res == 1){
                                $.notify('Bạn chưa đăng nhập hoặc phiên đăng nhập đã hết hạn!', 'error');
                                setTimeout(function(){ window.location = '/'; }, 2000);
                            }
                        }
                    });
                });
            </script>
        </div>
    </div>

<?
require_once 'inc/vendor/footer.php';
?>