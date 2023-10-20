<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Resume; // استيراد النموذج الذي تم إنشاؤه

class ResumeController extends Controller
{
    public function upload(Request $request)
    {
        // التحقق من وجود ملف في الطلب
        if ($request->hasFile('resume_file')) {
            // استخراج الملف من الطلب
            $file = $request->file('resume_file');

            // التحقق من نوع الملف
            if ($file->getClientOriginalExtension() === 'pdf') {
                // توليد اسم ملف فريد لتخزينه
                $file_name = uniqid() . '.pdf';

                // تخزين الملف في المسار المحدد
                $file->storeAs('resumes', $file_name);

                // تحليل ملف السيرة الذاتية باستخدام PyPDF2
                $pdf_text = "";
                try {
                    $pdf = \PyPDF2\PyPDF::fpassthru($file);
                    $pdf_text = $pdf->extractText();
                } catch (\Exception $e) {
                    // إدراج الاستثناء هنا إذا لزم الأمر
                }

                // تحليل نص السيرة الذاتية باستخدام SpaCy
                $nlp = new \Spacy\Nlp();
                $doc = $nlp->load($pdf_text);

                // استخراج المعلومات من النص
                $name = "";
                $education = "";
                $experience = "";

                // قم بتحليل المعلومات اللازمة من النص هنا

                // حفظ المعلومات في قاعدة البيانات
                $resume = new Resume();
                $resume->file_name = $file_name;
                $resume->file_path = 'resumes/' . $file_name;
                $resume->name = $name;
                $resume->education = $education;
                $resume->experience = $experience;
                $resume->save();

                return redirect()->route('resume.index')->with('success', 'تم رفع ملف السيرة الذاتية بنجاح.');
            } else {
                return back()->with('error', 'يجب أن يكون الملف بامتداد PDF فقط.');
            }
        } else {
            return back()->with('error', 'الرجاء تحديد ملف السيرة الذاتية.');
        }
    }
}
