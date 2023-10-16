<div class="m-auto w-full max-w-6xl rounded-md bg-white p-6 shadow-md dark:bg-slate-900 dark:shadow-gray-800">

    <a href="{{ route('homepage') }}">
        <img src="{{ asset('storage/' . get_static_option('logo')) }}" class="mx-auto h-20" />
    </a>

    <x-errors />

    <h5 class="my-6 text-2xl font-semibold">{{ __('Registeration Form') }}</h5>

    <form wire:submit.prevent='submit'>
        @csrf
        <div class="mb-2 grid grid-cols-3 gap-2">
            <div
                class="col-span-2 grid grid-flow-col auto-rows-auto grid-rows-5 gap-2 border-r-2 border-r-gray-200 pr-4">
                <h1 class="text-lg font-semibold">{{ __('Company Details') }}</h1>

                <div>
                    <label class="font-semibold">{{ __('City:') }}
                        <div class="relative mt-2">
                            <input wire:model.defer='city' name="city" type="text"
                                class="form-input text-sm font-normal" placeholder="City :">
                        </div>
                    </label>
                </div>
                <div>
                    <label class="font-semibold">{{ __('State:') }}
                        <div class="relative mt-2">
                            <input wire:model.defer='state' name="state" type="text"
                                class="form-input text-sm font-normal" placeholder="State/Region/Province :">
                        </div>
                    </label>
                </div>
                <div>
                    <label class="font-semibold">{{ __('Country:') }}
                        <div class="relative mt-2">
                            <select wire:model.defer='country' name="country" class="form-input text-sm font-normal"
                                placeholder="Name :">
                                <option hidden selected>{{ __('Please Select') }}</option>
                                @foreach ($countries as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                    </label>
                </div>

                <div>
                    <label class="font-semibold">{{ __('Trade Licence Number:') }}
                        <div class="relative mt-2">
                            <input wire:model.defer='tln' name="tln" type="text"
                                class="form-input text-sm font-normal" placeholder="Trade Licence Number :">
                        </div>
                    </label>
                </div>
                <div>
                    <label class="font-semibold">{{ __('Date of Establishment:') }}
                        <div class="relative mt-2">
                            <input wire:model.defer='doe' name="doe" type="date"
                                class="form-input text-sm font-normal">
                        </div>
                    </label>
                </div>
                <div>
                    <label class="font-semibold">{{ __('Type of Company:') }}
                        <div class="relative mt-2">
                            <input wire:model.defer='toc' name="toc" type="text"
                                class="form-input text-sm font-normal" placeholder="Type of Company :">
                        </div>
                    </label>
                </div>
                <div>
                    <label class="font-semibold">{{ __('Type of Business:') }}
                        <div class="relative mt-2">
                            <select wire:model.defer='tob' name="tob" class="form-input text-sm font-normal">
                                <option hidden selected>Please Select</option>
                                @foreach (['Vendor', 'Service Provider'] as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                    </label>
                </div>
            </div>

            <div class="ml-2 grid grid-cols-1 gap-2">
                <h1 class="text-lg font-semibold">{{ __('Authorized Contact Details') }}</h1>
                <div>
                    <label class="font-semibold">{{ __('Name:') }}
                        <div class="form-icon relative mt-2">
                            <i data-feather="user" class="absolute left-4 top-3 h-4 w-4"></i>
                            <input wire:model.defer='name' name="name" type="text"
                                class="form-input pl-11 text-sm font-normal" placeholder="Name :">
                        </div>
                    </label>
                </div>
                <div>
                    <label class="font-semibold">{{ __('Contact Number:') }}
                        <div class="form-icon relative mt-2">
                            <i data-feather="phone" class="absolute left-4 top-3 h-4 w-4"></i>
                            <input wire:model.defer='contact_no' name="contact_no" type="number"
                                class="form-input pl-11 text-sm font-normal" placeholder="Contact Number :">
                        </div>
                    </label>
                </div>
                <div>
                    <label class="font-semibold">{{ __('Business Mail:') }}
                        <div class="form-icon relative mt-2">
                            <i data-feather="mail" class="absolute left-4 top-3 h-4 w-4"></i>
                            <input wire:model.defer='email' name="email" type="mail"
                                class="form-input pl-11 text-sm font-normal" placeholder="Business Email :">
                        </div>
                    </label>
                </div>
                <div>
                    <label class="font-semibold">{{ __('Job Title:') }}
                        <div class="form-icon relative mt-2">
                            <i data-feather="award" class="absolute left-4 top-3 h-4 w-4"></i>
                            <input wire:model.defer='job_title' name="job_title" type="text"
                                class="form-input pl-11 text-sm font-normal" placeholder="Job Title :">
                        </div>
                    </label>
                </div>
            </div>
        </div>

        <x-checkbox wire:model.defer='agree'
            label="A representative of Kasper may contact me based on the information I've provided above. I have read, understood and agree to the terms of use, privacy policy available on the website to become a supplier on the marketplace." />

        <div class="mt-4 flex items-center justify-end">
            <a class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 dark:text-gray-400 dark:hover:text-gray-100 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <button type="submit"
                class="btn ml-4 rounded-md border-blue-600 bg-blue-600 text-white hover:border-blue-700 hover:bg-blue-700">
                {{ __('Register') }}</button>
        </div>
    </form>
</div>
