<?php

namespace App\Http\Controllers;

use App\Shop;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\SaleDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReportDetailUserController extends Controller
{
    public function reportView()
    {
        $user = Auth::user();

        return view('reportDetailUser', compact('user'));
    }

    public function downloadPDF(Request $request)
    {
        $shop = Shop::first();

        if (!$shop) {
            $shop = (object)[
                'shop_name' => 'K STORE',
                'address' => 'Jalan Caia Blok K',
                'phone_number' => '0213030',
                'email' => 'kStore@gmail.com',
                'logo' => 'logo-item.png',
            ];
        }

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $detailData = SaleDetail::with(['sale' => function ($query) use ($start_date, $end_date) {
            if ($start_date && $end_date) {
                $query->whereRaw("sale_date BETWEEN ? AND ?", [$start_date, $end_date]);
            }
        }])->get()->unique('saleID');

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);

        $dompdf = new Dompdf($options);

        $dateNow = date('d-m-Y');

        $logoUrl = 'data:image/png;base64,' . base64_encode(file_get_contents(public_path('assets/images/' . $shop->logo)));

        $kopsurat = '
            <div style="text-align: center; margin-bottom: 30px; font-family: Arial, sans-serif;">
                <img src="' . $logoUrl . '" alt="Logo Toko" style="width: 120px; height: auto; margin-bottom: 15px;"/><br>
                <h2 style="font-size: 24px; margin: 0;">' . $shop->shop_name . '</h2>
                <p style="font-size: 14px; margin: 5px 0;">Print Date: ' . $dateNow . '</p>
                <p style="font-size: 14px; margin: 5px 0;">Store Address: ' . $shop->address . '</p>
                <p style="font-size: 14px; margin: 5px 0;">Phone: ' . $shop->phone_number . ' | Email: ' . $shop->email . '</p>
            </div>
        ';

        $html = $kopsurat;

        $html .= '<table border="1" cellspacing="0" cellpadding="5" style="width: 100%; border-collapse: collapse; margin: 0 auto; font-family: Arial, sans-serif; font-size: 14px;">' . 
                    '<thead style="background-color: #f2f2f2; text-align: center;">' . 
                        '<tr>' . 
                            '<th style="padding: 8px; border: 1px solid #ddd;">No</th>' . 
                            '<th style="padding: 8px; border: 1px solid #ddd;">Transaction Id</th>' . 
                            '<th style="padding: 8px; border: 1px solid #ddd;">Sale Date</th>' . 
                            '<th style="padding: 8px; border: 1px solid #ddd;">Customer Name</th>' . 
                            '<th style="padding: 8px; border: 1px solid #ddd;">Cashier Name</th>' . 
                            '<th style="padding: 8px; border: 1px solid #ddd;">Total Amount</th>' . 
                            '<th style="padding: 8px; border: 1px solid #ddd;">Paid Amount</th>' . 
                            '<th style="padding: 8px; border: 1px solid #ddd;">Change</th>' . 
                        '</tr>' . 
                    '</thead>' . 
                    '<tbody>';

        $counter = 1;
        $totalAmount = 0;

        foreach ($detailData as $detail) {
            if ($detail->sale) {
                $customerName = $detail->sale->customer ? $detail->sale->customer->customer_name : '-';
                $html .= '<tr style="text-align: center;">' . 
                            '<td style="padding: 8px; border: 1px solid #ddd;">' . $counter++ . '</td>' . 
                            '<td style="padding: 8px; border: 1px solid #ddd;">' . $detail->sale->saleID . '</td>' . 
                            '<td style="padding: 8px; border: 1px solid #ddd;">' . $detail->sale->sale_date . '</td>' . 
                            '<td style="padding: 8px; border: 1px solid #ddd;">' . $customerName . '</td>' . 
                            '<td style="padding: 8px; border: 1px solid #ddd;">' . $detail->sale->cashier_name . '</td>' . 
                            '<td style="padding: 8px; border: 1px solid #ddd;">' . number_format($detail->sale->total_amount, 2) . '</td>' . 
                            '<td style="padding: 8px; border: 1px solid #ddd;">' . number_format($detail->sale->paid_amount, 2) . '</td>' . 
                            '<td style="padding: 8px; border: 1px solid #ddd;">' . number_format($detail->sale->change, 2) . '</td>' . 
                        '</tr>';

                $totalAmount += $detail->sale->total_amount;
            }
        }

        $html .= '</tbody>' . 
            '<tfoot>' . 
                '<tr>' . 
                    '<td colspan="5" style="text-align: right; font-weight: bold; padding: 8px; border: 1px solid #ddd;">Grand Total:</td>' . 
                    '<td style="font-weight: bold; padding: 8px; border: 1px solid #ddd; text-align: center;">' . number_format($totalAmount, 2) . '</td>' . 
                    '<td colspan="2"></td>' . 
                '</tr>' . 
            '</tfoot>' . 
            '</table>';

        if ($start_date && $end_date) {
            $html .= '<div style="margin-top: 20px; font-family: Arial, sans-serif; font-size: 14px;">
                        <strong>Period: </strong>' . $start_date . ' - ' . $end_date . '
                    </div>';
        }

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        return $dompdf->stream('detail-report-' . $dateNow . '.pdf');
    }
}
