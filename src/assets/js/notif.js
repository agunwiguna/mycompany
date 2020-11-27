const flashData = $(".flash-data").data("flashdata");
const flashDataGagal = $(".flash-data-gagal").data("flashdatagagal");

//notif sukses
if (flashData) {
  swal("Sukses", "Data Berhasil " + flashData, "success");
}

//notif gagal
if (flashDataGagal) {
  swal("Gagal", "Data Gagal " + flashData, "error");
}

//tombol hapus
$(".tombol-hapus").on("click", function (e) {
  e.preventDefault();
  const href = $(this).attr("href");

  swal({
    title: "Apakah anda yakin??",
    text: "Ketika dihapus, data akan dihapus secara permanen!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  }).then((willDelete) => {
    if (willDelete) {
      document.location.href = href;
    } else {
      swal("Data Batal dihapus!");
    }
  });
});
