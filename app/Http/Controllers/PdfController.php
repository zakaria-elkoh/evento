<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Barryvdh\DomPDF\Facade\PDF;
// use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PdfController extends Controller
{
    public function generateTicket(Event $event)
    {

        // $data = [
        //     'name' => Auth::user()->name,
        // ];

        $pdf = PDF::loadView('ticket');
        return $pdf->download('ticket.pdf');
        return view('ticket');
    }
}
