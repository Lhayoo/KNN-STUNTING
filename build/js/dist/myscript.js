// Pesan Data Profile
const flash = $('.flash-data').data('flashdata');

if (flash) {
    Swal.fire(
        'Profile',
        flash,
        'success'
    );
}

// Pesan Data Menu
const flashq = $('.flash-dataq').data('flashdata');

if (flashq) {
    Swal.fire(
        'Data Ibu',
        flashq,
        'success'
    );
}

// Pesan Data Sub Menu
const flashw = $('.flash-dataw').data('flashdata');

if (flashw) {
    Swal.fire(
        'Data Anak',
        flashw,
        'success'
    );
}

// Pesan Data Level
const flashe = $('.flash-datae').data('flashdata');

if (flashe) {
    Swal.fire(
        'Data Kader',
        flashe,
        'success'
    );
}

// Pesan Data Level Access
const flashp = $('.flash-datap').data('flashdata');

if (flashp) {
    Swal.fire(
        'Data Level Access',
        flashp,
        'success'
    );
}

// Pesan Data User
const flashr = $('.flash-datar').data('flashdata');

if (flashr) {
    Swal.fire(
        'Data User',
        flashr,
        'success'
    );
}

const flashn = $('.flash-datan').data('flashdata');

if (flashn) {
    Swal.fire(
        'Data User',
        flashn,
        'success'
    );
}

// Pesan Data Mapel
const flashmas = $('.flash-datamas').data('flashdata');

if (flashmas) {
    Swal.fire(
        'Data Mata Pelajaran',
        flashmas,
        'success'
    );
}

//Pesan Data Kelas
const flashkel = $('.flash-datakel').data('flashdata');

if (flashkel) {
    Swal.fire(
        'Data Kelas',
        flashkel,
        'success'
    );
}

// Pesan Data Takad
const flashtak = $('.flash-datatak').data('flashdata');

if (flashtak) {
    Swal.fire(
        'Data Tahun Akademik',
        flashtak,
        'success'
    );
}

// Pesan Data PreNil
const flashpre = $('.flash-datapre').data('flashdata');

if (flashpre) {
    Swal.fire(
        'Data Predikat Nilai',
        flashpre,
        'success'
    );
}


// Tombol Konfirmasi Hapus Data
$('.tbl-hapus').on('click', function (a) {
    a.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Data ini akan dihapus",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ok!'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })
})

// Tombol Konfirmasi Log Out
$('.tbl-logout').on('click', function (a) {
    a.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Apakah anda yakin ingin keluar?',
        text: "Keluar dari aplikasi posyandu",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Iya'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })
})
