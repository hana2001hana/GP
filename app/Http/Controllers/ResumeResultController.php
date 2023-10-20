<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resume;

class ResumeResultController extends Controller
{
    public function show($id)
    {
        $resume = Resume::find($id);
        if ($resume) {
            return view('resume.show', ['resume' => $resume]);
        } else {
            return redirect()->route('resume.index')->with('error', 'السيرة الذاتية غير موجودة.');
        }
    }
}
