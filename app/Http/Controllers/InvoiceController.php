<?php

namespace App\Http\Controllers;

  

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Product; // Import your model
use Illuminate\Support\Str; // Import Str class at the top

class InvoiceController extends Controller

{

    /**

     * Write code on Method

     *

     * @return response()

     */

     

    public function index(Request $request)

    {

        $input['geninvoiceid'] = Str::generateNumericId(12);

        // Fetch data from the database
        $data = Product::select('name', 'detail', 'price','image')->get();

        // Load the view and pass the data
        $pdf = Pdf::loadView('invoice', ['data' => $data, 'geninvoiceid' =>$input['geninvoiceid']]);

        // $data = [

        //     [

        //         'quantity' => 2,

        //         'description' => 'Gold',

        //         'price' => '$500.00'

        //     ],

        //     [

        //         'quantity' => 3,

        //         'description' => 'Silver',

        //         'price' => '$300.00'

        //     ],

        //     [

        //         'quantity' => 5,

        //         'description' => 'Platinum',

        //         'price' => '$200.00'

        //     ]

        // ];

       

        // $pdf = Pdf::loadView('invoice', ['data' => $data]);

       

        return $pdf->download('invoice.pdf');

    }

}
