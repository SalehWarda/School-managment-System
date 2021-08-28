<?php


namespace App\Http\Interfaces;


use App\Http\Requests\TeacherRequest;

interface TeacherRepositoryInterface
{

    public function getAllTeachers();

    public function getAllGender();

    public function getAllSpecializations();

    public function storeTeacher($request);

    public function edit($id);

    public function update($request);

    public function destroy($request);



}
