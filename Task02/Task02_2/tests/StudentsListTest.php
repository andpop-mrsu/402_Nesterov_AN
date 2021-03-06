<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\StudentsList;
use App\Student;

class StudentsListTest extends TestCase
{
    public function testAdd()
    {
        $student = new Student();
        $studentsList = new StudentsList();
        $studentsList -> add($student);
        $this -> assertSame(1, $studentsList -> count());
    }

    public function testGet()
    {
        $student = new Student();
        $studentsList = new StudentsList();
        $student -> setName("Алексей") -> setLastName("Нестеров") -> setFaculty("ФМиИТ") -> setCourse(4) -> setGroup(402);
        $studentsList -> add($student);
        $this -> assertInstanceOf(Student::class, $studentsList -> get(1));
    }

    public function testStore()
    {
        $student = new Student();
        $studentsList = new StudentsList();
        $student -> setName("Алексей") -> setLastName("Нестеров") -> setFaculty("ФМиИТ")-> setCourse(4) -> setGroup(402);
        $studentsList -> add($student);
        $this -> assertSame(null, $studentsList -> store("testfile.txt"));
    }

    public function testLoad()
    {
        $studentsList = new StudentsList();
        $studentsList -> load("testfile.txt");
        $this -> assertSame(1, $studentsList -> count());
        $this -> assertInstanceOf(Student::class, $studentsList -> get(1));
        $this -> assertSame("fileName не найден", $studentsList -> load("fileName"));
    }
}
