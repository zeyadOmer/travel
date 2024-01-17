<?php

namespace App\Http\Controllers;

use App\Models\ticket;
use App\Models\User;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use  PDF;




class TicketController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tickets = \App\Models\Ticket::all();
        return view('tickets.ticketslist', compact('tickets'));
    }
    public function view($id)
    {
        $ticket = \App\Models\Ticket::find($id);
        return view('tickets.view', compact('ticket'));
    }
    public function view2($id)
    {
        $ticket = \App\Models\Ticket::find($id);
        return view('tickets.pdf', compact('ticket'));
    }

    //new
    public function new()
    {
        return view("tickets.addticket");
    }

    public function add(Request $request)
    {

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'password' => bcrypt($request->password),
            'type' => 'customer',
            'company_id' => $request->company_id,
        ]);

        try {
            // Save the ticket data with the generated QR code
            $ticket = Ticket::create([
                'customer_id' => $user->id,
                'trip_id' => $request->input('trip_id'),
                'date' => now(),
            ]);
        } catch (\Illuminate\Database\QueryException $e) {
            dd($e->getMessage());
        }
        // Your existing code...

        // Generate a random QR code data
        $data = url('/ticketview/' . $ticket->id);


        // Generate QR code image using the QR Code Server API
        $apiUrl = "https://api.qrserver.com/v1/create-qr-code/?data=" . urlencode($data);
        $client = new Client();
        $response = $client->get($apiUrl);

        // Check if the API request was successful
        if ($response->getStatusCode() == 200) {
            // Get the image content
            $imageContent = $response->getBody()->getContents();

            $ticket->update([
                'barcode' => $imageContent,
            ]);

            // Redirect to the route that displays the QR code
            return redirect()->route('tickets.list');
        } else {
            // Handle API request error
            return "Error generating QR code. Please try again.";
        }
    }

    public function generatePDF($id)
    {
        try {

            $ticket = ticket::find($id);
            $data = [
                'ticket' => $ticket,
            ];

            $pdf = PDF::loadView('tickets.pdf', $data);

            return $pdf->stream('document.pdf');
        } catch (\Exception $e) {
            // Handle the exception, log the error, or display an error message
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }




    public function generateBarcode(Request $request)
    {
        $data = $request->input('data', 'Default QR Code Data');
        $apiUrl = "https://api.qrserver.com/v1/create-qr-code/?data=" . urlencode($data);

        $client = new Client();
        $response = $client->get($apiUrl);

        return response($response->getBody())
            ->header('Content-Type', 'image/png');
    }

    public function delete($id)
    {
        $ticket = Ticket::findOrFail($id);
        if ($ticket->delete()) {
            return redirect()->back()->with('success', 'Se elimino correctamente el ticket');
        } else {
            return redirect('/admin')->with('danger', 'No se pudo eliminar el ticket
                    intente mas tarde o contactese con soporte');
        };
    }
}
