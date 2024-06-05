
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body><center>
    <form action="" method="POST">
        <h1>
            Rental Motor
        </h1>
        <table>
            <tr>
                <td>Nama Pelanggan</td>
                <td>:</td>
                <td><input type="text" name="nama" id="nama"></td>
            </tr>
            <tr>
                <td>Lama Waktu Rental (Perhari)</td>
                <td>:</td>
                <td><input type="text" name="waktu" id="waktu"></td>
            </tr>
            <tr>
                <td>Jenis Motor</td>
                <td>:</td>
                <td>
                    <select name="jenis" id="jenis" required>
                        <option value="vespa">Vespa</option>
                        <option value="vario">Vario</option>
                        <option value="aerox">Aerox</option>
                        <option value="caferacer">Caferacer</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><button name="submit" type="submit">Submit</button></td>
            </tr>
        </table>
        <div style="border: 1px solid black; width: 40%; padding: 10px; margin: 10px;">
    </form>
<?php
include("data.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $proses = new Rental();
    $proses->setHarga(70000, 90000, 90000, 100000);

    if (isset($_POST['nama']) && isset($_POST['waktu']) && isset($_POST['jenis'])) {
        $proses->nama = $_POST['nama'];
        $proses->waktu = $_POST['waktu'];
        $proses->jenis = $_POST['jenis'];
        $proses->cetakPembelian();
    } else {
        echo "<center>Silahkan isi form terlebih dahulu</center>";
    }

}
?>
</center></body>
</html>
