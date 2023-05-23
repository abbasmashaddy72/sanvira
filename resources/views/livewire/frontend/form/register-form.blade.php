<div class="w-full max-w-6xl p-6 m-auto bg-white rounded-md shadow-md dark:bg-slate-900 dark:shadow-gray-800">

    <a href="{{ route('homepage') }}">
        <img src="{{ asset('storage/' . get_static_option('logo')) }}" class="h-20 mx-auto" />
    </a>

    <x-errors />

    <h5 class="my-6 text-2xl font-semibold">{{ __('Registeration Form') }}</h5>

    <form wire:submit.prevent='submit'>
        @csrf
        <div class="grid grid-cols-3 gap-2 mb-2">
            <div
                class="grid grid-flow-col col-span-2 grid-rows-5 gap-2 pr-4 border-r-2 border-r-gray-200 auto-rows-auto">
                <h1 class="text-lg font-semibold">Company Details</h1>
                <div>
                    <label class="font-semibold">Supplier Name:
                        <div class="relative mt-2">
                            <input wire:model.defer='supplier_name' name="supplier_name" type="text" autofocus
                                class="text-sm font-normal form-input" placeholder="Name :">
                        </div>
                    </label>
                </div>
                <div>
                    <label class="font-semibold">Supplier Address:
                        <div class="relative mt-2">
                            <textarea wire:model.defer='supplier_address' name="supplier_address" id="comments"
                                class="text-sm font-normal form-input" placeholder="Address :"></textarea>
                        </div>
                    </label>
                </div>
                <div>
                    <label class="font-semibold">City:
                        <div class="relative mt-2">
                            <input wire:model.defer='city' name="city" type="text"
                                class="text-sm font-normal form-input" placeholder="City :">
                        </div>
                    </label>
                </div>
                <div>
                    <label class="font-semibold">State:
                        <div class="relative mt-2">
                            <input wire:model.defer='state' name="state" type="text"
                                class="text-sm font-normal form-input" placeholder="State/Region/Province :">
                        </div>
                    </label>
                </div>
                <div>
                    <label class="font-semibold">Country:
                        <div class="relative mt-2">
                            <select wire:model.defer='country' name="country" class="text-sm font-normal form-input"
                                placeholder="Name :">
                                <option hidden selected>Please Select</option>
                                @foreach ($countries as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                    </label>
                </div>

                <div>
                    <label class="font-semibold">Trade Licence Number:
                        <div class="relative mt-2">
                            <input wire:model.defer='tln' name="tln" type="text"
                                class="text-sm font-normal form-input" placeholder="Trade Licence Number :">
                        </div>
                    </label>
                </div>
                <div>
                    <label class="font-semibold">Date of Establishment:
                        <div class="relative mt-2">
                            <input wire:model.defer='doe' name="doe" type="date"
                                class="text-sm font-normal form-input">
                        </div>
                    </label>
                </div>
                <div>
                    <label class="font-semibold">Type of Company:
                        <div class="relative mt-2">
                            <input wire:model.defer='toc' name="toc" type="text"
                                class="text-sm font-normal form-input" placeholder="Type of Company :">
                        </div>
                    </label>
                </div>
                <div>
                    <label class="font-semibold">Type of Business:
                        <div class="relative mt-2">
                            <select wire:model.defer='tob' name="tob" class="text-sm font-normal form-input">
                                <option hidden selected>Please Select</option>
                                @foreach (['Manufacturer', 'Supplier', 'Contractor', 'Service Provider'] as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                    </label>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-2 ml-2">
                <h1 class="text-lg font-semibold">Authorized Contact Details</h1>
                <div>
                    <label class="font-semibold">Name:
                        <div class="relative mt-2 form-icon">
                            <i data-feather="user" class="absolute w-4 h-4 top-3 left-4"></i>
                            <input wire:model.defer='name' name="name" type="text"
                                class="text-sm font-normal form-input pl-11" placeholder="Name :">
                        </div>
                    </label>
                </div>
                <div>
                    <label class="font-semibold">Contact Number:
                        <div class="relative mt-2 form-icon">
                            <i data-feather="phone" class="absolute w-4 h-4 top-3 left-4"></i>
                            <input wire:model.defer='contact_no' name="contact_no" type="number"
                                class="text-sm font-normal form-input pl-11" placeholder="Contact Number :">
                        </div>
                    </label>
                </div>
                <div>
                    <label class="font-semibold">Business Mail:
                        <div class="relative mt-2 form-icon">
                            <i data-feather="mail" class="absolute w-4 h-4 top-3 left-4"></i>
                            <input wire:model.defer='email' name="email" type="mail"
                                class="text-sm font-normal form-input pl-11" placeholder="Business Email :">
                        </div>
                    </label>
                </div>
                <div>
                    <label class="font-semibold">Job Title:
                        <div class="relative mt-2 form-icon">
                            <i data-feather="award" class="absolute w-4 h-4 top-3 left-4"></i>
                            <input wire:model.defer='job_title' name="job_title" type="text"
                                class="text-sm font-normal form-input pl-11" placeholder="Job Title :">
                        </div>
                    </label>
                </div>
            </div>
        </div>

        <x-checkbox wire:model.defer='agree'
            label="A representative of Kasper may contact me based on the information I've provided above. I have read, understood and agree to the terms of use, privacy policy available on the website to become a supplier on the marketplace." />

        <div class="flex items-center justify-end mt-4">
            <a class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-600 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <button type="submit"
                class="ml-4 text-white bg-blue-600 border-blue-600 rounded-md btn hover:bg-blue-700 hover:border-blue-700">
                {{ __('Register') }}</button>
        </div>
    </form>
</div>
