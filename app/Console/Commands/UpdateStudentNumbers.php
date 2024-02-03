<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class UpdateStudentNumbers extends Command
{
    protected $signature = 'update:student-numbers';
    protected $description = 'Update admission and roll numbers for existing students';

    public function handle()
    {
        $this->info('Updating student numbers...');

        User::where('user_type', 2)->chunk(200, function ($students) {
            foreach ($students as $student) {
                $student->admission_number = 'ADM' . date('Y') . sprintf('%04d', User::getNextAdmissionNumber());
                $student->roll_number = 'ROL' . date('Y') . sprintf('%04d', User::getNextRollNumber());
                $student->save();
            }
        });

        $this->info('Student numbers updated successfully.');
    }
}
