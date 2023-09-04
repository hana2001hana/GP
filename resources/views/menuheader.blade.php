<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>finalprojectgraduation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </head>
  <body>
    <!-- ----------------------------------------- -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
       
          <a class="navbar-brand" href="http://127.0.0.1:8000/home">Hire.ps</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="http://127.0.0.1:8000/home">Home</a>
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="http://127.0.0.1:8000/company">Company</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Rint</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Courses</a>
              </li>
              </li>
              </ul>
            <form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Logout</button>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="http://127.0.0.1:8000/profile">Profile</a>
                </li>
              </li>
            </form>
          </div>
        </div>
    </nav>
   <!-- ------------------------------------------  -->
  <!-- <nav class="main-menu">
<div class="menu-head d-hide">
<button class="main-menu--toggle">
<i class="bars close ji ji-cross"></i>
</button>
</div>
<div class="mobile-login-for-job-seeker d-hide">
<div class="message ">
مرحباً،<br>سجّل دخولك الآن وإبدأ بالتقدم للوظائف!
</div>
<div class="actions">
<a href="https://www.jobs.ps/job-seeker/login" class="btn-9"> دخول</a>
<a href="https://www.jobs.ps/job-seeker/signup" class="btn-9">إنشاء حساب</a>
</div>
</div>
<ul data-title="" role="navigation" itemscope="" itemtype="http://schema.org/SiteNavigationElement">
<li class="active ">
<a itemprop="url" href="/" title="الرئيسية">
<i class="ji ji-home"></i>
<span itemprop="name">الرئيسية</span>
</a>
</li> <li class=" has-child">
<a itemprop="url" href="/jobs" title="الوظائف">
<i class="ji ji-arrow-down"></i>
<i class="ji ji-jobs"></i>
<span itemprop="name">الوظائف</span>
</a>
<ul data-title="الوظائف">
<li class="desk-hide close-submenu">
<i class="ji ji-arrow-down"></i>
</li>
<li class=" ">
<a itemprop="url" href="/jobs" title="بحث عن وظائف">
<i class="ji ji-Search Jobs"></i>
<span itemprop="name">بحث عن وظائف</span>
</a>
</li> <li class=" ">
<a itemprop="url" href="/locations" title="بحث حسب المدينة">
<i class="ji ji-Search By Location"></i>
<span itemprop="name">بحث حسب المدينة</span>
</a>
</li> <li class=" ">
<a itemprop="url" href="/categories" title="بحث حسب المجال">
<i class="ji ji-Search By Category"></i>
<span itemprop="name">بحث حسب المجال</span>
</a>
</li> <li class=" ">
<a itemprop="url" href="/employers" title="بحث حسب المؤسسة / الشركة">
<i class="ji ji-Search By Employers"></i>
<span itemprop="name">بحث حسب المؤسسة / الشركة</span>
</a>
</li> </ul> </li> <li class=" ">
<a itemprop="url" href="/job-seeker/login" title="باحث عن عمل">
<i class="ji ji-followers"></i>
<span itemprop="name">باحث عن عمل</span>
</a>
</li> <li class=" ">
<a itemprop="url" href="/articles" title="مقالات">
<i class="ji ji-applications"></i>
<span itemprop="name">مقالات</span>
</a>
</li> <li class=" ">
<a itemprop="url" href="/job-alerts" title="تنبيهات الوظائف">
<i class="ji ji-job-alerts"></i>
<span itemprop="name">تنبيهات الوظائف</span>
</a>
</li> <li class=" ">
<a itemprop="url" href="/training-courses" title=" الدورات التدريبية">
<i class="ji ji-training-course"></i>
<span itemprop="name"> الدورات التدريبية</span>
</a>
</li> <li class=" ">
<a itemprop="url" href="https://www.jobs.ps/tenders" title=" عطاءات فلسطين">
<i class="ji ji-"></i>
<span itemprop="name"> عطاءات فلسطين</span>
</a>
</li> <li class=" ">
<a itemprop="url" href="/contact" title="إتصل بنا">
<i class="ji ji-contact-us"></i>
<span itemprop="name">إتصل بنا</span>
</a>
</li> </ul>
<div class="mobile-employers d-hide">
<button title="لأصحاب العمل" class="btn-3">
لأصحاب العمل
</button>
<ul data-title="لأصحاب العمل">
<li class="desk-hide close-submenu">
<i class="ji ji-arrow-down"></i>
</li>
<li class=" ">
<a class="" href="https://www.jobs.ps/employer/login" title=" دخول">
دخول </a>
</li>
<li class="">
<a class="" href="https://www.jobs.ps/employer/signup" title="إنشاء حساب">
إنشاء حساب </a>
</li>
<li class=" ">
<a class="" href="/employer/job/create" title="أعلن عن وظيفة">
أعلن عن وظيفة </a>
</li>
<li class=" ">
<a class="" href="/employer/resume-search" title="تصفّح السير الذاتية">
تصفّح السير الذاتية </a>
</li>
<li class=" ">
<a class="" href="/company-pages" title="مَنصة التوظيف /صفحات الشركات">
مَنصة التوظيف /صفحات الشركات </a>
</li>
<li class=" ">
<a class="" href="/employer-landing" title="لماذا جوبس؟">
لماذا جوبس؟ </a>
</li>
<li class=" ">
<a class="" href="/tenders" title="عطاءات /إستشارات">
عطاءات /إستشارات </a>
</li>
</ul>
</div>
<div class="language-switch  m-hide">
<div class="language-switch--title">
<a href="https://www.jobs.ps/en/" title="English">English</a>
</div>
</div>
</nav> -->


  </body>
</html>