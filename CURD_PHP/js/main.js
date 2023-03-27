
// ========== ADD NEW KH =========================================================================
// xữ lí nhấn vào button thêm khách hàng mới
$(document).on("click", ".btnAddKH", function () {
  // gọi hàm tạo MAKH tự động tăng, để không bị trùng khi thêm mới
  getID('KH');
});

// hàm lấy MAKH và gắn giá trị MAKH mới vào ô input.
function getID(employee) {
  var getID = 'true';
  $.ajax({
    type:"post",
    url: "./api/ID.php",
    data:{
      getID:getID,
      emp:employee
    },
    success:(data, status)=>{
      
      var userId = JSON.parse(data);
      var numberID = parseInt(userId.MAKH.slice(2))+1
      if (employee == 'KH'){
        var newId = 'KH' + numberID.toString();
        $('#add-id').val(newId);
      }else if (employee == 'NV'){
        var newId = 'NV' + numberID.toString();
        $('#NV-id').val(newId);
      }
    },
  })
}
// hàm xử lý add thông tin mới vào database
  function addKH(){
    var newID = $('#add-id').val();
    var newName = $('#add-name').val();
    var newDchi= $('#add-address').val();
    var newSDT = $('#add-phone').val();
    var newNgSinh = $('#add-birth').val();
    var newNgDK = $('#add-DK').val();
    var newDS = $('#add-DS').val();
    var newLoaiKH = $('#add-typeKH').val();

    // console.log(newLoaiKH);
    $.ajax({
      type: "post",
      url: "./api/insert.php",
      data: {
        id:newID,
        name:newName,
        diaChi:newDchi,
        sdt:newSDT,
        ngaySinh:newNgSinh,
        ngayDK:newNgDK,
        doanhSo:newDS,
        typeKH:newLoaiKH,
      },
      success: (data, status) =>{
        if(status=='success'){
          Swal.fire({
                    position:top,
                    icon: 'success',
                    title: "Add successful!",
                    showConfirmButton: false,
                    timer: 1500
                  }).then(()=>{
                    location.reload();
                  })
        }else{
          Swal.fire({
                    position:top,
                    icon: 'error',
                    title: "Add failed!",
                    showConfirmButton: false,
                    timer: 1500
                  })
        }
      }
    })
  }
// ============ EDIT KHACH HANG =================================
// nhấn vào button edit thông tin khách hàng
$(document).on("click", ".btnEdit", function () {
  var myBookId = $(this).data('id');
  $(".modal-body #recipient-id").val( myBookId );
  getDetail(myBookId);
});

// xữ lí update thông tin khach hàng
function updateKH(){
  var idKH = $('#recipient-id').val();
  var newName = $('#input-name').val();
  var newDchi = $('#input-address').val();
  var newSDT = $('#input-phone').val();
  var newNgSinh = $('#input-birth').val();
  var newNgDK =  $('#input-DK').val();
  var newDS =  $('#input-DS').val();
  var newLoaiKH = $('#input-typeKH').val();

  $.ajax({
    type: "post",
    url: "./api/update.php",
    data: {
      id:idKH,
      name:newName,
      diaChi:newDchi,
      sdt:newSDT,
      ngaySinh:newNgSinh,
      ngayDK:newNgDK,
      doanhSo:newDS,
      typeKH:newLoaiKH,
    },
    success: (data) =>{
      var res = JSON.parse(data)
      if(res.status==true){
        Swal.fire({
                  position:top,
                  icon: 'success',
                  title: res.mes,
                  showConfirmButton: false,
                  timer: 1500
                }).then(()=>{
                  location.reload();
                })
      }else{
        Swal.fire({
                  position:top,
                  icon: 'error',
                  title: res.mes,
                  showConfirmButton: false,
                  timer: 1500
                })
      }
    }
  })

}

// hàm lấy thông tin chi tiết của một khách hàng
function getDetail(idKH){
  $.ajax({
    type:"post",
    url: "./api/detail.php",
    data:{
      id:idKH,
    },
    success:(data, status)=>{
      var userId = JSON.parse(data);
      $('#input-name').val(userId.HOTEN);
      $('#input-address').val(userId.DCHI);
      $('#input-phone').val(userId.SODT);
      $('#input-birth').val(userId.NGSINH);
      $('#input-DK').val(userId.NGDK);
      $('#input-DS').val(userId.DOANHSO);
      $('#input-typeKH').val(userId.LOAIKH);
    },
    
  })
}
// ============ DELETE KHACH HANG =================================

$(document).on("click", ".btnDelete_KH", function () {
  var maKH = $(this).data('id');
  $("#input_makh").val( maKH );
});
// xử lý removw khách hàng
function deleteKH(){
  var idKH = $("#input_makh").val();
  console.log(idKH);
   $.ajax({
    type:"post",
    url: "./api/delete.php",
    data:{
      id:idKH,
    },
    success:(data)=>{
      var res = JSON.parse(data)
      if(res.status==true){
        Swal.fire({
                  position:top,
                  icon: 'success',
                  title: res.mes,
                  showConfirmButton: false,
                  timer: 1500
                }).then(()=>{
                  location.reload();
                })
      }else{
        Swal.fire({
                  position:top,
                  icon: 'error',
                  title: res.mes,
                  showConfirmButton: false,
                  timer: 1500
                })
      }
    },
  })
}


// ========== ADD NEW NHAN VIEN =========================================================================
// xữ lí nhấn vào button thêm khách hàng mới
$(document).on("click", ".btnAddNV", function () {
  // gọi hàm tạo MAKH tự động tăng, để không bị trùng khi thêm mới
  getID('NV');
});