<?php

namespace App\Exports;

use App\Models\Topic;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class TopicsExport implements FromCollection, WithHeadings, WithColumnFormatting, ShouldAutoSize, WithEvents
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
        return collect(Topic::whereIn('id', $this->selectedRow)->get()->map(function ($topic) {
            return [
                'ID' => $topic->id,
                'Tiêu đề' => $topic->title,
                'Slug' => $topic->slug,
                'Mô tả' => $topic->content,
                'Trạng thái' => $topic->status == 0 ? 'Hoạt động' : 'Ẩn',
                'Ngày tạo' => $topic->created_at->format('d/m/Y'),
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
