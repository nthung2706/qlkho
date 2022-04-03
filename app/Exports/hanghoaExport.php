<?php

namespace App\Exports;

use App\Models\hanghoa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithMapping;


class hanghoaExport implements FromCollection,
                                WithHeadings,
                                WithCustomStartCell,
                                WithMapping
{
    public function headings(): array
    {
        return [
            'Mã loại',
            'Nguồn cung cấp',
            'Tên hàng hóa',
            'Giá nhập',
            'Giá bán',
            'Số lượng',
            'Khối lượng',
            'Ngày nhập',
            'Chi tiết',
            'Hình ảnh',
        ];
    }
    
    public function map($row): array
    {
        return [
            $row->loaisp_id ,
            $row->nguoncungcap_id ,
            $row->tenhh,
            $row->gianhap,
            $row->giaban,
            $row->soluong,
            $row->khoiluong,
            $row->ngaynhap,
            $row->chitiet,
            $row->hinhanh,
        ];
    }
    
    public function startCell(): string
    {
        return 'A1';
    }
    
    public function collection()
    {
        return hanghoa::all();
    }
}
