<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AttachmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('staff')->except('create');
        $this->middleware('admin')->only('destroy');
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
            $image->move('uploads/attachments/', $filename);
            $path = '/uploads/attachments/' . $filename;

            Attachment::create([
                'project_id' => $request->project_id ?? null,
                'ticket_id' => $request->ticket_id ?? null,
                'product_id' => $request->product_id ?? null,
                'path' => $path,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $counter++;
        }

        return redirect()->back()->with('success', 'Attachments uploaded successfully...');
    }

    public function destroy(Attachment $attachment)
    {
        $path = public_path($attachment->path);
        File::delete($path);
        $attachment->delete();

        return redirect()->back()->with('danger', 'Attachment deleted...');
    }

    public function download(Attachment $attachment)
    {
        $path = public_path($attachment->path);
        if (file_exists($path)) {
            return response()->download($path);
        } else {
            return response()->json(['error' => 'File not found.'], 404);
        }
    }
}
