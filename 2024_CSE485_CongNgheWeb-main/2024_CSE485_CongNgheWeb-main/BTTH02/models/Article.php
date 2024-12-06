<?php
class Article {
    private $id_baiviet;
    private $tieude;
    private $tenbhat;
    private $tomtat;
    private $noidung;
    private $hinhthanh;
    private $ten_tloai;
    private $ten_tgia;
    private $ma_tloai;

    public function __construct($id_baiviet, $tieude, $tenbhat, $tomtat, $noidung, $hinhthanh, $ten_tloai, $ten_tgia,$ma_tloai) {
        $this->id_baiviet = $id_baiviet;
        $this->tieude = $tieude;
        $this->tenbhat = $tenbhat;
        $this->tomtat = $tomtat;
        $this->noidung = $noidung;
        $this->hinhthanh = $hinhthanh;
        $this->ten_tloai = $ten_tloai;
        $this->ten_tgia = $ten_tgia;
        $this->ma_tloai  = $ma_tloai;
    }

    public function getIdBaiviet() {
        return $this->id_baiviet;
    }

    public function setIdBaiviet($id_baiviet) {
        $this->id_baiviet = $id_baiviet;
    }

    public function getTieude() {
        return $this->tieude;
    }

    public function setTieude($tieude) {
        $this->tieude = $tieude;
    }

    public function getTenbhat() {
        return $this->tenbhat;
    }

    public function setTenbhat($tenbhat) {
        $this->tenbhat = $tenbhat;
    }

    public function getTomtat() {
        return $this->tomtat;
    }

    public function setTomtat($tomtat) {
        $this->tomtat = $tomtat;
    }
    public function getNoidung() {
        return $this->noidung;
    }

    public function setNoidung($noidung) {
        $this->noidung = $noidung;
    }

    public function getHinhthanh() {
        return $this->hinhthanh;
    }

    public function setHinhthanh($hinhthanh) {
        $this->hinhthanh = $hinhthanh;
    }

    public function getTenTloai() {
        return $this->ten_tloai;
    }

    public function setTenTloai($ten_tloai) {
        $this->ten_tloai = $ten_tloai;
    }

    
    public function getTenTgia() {
        return $this->ten_tgia;
    }

    public function setTenTgia($ten_tgia) {
        $this->ten_tgia = $ten_tgia;
    }
    public function getMaTloai() {
        return $this->ma_tloai;
    }

    public function setMaTloai($ma_tloai) {
        $this->ma_tloai  = $ma_tloai;
    }
}
?>
