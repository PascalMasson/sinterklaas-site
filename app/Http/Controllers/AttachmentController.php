<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use Illuminate\Http\Request;

class AttachmentController extends Controller
{
    public function delete(Request $request, $id)
    {
        $attachment = Attachment::find($id);
        $attachment->delete();
        return redirect()->back();
    }
}
