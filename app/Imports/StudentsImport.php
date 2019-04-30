<?php

namespace App\Imports;
use App\Student;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;

class StudentsImport implements ToCollection
{
    use Importable;
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
       
        //
        foreach ($rows as $row) 
        {
            Student::updateOrCreate(
                ['username' => $row[0]],
                ['grade_class_number' => $row[1],
                 'last_name' => $row[2],
                 'name' => $row[3],
                 'password' => bcrypt($row[4]),]
            );
        }
    }
}
