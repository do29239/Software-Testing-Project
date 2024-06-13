<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // Select only the columns you want to export
        return User::select('id', 'first_name', 'last_name', 'phone', 'email', 'city', 'address', 'postcode', 'role', )->get();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        // Define the column names
        return [
            'ID',
            'Name',
            'Email',
        ];
    }
}
