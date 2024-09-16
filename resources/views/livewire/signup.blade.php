<div class="relative">
    <div class="bg-blue-100 rounded min-h-screen flex items-center justify-center flex-col">
        <div class="w-5/12">
            <div class="p-16 bg-white rounded-lg shadow-xl">
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
                    <div class="flex justify-content items-center">
                        <div class="flex-1">
                            <div class="flex items-center">
                                <input id="terms-of-service" type="checkbox" name="terms_of_service"
                                       class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-0"
                                >
                                <label for="terms-of-service" class="ms-2 text-sm font-medium text-slate-500">
                                    I agree to the <button type="button" class="underline text-blue-500 hover:text-blue-600">terms of service.</button>
                                </label>
                            </div>
                        </div>
                        <button type="submit"
                                class="relative px-6 py-3 text-center font-bold rounded-lg border border-transparent bg-blue-400 text-blue-800 hover:bg-blue-300 focus:outline-none disabled:opacity-75 disabled:cursor-not-allowed">
                            Sign up
                            <div wire:loading.flex wire:target="save"
                                 class="flex items-center absolute top-0 right-0 bottom-0">
                                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                                     xmlns="http://www.w3.org/2000/svg"
                                     fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                            stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                          d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                            </div>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
