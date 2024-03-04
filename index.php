<?php
$mysqli = new mysqli("localhost","root","","belajar_php_database");
if($mysqli->connect_errno){
    echo "Failed to connect to MySQL ". $mysqli->connect_errno;
    exit();
}

class Mahasiswa{
    public function __construct($db)
    {
        $this->db = $db;
    }

    function save_data($input){
        return $this->db->query("INSERT INTO mahasiswa (nama,nim,prodi,thn_angkatan) VALUES('".$input["nama"]."','".$input["nim"]."','".$input["prodi"]."','".$input["thn_angkatan"]."')");
    }

}

$data = new Mahasiswa($mysqli);
if(count($_POST)>0){
    $input = $_POST;
    $data->save_data($input);
    if($data->save_data($input)){
        echo '<script>alert("Sukses Menambahkan Data");</script>';
    }else
    echo '<script>alert("Gagal Menambahkan Data");</script>';
    

}

?>

<form action="" method="POST">
<table>
    <tr>
        <th>Nama</th>
        <td><input type="text" name="nama"></td>
        <th>NIM</th>
        <td><input type="text" name="nim"></td>
        <th>Prodi</th>
        <td><input type="text" name="prodi"></td>
        <th>Tahun Angkatan</th>
        <td><input type="number" name="thn_angkatan"></td>
    </tr>
    <tr>
        <td colspan="2"><button type="submit">Simpan</button></td>
    </tr>

</table>
</form>