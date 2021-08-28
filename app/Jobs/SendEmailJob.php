<?php

namespace App\Jobs;

use App\Models\Order;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;


class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->id   = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data = Order::where('invoice', $this->id)->first();
        // dd($data);
        $mail = $data->toArray();

        $produk = $data->prices()->get();

        $pdf = PDF::loadView('pdf.invoice', compact('data', 'produk'))->setPaper('a4', 'portrait');
        Mail::send('email.laporan', $mail, function ($message) use ($mail, $pdf) {
            $message->to($mail['email'])
                ->subject("Pelayanan BMKG: "  . $mail['status'])
                ->attachData($pdf->output(), "invoice-" . $mail['invoice'] . ".pdf");
        });
    }
}
