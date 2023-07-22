<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\CurrencyFormat;

class ProductExport implements FromCollection, WithHeadings, WithColumnFormatting, ShouldAutoSize, WithEvents
{
    use Exportable;
    protected $selectedRow;

    public function __construct($selectedRow)
    {
        $this->selectedRow = $selectedRow;
    }

    public function headings(): array
    {
        return [
            'ID',
            'Tên sản phẩm',
            'Slug',
            'Đường dẫn ảnh',
            'Giá',
            'Giá khuyến mãi',
            'Mô tả',
            'Ngày thêm',
        ];
    }
    public function columnFormats(): array
    {
        return [
            'E' => '_(* #,##0_);_(* (#,##0);_(* "-"??_);_(@_)', // Định dạng cột giá
            'F' => '_(* #,##0_);_(* (#,##0);_(* "-"??_);_(@_)', // Định dạng cột giá khuyến mãi
            'H' => NumberFormat::FORMAT_DATE_DDMMYYYY, // Định dạng cột ngày thêm
        ];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return collect(Product::whereIn('id', $this->selectedRow)->get()->map(function ($product) {
            return [
                'ID' => $product->id,
                'Tên sản phẩm' => $product->name,
                'Slug' => $product->slug,
                'Ảnh' => $product->path_image,
                'Giá' => $product->price,
                'Giá khuyến mãi' => $product->sale_price,
                'Mô tả' => $product->description,
                'Ngày tạo' => $product->created_at->format('d/m/Y'),
            ];
        }));
    }

    /**
     * Styling cell 
     * 
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function (AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
                $style = [
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                        'vertical' => Alignment::VERTICAL_CENTER,
                        'wrapText' => true,
                    ],
                ];
                $event->sheet->getDelegate()->getStyle($cellRange)->applyFromArray($style);
            },
        ];
    }
}
