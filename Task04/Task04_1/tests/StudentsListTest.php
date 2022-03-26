<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\StudentsList;
use App\Student;

class StudentsListTest extends TestCase
{
    public function testAddAndCount()
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
        $student -> setName("Алексей") -> setLastName("Нестеров") -> setFaculty("FMiIT") -> setCourse(4) -> setGroup(402);
        $studentsList -> add($student);
        $this -> assertInstanceOf(Student::class, $studentsList -> get(1));
    }

    public function testStore()
    {
        $student = new Student();
        $studentsList = new StudentsList();
        $student -> setName("Алексей") -> setLastName("Нестеров") -> setFaculty("FMiIT")-> setCourse(4) -> setGroup(402);
        $studentsList -> add($student);
        $this -> assertSame(null, $studentsList -> store("output"));
    }

    public function testCurrentAndKey()
    {
        $student1 = new Student();
        $student2 = new Student();
        $student3 = new Student();
        $studentsList = new StudentsList();
        $student1 -> setName("Алексей") -> setLastName("Нестеров") -> setFaculty("FMiIT")-> setCourse(4) -> setGroup(402);
        $student2 -> setName("Denis") -> setLastName("Razumov") -> setFaculty("FMiIT") -> setCourse(4) -> setGroup(402);
        $student3 -> setName("Ivan") -> setLastName("Ivanov") -> setFaculty("FET") -> setCourse(1) -> setGroup(102);
        $studentsList -> add($student1);
        $studentsList -> add($student2);
        $studentsList -> add($student3);

        $this -> assertSame("Id: 6" . "\n" .
        "Фамилия: Нестеров" . "\n" .
        "Имя: Алексей" . "\n" .
        "Факультет: FMiIT" . "\n" .
        "Курс: 4" . "\n" .
        "Группа: 402", $studentsList -> current() -> __toString());
        $this -> assertSame(6, $studentsList -> key());
        return $studentsList;
    }
    /**
     * @depends testCurrentAndKey
     */

    public function testNext(StudentsList $studentsList)
    {
        $studentsList -> next();
        $this -> assertSame("Id: 7" . "\n" .
        "Фамилия: Razumov" . "\n" .
        "Имя: Denis" . "\n" .
        "Факультет: FMiIT" . "\n" .
        "Курс: 4" . "\n" .
        "Группа: 402", $studentsList -> current() -> __toString());
        $studentsList -> next();
        $this -> assertSame("Id: 8" . "\n" .
        "Фамилия: Ivanov" . "\n" .
        "Имя: Ivan" . "\n" .
        "Факультет: FET" . "\n" .
        "Курс: 1" . "\n" .
        "Группа: 102", $studentsList -> current() -> __toString());

        return $studentsList;
    }

    /**
     * @depends testNext
     */

    public function testValidAndRewind(StudentsList $studentsList)
    {
        $studentsList -> next();
        $this -> assertSame(false, $studentsList -> valid());
        $studentsList -> rewind();
        $this -> assertSame(true, $studentsList -> valid());
        $this -> assertSame("Id: 6" . "\n" .
        "Фамилия: Нестеров" . "\n" .
        "Имя: Алексей" . "\n" .
        "Факультет: FMiIT" . "\n" .
        "Курс: 4" . "\n" .
        "Группа: 402", $studentsList -> current() -> __toString());
    }
}
