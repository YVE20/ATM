<?php

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class OperationalReportSpreadsheet
{
    private $spreadsheet;
    private $project;
    private $last_balance;
    private $operational_budget;
    private $budget_code_summary;

    private $start_date;
    private $end_date;
    private $week_period;

    private $row = 1;

    function __construct(
        $project,
        $operational_budget,
        $budget_code_summary,

        $start_date,
        $end_date,
        $week_period
    ) {
        $this->project = $project;
        $this->operational_budget = $operational_budget['transactions_per_date'];
        $this->last_balance = $operational_budget['last_balance'];
        $this->budget_code_summary = $budget_code_summary;

        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->week_period = $week_period;

        $this->spreadsheet = new Spreadsheet();
        $this->build();
    }

    private function build()
    {
        $this->write_header();
        $this->write_detail();
        $this->write_summary();
    }

    private function write_header()
    {
        $this->spreadsheet->getActiveSheet()
            ->setCellValue('A5', 'NAMA PROYEK')
            ->setCellValue('D5', ": {$this->project['name']}")

            ->setCellValue('A6', 'NO DAN TANGGAL KONTRAK')
            ->setCellValue('D6', ": {$this->project['tgl_kontrak']}")

            ->setCellValue('A7', 'PEMBERI KERJA')
            ->setCellValue('D7', ": {$this->project['pemberi_kerja']}")

            ->setCellValue('A8', 'PELAKSANAAN')
            ->setCellValue('D8', ": {$this->project['waktu_pelaksanaan']}")

            ->setCellValue('A9', 'LOKASI')
            ->setCellValue('D9', ": {$this->project['lokasi_proyek']}");

        $this->spreadsheet->getActiveSheet()
            ->setCellValue('M5', "BULAN: " . formatDateIntervalMonth($this->start_date, $this->end_date))
            ->setCellValue('M6', "PERIODE MINGGU: {$this->week_period}")
            ->setCellValue('M7', "TGL: " . formatDateInterval($this->start_date, $this->end_date));
        
        $this->row = 10;
    }

    private function write_detail()
    {
        $this->write_detail_header();

        for ($date = clone $this->start_date; $date <= $this->end_date; $date->modify('+1 day'))
        {
            $this->write_day_detail($date);
        }

        $this->write_detail_total();
    }

    private function write_detail_header()
    {
        $titles = [
            1 => 'TANGGAL',
            2 => 'NO',
            3 => 'JENIS BIAYA',
            7 => 'KMA',
            8 => 'Qty',
            9 => 'Satuan',
            10 => 'Harga Satuan',
            11 => 'KAS KECIL',
            12 => 'KREDIT',
            13 => 'SALDO',
        ];

        foreach ($titles as $column => $title)
        {
            $this->spreadsheet->getActiveSheet()
                ->setCellValueByColumnAndRow($column, $this->row, $title);
        }

        $this->spreadsheet->getActiveSheet()
            ->mergeCells("C{$this->row}:F{$this->row}");
        
        $this->row++;

        $this->spreadsheet->getActiveSheet()
            ->setCellValueByColumnAndRow(3, $this->row, "SALDO TANGGAL " . tgl_indo($this->start_date->format('Y-m-d')))
            ->mergeCells("C{$this->row}:F{$this->row}")
            ->setCellValue("M{$this->row}", $this->last_balance);
        
        $this->row++;
    }

    private function write_day_detail(DateTime $date)
    {
        $this->spreadsheet->getActiveSheet()
            ->setCellValue("A{$this->row}", $date->format('d/m/Y'))
            ->setCellValue("M{$this->row}", $this->last_balance);
        $this->row++;

        $date_str = $date->format('Y-m-d');
        if (array_key_exists($date_str, $this->operational_budget))
        {
            $day_transaction = $this->operational_budget[$date_str];

            if ($day_transaction['debit'] > 0)
            {
                $this->spreadsheet->getActiveSheet()
                    ->setCellValue("C{$this->row}", "TARIK TUNAI")
                    ->mergeCells("C{$this->row}:F{$this->row}")
                    ->setCellValue("K{$this->row}", $day_transaction['debit'])
                    ->setCellValue("M{$this->row}", $this->last_balance + $day_transaction['debit']);
                $this->row++;
            }

            $this->write_day_payment($date_str, $day_transaction['credits']);

            $debit = $day_transaction['debit'];
            $credit = $day_transaction['total_credit'];
            $this->last_balance = $day_transaction['final_balance'];
        }
        else
        {
            $debit = 0;
            $credit = 0;
        }

        $this->spreadsheet->getActiveSheet()
            ->setCellValue("C{$this->row}", 'JUMLAH TOTAL')
            ->mergeCells("C{$this->row}:F{$this->row}")
            ->setCellValue("K{$this->row}", $debit ?: '-')
            ->setCellValue("L{$this->row}", $credit ?: '-')
            ->setCellValue("M{$this->row}", $this->last_balance);

        $this->row++;

        $this->spreadsheet->getActiveSheet()
            ->setCellValue("C{$this->row}", 'SALDO')
            ->mergeCells("C{$this->row}:F{$this->row}")
            ->setCellValue("M{$this->row}", $this->last_balance);

        $this->row++;
    }

    private function write_day_payment(string $current_date, array $day_credits)
    {
        foreach ($day_credits as $d => $credits)
        {
            foreach ($credits as $idx => $credit)
            {
                if ($idx === 0 && $d !== $current_date)
                {
                    $this->spreadsheet->getActiveSheet()
                        ->setCellValue("A{$this->row}", "EXS" . date_create($d)->format('d/m/y'));
                }

                $this->spreadsheet->getActiveSheet()
                    ->setCellValue("B{$this->row}", $idx + 1)
                    ->setCellValue("C{$this->row}", $credit['name'])
                    ->mergeCells("C{$this->row}:F{$this->row}")
                    ->setCellValue("G{$this->row}", $credit['budget_code'])
                    ->setCellValue("H{$this->row}", $credit['qty'])
                    ->setCellValue("I{$this->row}", $credit['unit_name'])
                    ->setCellValue("J{$this->row}", $credit['unit_price'])
                    ->setCellValue("L{$this->row}", $credit['credit'])
                    ->setCellValue("M{$this->row}", $credit['balance']);
                
                $this->row++;
            }
        }
    }

    private function write_detail_total()
    {
        $total_spending = array_sum(array_column($this->budget_code_summary, 'total_price'));
        $total_debit = array_sum(array_column($this->operational_budget, 'debit'));

        $this->spreadsheet->getActiveSheet()
            ->setCellValue("A{$this->row}", "TOTAL PENGELUARAN PER TGL " . formatDateInterval($this->start_date, $this->end_date))
            ->mergeCells("A{$this->row}:J{$this->row}")
            ->setCellValue("K{$this->row}", $total_debit)
            ->setCellValue("L{$this->row}", $total_spending)
            ->setCellValue("M{$this->row}", $this->last_balance);
        $this->row++;

        $this->spreadsheet->getActiveSheet()
            ->setCellValue("A{$this->row}", "GRAND TOTAL")
            ->mergeCells("A{$this->row}:J{$this->row}")
            ->setCellValue("K{$this->row}", $total_debit)
            ->setCellValue("L{$this->row}", $total_spending)
            ->setCellValue("M{$this->row}", $this->last_balance);
        $this->row++;
    }

    private function write_summary()
    {
        $this->row++;

        $this->spreadsheet->getActiveSheet()
            ->setCellValue("A{$this->row}", "KMA")
            ->setCellValue("B{$this->row}", "URAIAN BIAYA")
            ->mergeCells("B{$this->row}:F{$this->row}")
            ->setCellValue("G{$this->row}", "TOTAL");
        
        $this->row++;

        foreach ($this->budget_code_summary as $summary)
        {
            $this->spreadsheet->getActiveSheet()
                ->setCellValue("A{$this->row}", $summary['code'])
                ->setCellValue("B{$this->row}", $summary['name'])
                ->mergeCells("B{$this->row}:F{$this->row}")
                ->setCellValue("G{$this->row}", $summary['total_price']);
            $this->row++;
        }

        $total_spending = array_sum(array_column($this->budget_code_summary, 'total_price'));
        $this->spreadsheet->getActiveSheet()
            ->setCellValue("A{$this->row}", "GRAND TOTAL")
            ->setCellValue("G{$this->row}", $total_spending);
    }

    public function download()
    {
        $filename = "Operasional-{$this->project['code']}-" . formatDateInterval($this->start_date, $this->end_date) . ".xlsx";

        // Redirect output to a client’s web browser (Xlsx)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment;filename=\"{$filename}\"");
        header('Cache-Control: max-age=0');

        $writer = IOFactory::createWriter($this->spreadsheet, 'Xlsx');
        $writer->save('php://output');
    }
}