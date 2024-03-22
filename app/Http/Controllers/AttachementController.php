<?php

namespace App\Http\Controllers;

use App\Models\Attachement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AttachementController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'images.*' => 'image'
        ]);

        $counter = 0;

        foreach ($request->file('images') as $image) {
            $ext = $image->getClientOriginalExtension();
            $filename = time() . '-' . $counter . '.' . $ext;
            $image->move('uploads/attachements/', $filename);
            $path = '/uploads/attachements/' . $filename;

            Attachement::create([
                'project_id' => $request->project_id ?? null,
                'ticket_id' => $request->ticket_id ?? null,
                'product_id' => $request->product_id ?? null,
                'path' => $path,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $counter++;
        }

        return redirect()->back()->with('success', 'Attachements uploaded successfully...');
    }

    public function destroy(Attachement $attachement)
    {
        $path = public_path($attachement->path);
        File::delete($path);
        $attachement->delete();

        return redirect()->back()->with('danger', 'Attachement deleted...');
    }
}
