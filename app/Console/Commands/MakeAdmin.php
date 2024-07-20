<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Topdot\Core\Models\Role;

class MakeAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $email = $this->getEmail();
        $password = $this->getPassword();

        if ( $user = User::where('email',$email)->first() ){
            $this->info('User Already Exist in Database with This email');

            if ( !$this->confirm('Override ?') ){
                return;
            }
        }
        $name = $this->getOutput()->ask('Enter Name: ','admin');

        if ( $user ){
            $user->update([
                'name' => $name,
                'email' => $email,
                'password' => bcrypt($password)
            ]);
            $this->info('User Updated;');
            return ;
        }

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password)
        ]);

        $role = Role::create([
            'name' => Role::ROLE_SUPER_ADMIN,
            'deleteable' => false
        ]);

        $user->assignRole($role->id);

        $this->info('User Created;');
    }

    private function getEmail()
    {
        $email = $this->getOutput()->ask('Enter Email. If left empty default will be admin@admin.com','admin@admin.com');
        $validator = \Validator::make(['email'=>$email],[ 'email' => ['required','email']]);
        if ($validator->fails()){
            $this->error($validator->errors()->first());
            return $this->getEmail();
        }

        return $email;
    }

    private function getPassword()
    {
        $password = $this->getOutput()->askHidden('Enter Password For User. if left empty default will be 12345678');
        if (!$password){
            return '12345678';
        }

        $confirmPassword = $this->getOutput()->askHidden('Confirm Password');

        $validator = \Validator::make(['password'=>$password,'password_confirmation'=>$confirmPassword],['password'=> ['required','min:8','confirmed']]);
        if ($validator->fails()){
            $this->error($validator->errors()->first());
            return $this->getPassword();
        }

        return $password;
    }
}
