<div class="relative">
    <div class="bg-blue-100 rounded min-h-screen flex items-center justify-center flex-col">
        <div class="w-full p-2 md:w-5/12">
            <div class="p-4 md:p-16 bg-white rounded-lg shadow-xl">
                <h1 class="text-3xl mb-8 text-center font-bold">Sign up</h1>
                <form action="" method="post" class="space-y-6" wire:submit.prevent="save">
                    <div>
                        <label for="username" class="block text-sm font-medium mb-2">Username <span
                                class="text-red-400 font-bold">*</span></label>
                        <input type="text" id="username" name="username"
                               @class([
                                        'py-3 px-4 block w-full border rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500',
                                        'border-slate-300' => $errors->missing('form.username'),
                                        'border-red-500' => $errors->has('form.username'),
                                    ])
                               placeholder="Enter Username"
                               wire:model.blur="form.username"
                        >
                        @error('form.username')
                        <em class="py-1 px-2 text-sm text-red-400 font-bold">{{ $message }}</em>
                        @enderror
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium mb-2">Password <span
                                    class="text-red-400 font-bold">*</span></label>
                        <input type="password" id="password" name="password"
                               @class([
                                        'py-3 px-4 block w-full border rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500',
                                        'border-slate-300' => $errors->missing('form.password'),
                                        'border-red-500' => $errors->has('form.password'),
                                    ])
                               placeholder="Enter Password"
                               wire:model.blur="form.password"
                        >
                        @error('form.password')
                        <em class="py-1 px-2 text-sm text-red-400 font-bold">{{ $message }}</em>
                        @enderror
                    </div>
                    <div>

                        <label for="country" class="block text-sm font-medium mb-2">Country <span
                                    class="text-red-400 font-bold">*</span></label>
                        <select id="country" name="country"
                                @class([
                                         'py-3 px-4 block w-full border rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500',
                                         'border-slate-300' => $errors->missing('form.country'),
                                         'border-red-500' => $errors->has('form.country'),
                                     ])
                                wire:model.live="form.country"
                        >

                            <option value="" selected @disabled(isset($form->country))>Choose your country</option>
                            @foreach(\App\Enums\Country::cases() as $country)
                                <option value="{{$country->value}}">{{$country->label()}}</option>
                            @endforeach
                        </select>
                        @error('form.country')
                        <em class="py-1 px-2 text-sm text-red-400 font-bold">{{ $message }}</em>
                        @enderror
                    </div>
                    <fieldset>
                        <legend class="block text-sm font-medium mb-2">Receive Emails?</legend>
                        <div class="flex items-center space-x-6">
                            <div class="flex items-center">
                                <input id="yes-receive-emails" type="radio" value="true" name="receive-emails"
                                       class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-0"
                                       wire:model.boolean="form.receive_emails"
                                >
                                <label for="yes-receive-emails"
                                       class="ms-2 text-sm font-medium text-slate-500">Yes</label>
                            </div>
                            <div class="flex items-center">
                                <input id="no-receive-emails" type="radio" value="false" name="receive-emails"
                                       class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-0"
                                       wire:model.boolean="form.receive_emails"
                                >
                                <label for="no-receive-emails"
                                       class="ms-2 text-sm font-medium text-slate-500">No</label>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset x-show="$wire.form.receive_emails">
                        <legend class="block text-sm font-medium mb-2">Receive Type</legend>
                        <div class="flex flex-col space-y-1">
                            <div class="flex items-center">
                                <input id="general-updates" type="checkbox" name="receive_updates"
                                       class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-0"
                                       wire:model="form.receive_updates"
                                >
                                <label for="general-updates" class="ms-2 text-sm font-medium text-slate-500">General
                                    Updates</label>
                            </div>
                            <div class="flex items-center">
                                <input id="marketing-offers" type="checkbox" name="receive_offers"
                                       class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-0"
                                       wire:model="form.receive_offers"
                                >
                                <label for="marketing-offers" class="ms-2 text-sm font-medium text-slate-500">Marketing
                                    Offers</label>
                            </div>
                        </div>
                    </fieldset>
                    <div class="flex md:justify-between md:items-center flex-col md:flex-row md:pt-4">
                        <div class="flex justify-start items-center gap-2 text-sm mb-4">
                            <input type="checkbox" class="border focus:ring-0">

                            <span>I agree to the</span>

                            <x-dialog wire:model="showModal">
                                <x-dialog.open>
                                    <button type="button" class="underline text-blue-500">
                                        terms of service.
                                    </button>
                                </x-dialog.open>

                                <x-dialog.panel>
                                    <h2 class="text-2xl font-bold text-slate-900">Terms Of Service</h2>

                                    <div class="mt-5 text-gray-600">
                                        <h3 class="font-bold text-lg text-slate-800 mt-4">Acceptance of Terms</h3>
                                        <p class="mt-2">By signing up for and using this sweet app, you agree to be bound by these Terms of Service ("Terms"). If you do not agree with these Terms, please do not use the Service.</p>

                                        <h3 class="font-bold text-lg text-slate-800 mt-4">Changes to Terms</h3>
                                        <p class="mt-2">We reserve the right to update and change the Terms at any time without notice. Continued use of the Service after any changes shall constitute your consent to such changes.</p>

                                        <h3 class="font-bold text-lg text-slate-800 mt-4">Use of the Service</h3>
                                        <p class="mt-2">You must provide accurate and complete registration information when you sign up. You are responsible for maintaining the confidentiality of your password and are solely responsible for all activities resulting from its use.</p>

                                        <h3 class="font-bold text-lg text-slate-800 mt-4">User Content</h3>
                                        <p class="mt-2">You are responsible for all content and data you provide or upload to the Service. We reserve the right to remove content deemed offensive, illegal, or in violation of these Terms or any other policy.</p>

                                        <h3 class="font-bold text-lg text-slate-800 mt-4">Limitation of Liability</h3>
                                        <p class="mt-2">The Service is provided "as is". We make no warranties, expressed or implied, and hereby disclaim all warranties, including without limitation, implied warranties of merchantability, fitness for a particular purpose, or non-infringement.</p>

                                        <h3 class="font-bold text-lg text-slate-800 mt-4">Termination</h3>
                                        <p class="mt-2">We reserve the right to suspend or terminate your account at any time for any reason, with or without notice.</p>

                                        <h3 class="font-bold text-lg text-slate-800 mt-4">Governing Law</h3>
                                        <p class="mt-2">These Terms shall be governed by the laws of the land of fairy tale creatures, without respect to its conflict of laws principles.</p>

                                        <h3 class="font-bold text-lg text-slate-800 mt-4">Miscellaneous</h3>
                                        <p class="mt-2">If any provision of these Terms is deemed invalid or unenforceable, the remaining provisions shall remain in effect.</p>

                                        <h3 class="font-bold text-lg text-slate-800 mt-4">Contact</h3>
                                        <p class="mt-2">For any questions regarding these Terms, please contact us at dontcontactus@ever.com.</p>
                                    </div>
                                </x-dialog.panel>
                            </x-dialog>
                        </div>

                        <button class="w-full md:w-1/3 lg:w-1/2 text-center rounded-xl bg-blue-500 text-white px-3 py-2 font-medium">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
