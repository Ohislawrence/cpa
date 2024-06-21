<?php

namespace App\Livewire;

use App\Mail\WelcomeEmail;
use App\Models\Affiliatedetail;
use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class Registration extends Component 
{
    public $currentSection = 1;
    public $name, $passWord, $email, $phonenumber, $country, $region, $messager, $refid;
    public $successMessage;
    public $incompeteMessage;

    public function step1()
    {
        $validatedData = $this->validate([
            'passWord' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        $this->currentSection = 2;
    }
    public function step2()
    {
        $validatedData = $this->validate([
            'country' => 'required',
            'phonenumber' => 'required|numeric|unique:affiliatedetails',
            'region' => 'required',
            'messager' => 'required',
        ]);

        $this->currentSection = 3;
    }
    public function step3(): void
    {
        
        if(!empty($this->refid)){
            $refID= $this->refid;
        }else{
            $refID= null ;
        }

        
        
        if(!empty($this->name) && !empty($this->email) && !empty($this->passWord) && !empty($this->phonenumber)  && !empty($this->country)  && !empty($this->messager))
        {
            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->passWord),
            ]);
    
            Affiliatedetail::create([
                'user_id' => $user->id,
                'status' => 'Pending',
                'city' => "drdrrr",
                'country' => $this->country,
                'region' => $this->region,
                'phonenumber' => $this->phonenumber,
                'instantmessageid' => $this->messager,
                'referral_id' => $this->generateUniqueCode(),
                'referred_by' => $refID,
            ]);
    
            $role = Role::where('name', 'affiliate')->first();
            $user->assignRole($role);
    
            $this->clearForm();
    
            Mail::to($user->email)->queue(new WelcomeEmail($user));
            $this->currentSection = 4;
            $this->successMessage = "Great Job! We have received your details and will contact you soon. Check your email for the validation mail.";
           
        }else{
            $this->incompeteMessage = "Check and fill the form before clicking join";
        }
        
    }

    public function step4()
    {
        
    }

    public function back($section)
    {
        $this->currentSection = $section;
    }
    public function clearForm()
    {
        $this->name = "";
        $this->passWord = "";
        $this->country = "";
        $this->region = "";
        $this->phonenumber = "";
        $this->email = "";
        $this->messager = "";
    }

    public function generateUniqueCode()
    {
        do {
            $code = random_int(10000000, 99999999);
        } while (Affiliatedetail::where("referral_id", "=", $code)->first());

        return $code;
    }

    public function mount() 
  {
     $this->refid = request()->query('refid') ;
  }

    public function render()
    {
        return view('livewire.registration');
    }
}
