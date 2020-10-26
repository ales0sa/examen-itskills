<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\InvoiceItem;

class InvoiceController extends Controller
{


    //
    public function index(){

    	$invoices = Invoice::paginate(10);

    	return view('invoices', ['invoices' => $invoices ]);

    }

    public function detail(Invoice $invoice){

       	return view('detail', ['invoice' => $invoice ]);

    }

	public function testDatabase()
	{


	    $invoices = Invoice::factory()->hasItems(rand(1,10))->create([
            'letter' => 'A',
        ]);

        $invoices = Invoice::factory()->hasItems(rand(1,10))->create([
            'letter' => 'B',
        ]);

    	// return view('invoices', ['invoices' => $invoices ]);

    	return back();

	}


}
