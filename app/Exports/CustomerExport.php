<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class CustomerExport implements FromCollection, WithHeadings, WithColumnFormatting, ShouldAutoSize, WithEvents
{
    use Exportable;
    protected $selectedRow;


    /**
     * Summary of __construct
     * @param mixed $selectedRow
     */
    public function __construct($selectedRow)
    {
        $this->selectedRow = $selectedRow;
    }

    public function headings(): array
    {
        return [
            'ID',
            'Họ và tên',
            'Email',
            // 'Vai trò',
            'Ngày tham gia',
        ];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return collect(User::whereIn('id', $this->selectedRow)->get()->map(function ($customer) {
            return [
                'ID' => $customer->id,
                'Họ và tên' => $customer->name,
                'Email' => $customer->email,
                'Ngày tạo' => $customer->created_at->format('d/m/Y'),
            ];
        }));
    }

    /**
     * Format columns excel
     * @return array
     */
    public function columnFormats(): array
    {
        return [
            'F' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
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