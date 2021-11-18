<?php

namespace App\Providers;

use App\Http\Interfaces\AttendanceReposetoryInterface;
use App\Http\Interfaces\FeesInvoicesRepositoryInterface;
use App\Http\Interfaces\FeesRepositoryInterface;
use App\Http\Interfaces\LibraryRepositoryInterface;
use App\Http\Interfaces\PaymentStudentsRepositoryInterface;
use App\Http\Interfaces\ProcessingFeeRepositoryInterface;
use App\Http\Interfaces\QuestionRepositoryInterface;
use App\Http\Interfaces\QuizzeReposetoiryInterface;
use App\Http\Interfaces\ReceiptStudentsRepositoryInterface;
use App\Http\Interfaces\StudentRepositoryInterface;
use App\Http\Interfaces\SubjectReposetoryInterface;
use App\Http\Interfaces\TeacherRepositoryInterface;
use App\Http\Requests\LibraryRepository;
use App\Repositories\AttendanceRepository;
use App\Repositories\FeesInvoicesRepository;
use App\Repositories\FeesRepository;
use App\Repositories\PaymentStudentsRepository;
use App\Repositories\ProcessingFeeRepository;
use App\Repositories\QuestionRepository;
use App\Repositories\QuizzeRepository;
use App\Repositories\ReceiptStudentsRepository;
use App\Repositories\StudentRepository;
use App\Repositories\SubjectReposetory;
use App\Repositories\TeacherRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryInterfaceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(TeacherRepositoryInterface::class, TeacherRepository::class);
        $this->app->bind(StudentRepositoryInterface::class, StudentRepository::class);
        $this->app->bind(FeesRepositoryInterface::class, FeesRepository::class);
        $this->app->bind(FeesInvoicesRepositoryInterface::class, FeesInvoicesRepository::class);
        $this->app->bind(ReceiptStudentsRepositoryInterface::class, ReceiptStudentsRepository::class);
        $this->app->bind(ProcessingFeeRepositoryInterface::class, ProcessingFeeRepository::class);
        $this->app->bind(PaymentStudentsRepositoryInterface::class, PaymentStudentsRepository::class);
        $this->app->bind(AttendanceReposetoryInterface::class, AttendanceRepository::class);
        $this->app->bind(SubjectReposetoryInterface::class, SubjectReposetory::class);
        $this->app->bind(QuizzeReposetoiryInterface::class, QuizzeRepository::class);
        $this->app->bind(QuestionRepositoryInterface::class, QuestionRepository::class);
        $this->app->bind(LibraryRepositoryInterface::class, LibraryRepository::class);

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
