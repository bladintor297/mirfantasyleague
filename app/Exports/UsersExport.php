<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all();
    }

    public function headings(): array
    {
        return [
            'id',
            'name',
            'email',
            'username',
            'phone',
            'team_name',
            'team_logo',
            'role',
            'email_verified_at',
            'password',
            'remember_token',
            'created_at',
            'updated_at',
        ];
    }
}
