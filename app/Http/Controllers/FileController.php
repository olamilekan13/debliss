<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Mail\PdfMail;
use Illuminate\Support\Facades\Mail;
use App\Models\File;

class FileController extends Controller
{
    // public function upload(Request $request)
    // {
    //     try{
    //         // Validate the incoming request
    //         $request->validate([
    //             'pdf_file' => 'required|mimes:pdf',
    //         ]);

    //         // Store the file
    //         $path = $request->file('pdf_file')->store('pdfs', 'public');

    //         // Save file information to the database
    //         $file = new File();
    //         $file->name = $request->file('pdf_file')->getClientOriginalName();
    //         $file->path = $path;
    //         $file->save();
    //         // dd($file);
    //         Mail::to('intellitechltdng@gmail.com')->send(new PdfMail($file->path,$file->name));
    //         return response()->json(['message' => 'File uploaded successfully']);
    //     }catch (\Exception $e){
    // // Return Json Response
    // return response()->json(['message' => $e->getMessage()],500);
    // }
    // }




    public function reservation(Request $request)
    {
        try {
            // Validate the incoming request
            $request->validate([
                'name' => 'required|string',
                'email' => 'required|email',
                'phone_number' => 'required|string',
                'check_in' => 'required|string',
                'check_out' => 'required|string',
                'room_type' => 'required|string',
                'room' => 'required|string',
                'adult' => 'required|string',
                'children' => 'required|string',
            ]);

         

            // Save information to the database
            $data = new File();
            $data->name = $request->name;
            $data->email = $request->email;
            $data->phone_number = $request->phone_number;
            $data->check_in = $request->check_in;
            $data->check_out = $request->check_out;
            $data->room_type = $request->room_type;
            $data->room = $request->room;
            $data->adult = $request->adult;
            $data->children = $request->children;
            $data->save();

            // Send email with all the fields and the file
            $emailData = [
                'name' => $request->name,
                'email' => $request->email,
                'check_in' => $request->check_in,
                'check_out' => $request->check_out,
                'room_type' => $request->room_type,
                'room' => $request->room,
                'adult' => $request->adult,
                'children' => $request->children,
                'phone_number' => $request->phone_number,
            ];
            // dd($emailData);

            Mail::to('response.homelinkers@gmail.com')->send(new PdfMail($emailData));

            return response()->json(['message' => 'Data saved and email sent successfully', 'data'=> $data]);
        } catch (\Exception $e) {
            // Return Json Response
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
