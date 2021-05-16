<?php
//koneksi ke database
$conn = mysqli_connect("localhost","root","", "jhonidesign");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows =[];
    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}


function tambah($data){
    global $conn;
    //ambil data dari tiap elemen dalam form
    $nama_project = htmlspecialchars($data["nama_project"]);
    $keterangan = htmlspecialchars($data["keterangan"]);
    
    //Upload Gambar
    $gambar = upload();
    if( !$gambar ) {
        return false;
    }

    $query = "INSERT INTO project VALUES ('','$nama_project','$gambar','$keterangan')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

function upload() {
    
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];


    //cek apakah tidak ada gambar yang diupload
    if( $error === 4) {
        echo "<script>
                alert('pilih gambar dulu dongg');
                </script>";
        return false;
    }

    //cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg','jpeg','png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if( !in_array($ekstensiGambar, $ekstensiGambarValid) ){
        echo "<script>
                alert('yang anda upload bukan gambar');
                </script>";
        return false;
    }
    
    //cek jika ukuran tidak sesuai
    if ( $ukuranFile > 1000000 ) {
        echo "<script>
                alert('Ukuran Gambar Terlalu Besar');
                </script>";
    }

    //lolos pengecekan, gambar siap diupload
    //generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'img/'. $namaFileBaru);
    return $namaFileBaru;


}



function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM project WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function ubah($data){
    global $conn;

    //ambil data dari tiap elemen dalam form
    $id = $data["id"];
    $nama_project = htmlspecialchars($data["nama_project"]);
    $keterangan = htmlspecialchars($data["keterangan"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);
    
    // cek apakah user pilih gambar baru atau tidak
    if ( $_FILES ['gambar']['error'] === 4 ){
        $gambar = $gambarLama;

    } else {
        $gambar = upload();
    }
    
    $query = "UPDATE project SET 
                nama_project = '$nama_project', 
                gambar = '$gambar',
                keterangan = '$keterangan'
                WHERE id = $id
                ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
  
}

function cari($keyword){
    $query = "SELECT *FROM project WHERE nama_project LIKE '%$keyword%'
                OR keterangan LIKE '%$keyword%' ";

    return query($query);
}

function registrasi($data) {
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    //cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM login WHERE username ='$username'");

    if ( mysqli_fetch_assoc($result) ) {
        echo "<script>
                alert('username sudah terdaftar!');
                </script>";
        return false;
    } 

    //cek konfirmasi password
    if ( $password !== $password2 ) {
        echo "<script>
                alert('Konfirmasi password tidak sesuai');
                </script>";
        return false;
    }

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);
    
    //tambahkan userbaru kedatabase
    mysqli_query($conn, "INSERT INTO login VALUES ('','$username','$password')");
   
    return mysqli_affected_rows($conn);

}

?>