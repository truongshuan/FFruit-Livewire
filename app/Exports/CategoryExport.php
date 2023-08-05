<?php

namespace App\Exports;

use App\Models\Category;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class CategoryExport implements FromCollection, WithHeadings, WithColumnFormatting, ShouldAutoSize, WithEvents
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
            'Tiêu đề',
            'Slug',
            'Mô tả',
            'Trạng thái',
            'Ngày tạo',
        ];
    }

    public function columnFormats(): array
    {
        return [
            'F' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }

    /**
     * @return Collection
     */
    public function collection(): Collection
    {
        return collect(Category::whereIn('id', $this->selectedRow)->get()->map(function ($category) {
            return [
                'ID' => $category->id,
                'Tiêu đề' => $category->title,
                'Slug' => $category->slug,
                'Mô tả' => $category->desc,
                'Trạng thái' => $category->status == 0 ? 'Hoạt động' : 'Ẩn',
                'Ngày tạo' => $category->created_at->format('d/m/Y'),
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
