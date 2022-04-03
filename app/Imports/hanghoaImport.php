<?php

namespace App\Imports;

use App\Models\hanghoa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithProgressBar;


class hanghoaImport implements ToModel, WithHeadingRow, WithProgressBar
{
    use Importable;

    public function model(array $row)
    {
        
        return new hanghoa([
            'loaisp_id' => $row['ma_loai'],
            'nguoncungcap_id' => $row['nguon_cung_cap'],
            'tenhh' => $row['ten_hang_hoa'],
            'gianhap' => $row['gia_nhap'],
            'giaban' => $row['gia_ban'],
            'soluong' => $row['so_luong'],
            'khoiluong' => $row['khoi_luong'],
            'ngaynhap' => $row['ngay_nhap'],
            'chitiet' => $row['chi_tiet'],
            'hinhanh' => $row['hinh_anh'],
        ]);
    }

    
}

