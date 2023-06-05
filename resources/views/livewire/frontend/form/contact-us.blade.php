<div class="mt-8 md:col-span-6 md:mt-0 lg:col-span-5">
    <div class="lg:ml-5">
        <div class="rounded-md bg-white p-6 shadow dark:bg-slate-900 dark:shadow-gray-800">
            <h3 class="text-2xl font-medium leading-normal">Get in touch !</h3>
            <p class="mb-6 mt-2 text-sm">Please enter the form below for any help! </p>
            @if ($successMessage)
                <div class="mb-4 rounded-b border-t-4 border-teal-500 bg-teal-100 px-4 py-3 text-teal-900 shadow-md"
                    role="alert">
                    <div class="flex">
                        <div class="py-1"><svg class="mr-4 h-6 w-6 fill-current text-teal-500"
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
                            <div class="form-icon relative mt-2">
                                <i data-feather="user" class="absolute left-4 top-3 h-4 w-4"></i>
                                <input name="name" type="text" wire:model.defer='name'
                                    class="form-input pl-11 text-sm font-normal" placeholder="Name :">
                            </div>
                        </label>
                    </div>
                    <div class="text-left">
                        <label class="font-semibold">Your Contact Number:
                            <div class="form-icon relative mt-2">
                                <i data-feather="phone" class="absolute left-4 top-3 h-4 w-4"></i>
                                <input name="contact_no" type="number" wire:model.defer='contact_no'
                                    class="form-input pl-11 text-sm font-normal" placeholder="Name :">
                            </div>
                        </label>
                    </div>
                    <div class="text-left">
                        <label class="font-semibold">Business Mail:
                            <div class="form-icon relative mt-2">
                                <i data-feather="mail" class="absolute left-4 top-3 h-4 w-4"></i>
                                <input name="email" type="mail" wire:model.defer='email'
                                    class="form-input pl-11 text-sm font-normal" placeholder="Name :">
                            </div>
                        </label>
                    </div>
                    <div class="text-left">
                        <label class="font-semibold">Company Name:
                            <div class="form-icon relative mt-2">
                                <i data-feather="activity" class="absolute left-4 top-3 h-4 w-4"></i>
                                <input name="company_name" type="text" wire:model.defer='company_name'
                                    class="form-input pl-11 text-sm font-normal" placeholder="Name :">
                            </div>
                        </label>
                    </div>
                    <div class="text-left">
                        <label class="font-semibold">Job Title:
                            <div class="form-icon relative mt-2">
                                <i data-feather="award" class="absolute left-4 top-3 h-4 w-4"></i>
                                <input name="job_title" type="text" wire:model.defer='job_title'
                                    class="form-input pl-11 text-sm font-normal" placeholder="Name :">
                            </div>
                        </label>
                    </div>
                    <div class="text-left">
                        <label class="font-semibold">Type of Business:
                            <div class="form-icon relative mt-2">
                                <i data-feather="list" class="absolute left-4 top-3 h-4 w-4"></i>
                                <select name="tob" wire:model.defer='tob'
                                    class="form-input pl-11 text-sm font-normal" placeholder="Name :">
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
                            <div class="form-icon relative mt-2">
                                <i data-feather="message-circle" class="absolute left-4 top-3 h-4 w-4"></i>
                                <textarea name="message" id="comments" wire:model.defer='message' class="form-input h-28 pl-11 text-sm font-normal"
                                    placeholder="Message :"></textarea>
                            </div>
                        </div>
                    </div>
                    <x-checkbox id="right-label"
                        label="A representative of Kasper may contact me based on the information I've provided above. I agree to the terms of the use and privacy policy."
                        wire:model.defer="agree" />
                </div>
                <button type="submit"
                    class="btn mt-4 flex items-center justify-center rounded-md border-blue-600 bg-blue-600 text-white hover:border-blue-700 hover:bg-blue-700">Send
                    Message</button>
            </form>
        </div>
    </div>
</div>
