<?php

use App\Http\Controllers\Dashboard\AttendanceController;
use App\Http\Controllers\Dashboard\FeesController;
use App\Http\Controllers\Dashboard\FeesInvoiseController;
use App\Http\Controllers\Dashboard\GraduationController;
use App\Http\Controllers\Dashboard\PaymentController;
use App\Http\Controllers\Dashboard\ProcessingFeeController;
use App\Http\Controllers\Dashboard\PromotionController;
use App\Http\Controllers\Dashboard\QuizzeController;
use App\Http\Controllers\Dashboard\ReceiptStudentsController;
use App\Http\Controllers\Dashboard\StudentController;
use App\Http\Controllers\Dashboard\SubjectController;
use App\Http\Controllers\Dashboard\TeacherController;
use App\Http\Controllers\Dashboard\ClassRoomController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\GradesController;
use App\Http\Controllers\Dashboard\LoginController;
use App\Http\Controllers\Dashboard\MyParentController;
use App\Http\Controllers\Dashboard\SectionController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){




     Route::group(['prefix'=>'admin','middleware'=>'auth:admin'],function (){


        Route::get('/dashboard',[DashboardController::class,'index'])->name('admin.dashboard');
        Route::get('/logout',[LoginController::class,'logout'])->name('logout');


         ########################### Grades Routes ############################

         Route::group(['prefix'=>'Grades'],function (){

             Route::get('/grades',[GradesController::class,'index'])->name('admin.grades');
             Route::post('/grades/store',[GradesController::class,'store'])->name('admin.grades.store');
             Route::post('/grades/update',[GradesController::class,'update'])->name('admin.grades.update');
             Route::post('/grades/delete',[GradesController::class,'destroy'])->name('admin.grades.delete');

         });

         ########################### Class-Room Routes ############################

         Route::group(['prefix'=>'Classes'],function (){

             Route::get('/classes',[ClassRoomController::class,'index'])->name('admin.classes');
             Route::post('/classes/store',[ClassRoomController::class,'store'])->name('admin.classes.store');
             Route::post('/classes/update',[ClassRoomController::class,'update'])->name('admin.classes.update');
             Route::post('/classes/delete',[ClassRoomController::class,'destroy'])->name('admin.classes.delete');
             Route::post('/classes/delete_all',[ClassRoomController::class,'deleteAll'])->name('admin.classes.deleteAll');
             Route::post('/filter_class',[ClassRoomController::class,'filter'])->name('admin.classes.filter');

         });

         ########################### Sections Routes ############################

         Route::group(['prefix'=>'Sections'],function (){

             Route::get('/sections',[SectionController::class,'index'])->name('admin.sections');
             Route::post('/sections/store',[SectionController::class,'store'])->name('admin.sections.store');
             Route::post('/sections/update',[SectionController::class,'update'])->name('admin.sections.update');
             Route::post('/sections/delete',[SectionController::class,'destroy'])->name('admin.sections.delete');
//             Route::post('/classes/delete_all',[ClassRoomController::class,'deleteAll'])->name('admin.classes.deleteAll');
//             Route::post('/filter_class',[ClassRoomController::class,'filter'])->name('admin.classes.filter');
             Route::get('/classes/{id}',[SectionController::class,'getclasses']);

         });

         ########################### My Parents Routes ############################

         Route::group(['prefix'=>'myParents'],function (){

             Route::get('/parents',[MyParentController::class,'index'])->name('admin.addParent');
             Route::post('/parents/store',[MyParentController::class,'store'])->name('admin.addParent.store');
             Route::post('/parents/update',[MyParentController::class,'update'])->name('admin.addParent.update');
             Route::post('/parents/delete',[MyParentController::class,'destroy'])->name('admin.addParent.delete');

         });


         ########################### My Teachers Routes ############################

         Route::group(['prefix'=>'teachers'],function (){

             Route::get('/teachers',[TeacherController::class,'index'])->name('admin.teachers');
             Route::get('/create',[TeacherController::class,'create'])->name('admin.teachers.create');
             Route::post('/store',[TeacherController::class,'store'])->name('admin.teachers.store');
             Route::get('/edit/{id}',[TeacherController::class,'edit'])->name('admin.teachers.edit');
             Route::post('/update',[TeacherController::class,'update'])->name('admin.teachers.update');
             Route::post('/delete',[TeacherController::class,'destroy'])->name('admin.teachers.delete');

         });

         ########################### Students Routes ############################

         Route::group(['prefix'=>'students'],function (){

             Route::get('/students',[StudentController::class,'index'])->name('admin.students');
             Route::get('/create',[StudentController::class,'create'])->name('admin.students.create');
             Route::post('/store',[StudentController::class,'store'])->name('admin.students.store');
             Route::get('/edit/{id}',[StudentController::class,'edit'])->name('admin.students.edit');
             Route::post('/update',[StudentController::class,'update'])->name('admin.students.update');
             Route::post('/delete',[StudentController::class,'destroy'])->name('admin.students.delete');
             Route::get('/show/{id}',[StudentController::class,'show'])->name('admin.students.show');
             Route::post('/upload_attachment',[StudentController::class,'Upload_attachment'])->name('admin.students.upload_attachment');
             Route::get('/download_attachment/{studentsname}/{filename}',[StudentController::class,'download_attachment'])->name('admin.students.download_attachment');
             Route::post('/delete_attachment',[StudentController::class,'delete_attachment'])->name('delete_attachment');

             Route::get('/classes/{id}',[StudentController::class,'getclasses']);
             Route::get('/sections/{id}',[StudentController::class,'getsections']);

             Route::post('/graduate',[StudentController::class,'graduate'])->name('admin.student.graduate');




             Route::get('/promotion',[PromotionController::class,'index'])->name('admin.promotion');
             Route::get('/promotion_management',[PromotionController::class,'getPromotionManagement'])->name('admin.promotion.management');
             Route::post('/store_promotion',[PromotionController::class,'store'])->name('admin.promotion.store');
             Route::post('/back_promotion',[PromotionController::class,'backPromotion'])->name('admin.promotion.back');



             Route::get('/graduates',[GraduationController::class,'index'])->name('admin.graduates');
             Route::get('/graduating_management',[GraduationController::class,'getGraduateManagement'])->name('admin.graduate.management');
             Route::post('/graduating_info',[GraduationController::class,'getGraduateInfo'])->name('admin.graduate.Info');
             Route::post('/graduates_return',[GraduationController::class,'return'])->name('admin.graduate.return');
             Route::post('/graduates_delete',[GraduationController::class,'destroy'])->name('admin.graduate.delete');





         });


         ########################### Fees Routes ############################

         Route::group(['prefix'=>'fees'],function (){

             Route::get('/',[FeesController::class,'index'])->name('admin.fees');
             Route::get('/create',[FeesController::class,'create'])->name('admin.fees.create');
             Route::post('/store',[FeesController::class,'store'])->name('admin.fees.store');
             Route::get('/edit/{id}',[FeesController::class,'edit'])->name('admin.fees.edit');
             Route::post('/update',[FeesController::class,'update'])->name('admin.fees.update');
             Route::post('/delete',[FeesController::class,'destroy'])->name('admin.fees.delete');

         });


           ########################### FeesInvoice Routes ############################

         Route::group(['prefix'=>'fee_invoice'],function (){

             Route::get('/',[FeesInvoiseController::class,'index'])->name('admin.fee_invoice');
             Route::get('/create/{id}',[FeesInvoiseController::class,'create'])->name('admin.feeInvoice.create');
             Route::post('/store',[FeesInvoiseController::class,'store'])->name('admin.feeInvoice.store');
             Route::get('/edit/{id}',[FeesInvoiseController::class,'edit'])->name('admin.fee_invoice.edit');
             Route::post('/update',[FeesInvoiseController::class,'update'])->name('admin.fee_invoice.update');
             Route::post('/delete',[FeesInvoiseController::class,'destroy'])->name('admin.fee_invoice.delete');

             Route::get('/amount/{id}',[FeesInvoiseController::class,'getAmount']);


         });


           Route::group(['prefix'=>'receipt'],function (){

             Route::get('/',[ReceiptStudentsController::class,'index'])->name('admin.receipts');
             Route::get('/create/{id}',[ReceiptStudentsController::class,'create'])->name('admin.receipts.create');
             Route::post('/store',[ReceiptStudentsController::class,'store'])->name('admin.receipts.store');
             Route::get('/edit/{id}',[ReceiptStudentsController::class,'edit'])->name('admin.receipts.edit');
             Route::post('/update',[ReceiptStudentsController::class,'update'])->name('admin.receipts.update');
             Route::post('/delete',[ReceiptStudentsController::class,'destroy'])->name('admin.receipts.delete');

         });



           Route::group(['prefix'=>'processingFee'],function (){

             Route::get('/',[ProcessingFeeController::class,'index'])->name('admin.processingFee');
             Route::get('/create/{id}',[ProcessingFeeController::class,'create'])->name('admin.processingFee.create');
             Route::post('/store',[ProcessingFeeController::class,'store'])->name('admin.processingFee.store');
             Route::get('/edit/{id}',[ProcessingFeeController::class,'edit'])->name('admin.processingFee.edit');
             Route::post('/update',[ProcessingFeeController::class,'update'])->name('admin.processingFee.update');
             Route::post('/delete',[ProcessingFeeController::class,'destroy'])->name('admin.processingFee.delete');

         });

           Route::group(['prefix'=>'payment'],function (){

             Route::get('/',[PaymentController::class,'index'])->name('admin.payment');
             Route::get('/create/{id}',[PaymentController::class,'create'])->name('admin.payment.create');
             Route::post('/store',[PaymentController::class,'store'])->name('admin.payment.store');
             Route::get('/edit/{id}',[PaymentController::class,'edit'])->name('admin.payment.edit');
             Route::post('/update',[PaymentController::class,'update'])->name('admin.payment.update');
             Route::post('/delete',[PaymentController::class,'destroy'])->name('admin.payment.delete');

         });

           Route::group(['prefix'=>'attendance'],function (){

             Route::get('/',[AttendanceController::class,'index'])->name('admin.attendance');
             Route::get('/show/{id}',[AttendanceController::class,'show'])->name('admin.attendance.show');
             Route::post('/store',[AttendanceController::class,'store'])->name('admin.attendance.store');

         });

           Route::group(['prefix'=>'subjects'],function (){

               Route::get('/',[SubjectController::class,'index'])->name('admin.subjects');
               Route::get('/create',[SubjectController::class,'create'])->name('admin.subjects.create');
               Route::post('/store',[SubjectController::class,'store'])->name('admin.subjects.store');
               Route::get('/edit/{id}',[SubjectController::class,'edit'])->name('admin.subjects.edit');
               Route::post('/update',[SubjectController::class,'update'])->name('admin.subjects.update');
               Route::post('/delete',[SubjectController::class,'destroy'])->name('admin.subjects.delete');

         });

           Route::group(['prefix'=>'quizzes'],function (){

               Route::get('/',[QuizzeController::class,'index'])->name('admin.quizzes');
               Route::get('/create',[QuizzeController::class,'create'])->name('admin.quizzes.create');
               Route::post('/store',[QuizzeController::class,'store'])->name('admin.quizzes.store');
               Route::get('/edit/{id}',[QuizzeController::class,'edit'])->name('admin.quizzes.edit');
               Route::post('/update',[QuizzeController::class,'update'])->name('admin.quizzes.update');
               Route::post('/delete',[QuizzeController::class,'destroy'])->name('admin.quizzes.delete');

         });



     });




});




Route::group(['prefix'=>'admin','middleware'=>'guest:admin'],function (){

    Route::get('/login',[LoginController::class,'getLogin'])->name('admin.getLogin');
    Route::post('/login',[LoginController::class,'login'])->name('login');



});
