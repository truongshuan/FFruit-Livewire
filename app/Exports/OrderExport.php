<?php

namespace App\Exports;

use App\Models\Order;
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

class OrderExport implements FromCollection, WithHeadings, WithColumnFormatting, ShouldAutoSize, WithEvents
{
    use Exportable;
    protected $selectedRow;

    /**
     *
     * @param mixed $selectedRow
     */
    public function __construct($selectedRow)
    {
        $this->selectedRow = $selectedRow;
    }

    /**
     * Summary of headings
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',
            'Họ và tên',
            'Email',
            'Số điện thoại',
            'Địa chỉ',
            'Ghi chú',
            'Trạng thái',
            'Người đặt',
            'Ngày đặt',
        ];
    }

    /**
     * @return Collection
     */
    public function collection(): Collection
    {
        return collect(Order::whereIn('id', $this->selectedRow)->get()->map(function ($order) {
            $statuses = [
                '0' => 'Đang chờ',
                '1' => 'Đã thanh toán',
                '2' => 'Hoàn thành',
                '3' => 'Đã hủy',
            ];
            return [
                'ID' => $order->id,
                'Họ và tên' => $order->customer_name,
                'Email' => $order->customer_email,
                'Số điện thoại' => $order->customer_phone,
                'Địa chỉ' => $order->shipping_address,
                'Ghi chú' => $order->shipping_address,
                'Trạng thái' => $statuses[array_search($order->status, array_keys($statuses))],
                'Người đặt' => $order->customer->name,
                'Ngày đặt' => $order->created_at->format('d/m/Y'),
            ];
        }));
    }

    /**
     * @return array
     */
    public function columnFormats(): array
    {
        return [
            'I' => NumberFormat::FORMAT_DATE_DDMMYYYY,
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
