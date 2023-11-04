<?php

namespace App\Http\Controllers;

use App\Models\UploadedFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class FileUploadController extends Controller
{
    public function store(Request $request)
{
    if ($request->hasFile('resume')) {
        $file = $request->file('resume');
        $fileName = $file->getClientOriginalName(); // احصل على اسم الملف الأصلي
        $path = $file->storeAs('uploads', $fileName); // قم بتخزين الملف في مجلد "uploads"

        // قم بحفظ معلومات الملف في قاعدة البيانات
        UploadedFile::create([
            'name' => $fileName,
            'path' => $path,
            // يمكنك إضافة مزيد من المعلومات هنا إذا كنت بحاجة
        ]);

        return redirect('/CV')->with('success', 'تم رفع الملف بنجاح');
    }

    return redirect('/upload')->with('error', 'لم يتم اختيار ملف');
}

}
