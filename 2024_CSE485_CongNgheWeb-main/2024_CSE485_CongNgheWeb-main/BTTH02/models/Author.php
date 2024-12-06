<?php
class Author{
    private $ma_tgia;
    private $ten_tgia;
    private $hinh_tgia;

    public function __construct($ma_tgia, $ten_tgia, $hinh_tgia = null)
    {
        $this->ma_tgia = $ma_tgia;
        $this->ten_tgia = $ten_tgia;
        $this->hinh_tgia = $hinh_tgia;
    }

    public function getId() {
        return $this->ma_tgia;
    }

    public function getName() {
        return $this->ten_tgia;
    }

    public function getImage() {
        return $this->hinh_tgia;
    }
}
?>