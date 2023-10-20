<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    protected $table = 'resumes'; // اسم الجدول

    protected $fillable = ['file_name', 'file_path', 'uploaded_at']; // الحقول القابلة للتعبئة


    
//مهاجم للتحقق من صحة نوع الملف وتنسيقه عند الرفع
public static $rules = [
    'file' => 'required|mimes:pdf',
];
  
    
}

