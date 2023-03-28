
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
      if (employee == 'KH'){
        console.log(data)
        var userId = JSON.parse(data);
        var numberID = parseInt(userId.MAKH.slice(2))+1
        var newId = 'KH' + numberID.toString();
        $('#add-id').val(newId);
      }else if (employee == 'NV'){
        console.log(data)
        var userId = JSON.parse(data);
        var numberID = parseInt(userId.MANV.slice(2))+1
        var newId = 'NV' + numberID.toString();
        $('#NV-id').val(newId);
      }else if (employee == 'SP'){
        var userId = JSON.parse(data);
        var newId = '';
        var numberID = parseInt(userId.MASP.slice(2))+1
        if (numberID < 9){
          newId = 'SP0' + numberID.toString();
        }else{
          newId = 'SP' + numberID.toString();
        }
        $('#SP-ID').val(newId);
      }else if (employee == 'HD'){
        console.log(data)
        var userId = JSON.parse(data);
        var numberID = parseInt(userId.SOHD) + 1;
        console.log(numberID)
        $('#HD-ID').val(numberID);
      }
    }
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
    var dispatch = 'KH';
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
        dispatch:dispatch
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
  getDetail(myBookId, 'KH');
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

  var dispatch = 'KH'

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
      dispatch: dispatch
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
function getDetail(id, loai){
  $.ajax({
    type:"post",
    url: "./api/detail.php",
    data:{
      id:id,
      loai:loai
    },
    success:(data)=>{
      console.log(data)
      var userId = JSON.parse(data);
      if (loai == 'KH'){
        $('#input-name').val(userId.HOTEN);
        $('#input-address').val(userId.DCHI);
        $('#input-phone').val(userId.SODT);
        $('#input-birth').val(userId.NGSINH);
        $('#input-DK').val(userId.NGDK);
        $('#input-DS').val(userId.DOANHSO);
        $('#input-typeKH').val(userId.LOAIKH);
      }else if (loai == 'NV'){
        $('#editNV-id').val(userId.MANV);
        $('#editNV-name').val(userId.HOTEN);
        $('#editNV-phone').val(userId.SODT);
        $('#editNV-ngvl').val(userId.NGVL);
      }else if (loai == 'SP'){
        $('#editSP-ID').val(userId.MASP);
        $('#editSP-name').val(userId.TENSP);
        $('#editSP-DVT').val(userId.DVT);
        $('#editSP-nuocSX').val(userId.NUOCSX);
        $('#editSP-gia').val(userId.GIA);
      }else if (loai == 'HD'){
        $('#editHD-ID').val(userId.SOHD);
        $('#editHD-ngHD').val(userId.NGHD);
        $('#editHD-KH').val(userId.MAKH);
        $('#editHD-NV').val(userId.MANV);
        $('#editHD-gia').val(userId.TRIGIA);
      }
    },
    
  })
}
// ============ DELETE KHACH HANG =================================

