<div class="pt-5">
    
    <ul class="nav nav-pills nav-fill">
        <li class="nav-item">
            <a class="nav-link {{ $currentSection != 1 ? '' : 'active' }}" href="#step1">Sign in details</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $currentSection != 2 ? '' : 'active' }}" href="#step2">Affiliate details</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $currentSection != 3 ? '' : 'active' }}" href="#step3">Preview</a>
        </li>
    </ul>
    <div class="row pt-3">
        {{-- Step 1 --}}
        <div id="step1" class="needs-validation" style="display: {{ $currentSection != 1 ? 'none' : '' }}">
            
            <input type="hidden" wire:model = "refid" >
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" wire:model="name" class="form-control {{$errors->first('name') ? "is-invalid" : "" }}" id="name" aria-describedby="name">
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" wire:model="email" class="form-control {{$errors->first('email') ? "is-invalid" : "" }}" id="email" aria-describedby="email">
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="birth_place" class="form-label">Password</label>
                <input type="password" wire:model="passWord" class="form-control {{$errors->first('passWord') ? "is-invalid" : "" }}" id="pass_word">
                @error('passWord')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            
            <button class="btn btn--theme hover--theme submit" wire:click="step1"
                type="button">Next</button>
                <div wire:loading>
                    <span> Working...</span>
                </div>
        </div>

        {{-- Step 2 --}}
        <div id="step2" style="display: {{ $currentSection != 2 ? 'none' : '' }}">
            <div class="mb-3">
                <label for="country" class="form-label">Country</label>
                <select wire:model="country" aria-label="Select a Role" data-control="select" class="form-control">
                    <option value="all">All Locations</option>
                    @foreach ( \App\Models\Country::all()  as $location )
                        <option value="{{ $location->id }}">{{ $location->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="region" class="form-label">Region</label>
                <input type="text" wire:model="region" class="form-control {{$errors->first('region') ? "is-invalid" : "" }}" id="region" aria-describedby="region">
                @error('region')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="phonenumber" class="form-label">Phone Number(include code)</label>
                <input type="number" wire:model="phonenumber" class="form-control {{$errors->first('phonenumber') ? "is-invalid" : "" }}" id="phonenumber">
                @error('phonenumber')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="messager" class="form-label">Telegram (you need this to get approved)</label>
                <input type="text" wire:model="messager" class="form-control {{$errors->first('messager') ? "is-invalid" : "" }}" id="messager" aria-describedby="messager">
                @error('messager')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button class="btn btn--theme hover--theme btn btn-danger" type="button" wire:click="back(1)">Back</button>
            <button class="btn btn--theme hover--theme btn btn-primary" type="button" wire:click="step2">Next</button>
            <div wire:loading>
                <span> Working...</span>
            </div>
        </div>

        {{-- Step 3 --}}
        <div id="step3" style="display: {{ $currentSection != 3 ? 'none' : '' }}">
            @if(!empty($incompeteMessage))
            <div class="alert alert-success">
                {{ $incompeteMessage }}
            </div>
            @endif
            <div class="col-md-12 mb-3 mt-3">
                <div class="form-data">
                    <p>Confirm that the data is correct, we will contact you via Telegram within 0 to 48 hours after you click the 'Join' button.</p>
                </div>
            </div>
           
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>Name</b>: {{$name}}</li>
                <li class="list-group-item">Email: {{ $email }}</li>
                <li class="list-group-item">Phone: {{ $phonenumber }}</li>
                <li class="list-group-item">Telegram: {{ $messager }}</li>
                <li class="list-group-item">Country: {{ $country }}</li>
                <li class="list-group-item">Region: {{ $region }}</li>
            </ul>
            <!-- Checkbox -->
            <div class="col-md-12 mb-3 mt-3">
                <div class="form-data">
                    <span>By clicking “Join”, you agree to our 
                        <a href="{{ route('tos') }}" target="_blank">Terms</a> and that you have read our
                        <a href="{{ route('privacy') }}" target="_blank"> Privacy Policy</a>
                    </span>
                </div>
            </div>
            <button class="btn btn--theme hover--theme" type="button" wire:click="back(2)">Back</button>
            <button class="btn btn--theme hover--theme" wire:click="step3" type="button">Join</button>
            <div wire:loading>
                <span> Working...</span>
            </div>
        </div>
        {{-- Step 4 --}}
        <div id="step4" style="display: {{ $currentSection != 4 ? 'none' : '' }}">
            @if(!empty($successMessage))
            <div class="alert alert-success">
                {{ $successMessage }}
            </div>
            @endif
        </div>
    </div>
</div>