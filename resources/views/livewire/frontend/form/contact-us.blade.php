<div class="mt-8 lg:col-span-5 md:col-span-6 md:mt-0">
    <div class="lg:ml-5">
        <div class="p-6 bg-white rounded-md shadow dark:bg-slate-900 dark:shadow-gray-800">
            <h3 class="text-2xl font-medium leading-normal">Get in touch !</h3>
            <p class="mt-2 mb-6 text-sm">Please enter the form below for any help! </p>
            @if ($successMessage)
                <div class="px-4 py-3 mb-4 text-teal-900 bg-teal-100 border-t-4 border-teal-500 rounded-b shadow-md"
                    role="alert">
                    <div class="flex">
                        <div class="py-1"><svg class="w-6 h-6 mr-4 text-teal-500 fill-current"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path
                                    d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                            </svg></div>
                        <div>
                            <p class="font-bold">Thanks for reaching out</p>
                            <p class="text-sm">We will contact you ASAP!</p>
                        </div>
                    </div>
                </div>
            @endif
            <x-errors />
            <form wire:submit.prevent='submit'>
                <div class="grid grid-cols-2 gap-2">
                    <div class="text-left">
                        <label class="font-semibold">Your Name:
                            <div class="relative mt-2 form-icon">
                                <i data-feather="user" class="absolute w-4 h-4 top-3 left-4"></i>
                                <input name="name" type="text" wire:model.defer='name'
                                    class="text-sm font-normal form-input pl-11" placeholder="Name :">
                            </div>
                        </label>
                    </div>
                    <div class="text-left">
                        <label class="font-semibold">Your Contact Number:
                            <div class="relative mt-2 form-icon">
                                <i data-feather="phone" class="absolute w-4 h-4 top-3 left-4"></i>
                                <input name="contact_no" type="number" wire:model.defer='contact_no'
                                    class="text-sm font-normal form-input pl-11" placeholder="Name :">
                            </div>
                        </label>
                    </div>
                    <div class="text-left">
                        <label class="font-semibold">Business Mail:
                            <div class="relative mt-2 form-icon">
                                <i data-feather="mail" class="absolute w-4 h-4 top-3 left-4"></i>
                                <input name="email" type="mail" wire:model.defer='email'
                                    class="text-sm font-normal form-input pl-11" placeholder="Name :">
                            </div>
                        </label>
                    </div>
                    <div class="text-left">
                        <label class="font-semibold">Company Name:
                            <div class="relative mt-2 form-icon">
                                <i data-feather="activity" class="absolute w-4 h-4 top-3 left-4"></i>
                                <input name="company_name" type="text" wire:model.defer='company_name'
                                    class="text-sm font-normal form-input pl-11" placeholder="Name :">
                            </div>
                        </label>
                    </div>
                    <div class="text-left">
                        <label class="font-semibold">Job Title:
                            <div class="relative mt-2 form-icon">
                                <i data-feather="award" class="absolute w-4 h-4 top-3 left-4"></i>
                                <input name="job_title" type="text" wire:model.defer='job_title'
                                    class="text-sm font-normal form-input pl-11" placeholder="Name :">
                            </div>
                        </label>
                    </div>
                    <div class="text-left">
                        <label class="font-semibold">Type of Business:
                            <div class="relative mt-2 form-icon">
                                <i data-feather="list" class="absolute w-4 h-4 top-3 left-4"></i>
                                <select name="tob" wire:model.defer='tob'
                                    class="text-sm font-normal form-input pl-11" placeholder="Name :">
                                    <option hidden selected>Please Select</option>
                                    @foreach (['Manufacturer', 'Supplier', 'Contractor', 'Subcontractor', 'Consultant', 'Developer'] as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="mt-2 space-y-2">
                    <div class="mb-5">
                        <div class="text-left">
                            <label class="font-semibold">Your Comment:</label>
                            <div class="relative mt-2 form-icon">
                                <i data-feather="message-circle" class="absolute w-4 h-4 top-3 left-4"></i>
                                <textarea name="message" id="comments" wire:model.defer='message' class="text-sm font-normal form-input pl-11 h-28"
                                    placeholder="Message :"></textarea>
                            </div>
                        </div>
                    </div>
                    <x-checkbox id="right-label"
                        label="A representative of Kasper may contact me based on the information I've provided above. I agree to the terms of the use and privacy policy."
                        wire:model.defer="agree" />
                </div>
                <button type="submit"
                    class="flex items-center justify-center mt-4 text-white bg-indigo-600 border-indigo-600 rounded-md btn hover:bg-indigo-700 hover:border-indigo-700">Send
                    Message</button>
            </form>
        </div>
    </div>
</div>