$(document).on("click", ".btnDelete_KH", function () {
  var maKH = $(this).data('id');
  $("#input_makh").val( maKH );
});
// xử lý removw khách hàng
function deleteID(type){
  var id = $(this).data('id');
  if (type == 'KH'){
    id = $("#input_makh").val();
  }else if (type == 'NV'){
    id = $("#input_manv").val();
  }else if (type == 'SP'){
    id = $("#input_masp").val();
  }else if (type == 'HD'){
    id = $("#input_mahd").val();
  }
  console.log(id);
   $.ajax({
    type:"post",
    url: "./api/delete.php",
    data:{
      id:id,
      type: type
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

function addNV(){
  var newID = $('#NV-id').val();
  var newName = $('#NV-name').val();
  var newSDT = $('#NV-phone').val();
  var newNgVL = $('#NV-ngvl').val();

  var dispatch = 'NV';

  // console.log(newLoaiKH);
  $.ajax({
    type: "post",
    url: "./api/insert.php",
    data: {
      id:newID,
      name:newName,
      sdt:newSDT,
      ngayVL:newNgVL,
      dispatch: dispatch
     
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

// ============= EDIT NHÂN VIÊN =============================
$(document).on("click", ".btnEditNV", function () {
  var idNV = $(this).data('id');
  $(".modal-body #recipient-id").val( idNV );
  getDetail(idNV, 'NV');
});

// xữ lí update thông tin nhaan vien
function updateNV(){
  var idNV = $('#editNV-id').val();
  var newName = $('#editNV-name').val();
  var newSDT = $('#editNV-phone').val();
  var newNgVL = $('#editNV-ngvl').val();


  var dispatch = 'NV';
  
  $.ajax({
    type: "post",
    url: "./api/update.php",
    data: {
      id:idNV,
      name:newName,
      sdt:newSDT,
      ngayVL:newNgVL,
      dispatch: dispatch
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
// ======== DELETE NHÂN VIÊN =================================
$(document).on("click", ".btnDeleteNV", function () {
  var maNV = $(this).data('id');
  $("#input_manv").val( maNV );
});


// // ======= ADD NEW SẢN PHẨM =================================
$(document).on("click", ".btnAddSP", function () {
  // gọi hàm tạo MAKH tự động tăng, để không bị trùng khi thêm mới
  getID('SP')
});

function addSP(){

  var newID =  $('#SP-ID').val();
  var newName = $('#SP-name').val();
  var newDVT = $('#SP-DVT').val();
  var newNuocSX = $('#SP-nuocSX').val();
  var newGia= $('#SP-gia').val();

  var dispatch = 'SP';


  console.log(newID);

  // // console.log(newLoaiKH);
  $.ajax({
    type: "post",
    url: "./api/insert.php",
    data: {
      id:newID,
      name:newName,
      dvt:newDVT,
      nuocSX: newNuocSX,
      gia:newGia,
      dispatch: dispatch
     
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

$(document).on("click", ".btnEditSP", function () {
  var idSP = $(this).data('id');
  $(".modal-body #editSP-ID").val( idSP );
  getDetail(idSP, 'SP');
});

function updateSP(){
  var newID =  $('#editSP-ID').val();
  var newName = $('#editSP-name').val();
  var newDVT = $('#editSP-DVT').val();
  var newNuocSX = $('#editSP-nuocSX').val();
  var newGia= $('#editSP-gia').val();


  var dispatch = 'SP';
  
  $.ajax({
    type: "post",
    url: "./api/update.php",
    data: {
      id:newID,
      name:newName,
      dvt:newDVT,
      nuocSX: newNuocSX,
      gia:newGia,
      dispatch: dispatch
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

$(document).on("click", ".btnDeleteSP", function () {
  var maSP = $(this).data('id');
  $("#input_masp").val( maSP );
});

// =============== ADD HOA DON =============================
$(document).on("click", ".btnAddHD", function () {
  // gọi hàm tạo MAKH tự động tăng, để không bị trùng khi thêm mới
  getID('HD');
  getListName('NAME_KH');
  getListName('NAME_NV');
});

function getListName(employee) {
  var getID = 'true';
  $.ajax({
    type:"post",
    url: "./api/ID.php",
    data:{
      getID:getID,
      emp:employee
    },
    success:(data, status)=>{
      if (employee == 'NAME_KH'){
        var userId = JSON.parse(data);
        let htmlOptions = '';
        userId.forEach((item)=>{
          htmlOptions = htmlOptions+`<option value=${item.MAKH}>${item.HOTEN}</option>`;
        })
        $('#HD-KH').html(htmlOptions);
        $('#editHD-KH').html(htmlOptions);
      }else if (employee == 'NAME_NV'){
        var userId = JSON.parse(data);
        let htmlOptions = '';
        userId.forEach((item)=>{
          htmlOptions = htmlOptions+`<option value=${item.MANV}>${item.HOTEN}</option>`;
        })
        $('#HD-NV').html(htmlOptions);
        $('#editHD-NV').html(htmlOptions);

      }
    }
  })
}


function addHD(){

  var newSOHD =  $('#HD-ID').val();
  var newNGHD = $('#HD-ngHD').val();
  var newMAKH = $('#HD-KH').val();
  var newMANV = $('#HD-NV').val();
  var newGia= $('#HD-gia').val();

  var dispatch = 'HD';


  // // console.log(newLoaiKH);
  $.ajax({
    type: "post",
    url: "./api/insert.php",
    data: {
      SOHD:newSOHD,
      NGHD:newNGHD,
      MAKH:newMAKH,
      MANV: newMANV,
      gia:newGia,
      dispatch: dispatch
     
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

$(document).on("click", ".btnEditHD", function () {
  var idSP = $(this).data('id');
  $("#editHD-ID").val( idSP );
  getDetail(idSP, 'HD');
  getListName('NAME_KH');
  getListName('NAME_NV');
});

function updateHD(){
  var newSOHD =  $('#editHD-ID').val();
  var newNGHD = $('#editHD-ngHD').val();
  var newMAKH = $('#editHD-KH').val();
  var newMANV = $('#editHD-NV').val();
  var newGia= $('#editHD-gia').val();


  var dispatch = 'HD';
  
  $.ajax({
    type: "post",
    url: "./api/update.php",
    data: {
      SOHD:newSOHD,
      NGHD:newNGHD,
      MAKH:newMAKH,
      MANV: newMANV,
      gia:newGia,
      dispatch: dispatch
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

$(document).on("click", ".btnDeleteHD", function () {
  var maHD = $(this).data('id');
  $("#input_mahd").val( maHD );
});
