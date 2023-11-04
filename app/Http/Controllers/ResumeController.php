<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResumeController extends Controller
{
    public function index()
{
    return view('upload');
}

public function store(Request $request)
{
    $request->validate([
        'resume' => 'required|mimes:pdf', // قم بتحديد نوع الملف الذي تسمح برفعه (مثل PDF).
    ]);

    if ($request->hasFile('resume')) {
        $file = $request->file('resume');
        $filename = 'resume.' . $file->getClientOriginalExtension();
        $file->storeAs('resumes', $filename); // ستقوم هذه الخطوة بحفظ الملف في مجلد محدد بالمشروع.

        // هنا يمكنك إضافة أي تحليل أو معالجة ترغب فيها للملف. 
        // يمكنك استخدام المكتبات التي تحتاجها مثل PyPDF2 و spaCy للتحليل.

        return redirect()->route('profile'); // انتقل إلى صفحة الملف الشخصي بعد رفع الملف.
    }

    return redirect()->back()->with('error', 'Failed to upload the file.'); // إذا حدث خطأ في الرفع.
}

}
