<?php
class Data {
    public $nama;
    public $jenis;
    public $waktu;
    public $diskon;
    protected $pajak;
    private $vespa, $vario, $aerox, $caferacer; 
    protected $listmember = ['Haechan', 'Asahi', 'Nadia', 'Bomgyu'];

    public function __construct() {
        $this->pajak = 10000;
    }

    public function setHarga($jenis1, $jenis2, $jenis3, $jenis4) {
        $this->vespa = $jenis1;
        $this->vario = $jenis2;
        $this->aerox = $jenis3;
        $this->caferacer = $jenis4;
    }

    public function getHarga() {
        $data['vespa'] = $this->vespa;
        $data['vario'] = $this->vario;
        $data['aerox'] = $this->aerox;
        $data['caferacer'] = $this->caferacer;
        return $data;
    }
}

class Rental extends Data {
    public function setMember() {
        $member = in_array($this->nama, $this->listmember) ? "Member" : "Non Member";
        return $member;
    }

    public function getDiskon() {
        $diskon = ($this->setMember() == "Member") ? "5" : "0";
        return $diskon;
    }

    public function hargaRental() {
        $dataHarga = $this->getHarga();
        $waktu = floatval($this->waktu);
        $hargaMotor = floatval($dataHarga[$this->jenis]);
        $hargaBayar = $waktu * $hargaMotor;
        $hargaPajak = floatval($this->pajak);
        $hargaSewa = $hargaBayar + $hargaPajak;
        $diskonMember = $hargaSewa * 0.05;
        if($this->setMember() == "Member") {
            $totalBayar = $hargaSewa - $diskonMember;
        } else {
            $totalBayar = $hargaSewa;
        }
        return $totalBayar;
    }

    public function cetakPembelian(){
        echo "<center>";
        echo $this->nama . " anda berstatus sebagai " . $this->setMember() . " mendapatkan diskon sebesar " . $this->getDiskon() . "%" . "<br>";
        echo "Jenis motor yang dirental adalah " . $this->jenis . " selama " . $this->waktu . " hari" . "<br>";
        echo "Harga rental perharinya: Rp. " . number_format($this->getHarga()[$this->jenis], 0, '', '.') . "<br>";
        echo "Besar yang harus dibayar adalah Rp" . number_format($this->hargaRental(), 0, '', '.');
        echo "</center>";
}
}





?>