<div class="relative">
    <div class="absolute top-4 right-4">
        <div
            class="relative py-5 px-10 border-2 border-l-8 border-l-green-700 border-green-500 bg-green-200 text-green-600 rounded-lg"
            x-cloak
            x-show="$wire.showSuccessIndicator"
            x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
            x-transition:enter-start="-translate-y-32"
            x-transition:enter-end="translate-y-0"
            x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
            x-transition:leave-start="translate-y-0"
            x-transition:leave-end="-translate-y-32"
            x-effect="if($wire.showSuccessIndicator) setTimeout(() => $wire.showSuccessIndicator = false, 3000)"
        >
            <p
                class="text-center font-medium ">
                Profile updated successfully.
            </p>
            <button
                class="absolute top-2 right-2 text-green-700 hover:text-green-900"
                x-on:click="$wire.showSuccessIndicator = false"
            >
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-4 h-4">
                    <path
                        d="M6.2253 4.81108C5.83477 4.42056 5.20161 4.42056 4.81108 4.81108C4.42056 5.20161 4.42056 5.83477 4.81108 6.2253L10.5858 12L4.81114 17.7747C4.42062 18.1652 4.42062 18.7984 4.81114 19.1889C5.20167 19.5794 5.83483 19.5794 6.22535 19.1889L12 13.4142L17.7747 19.1889C18.1652 19.5794 18.7984 19.5794 19.1889 19.1889C19.5794 18.7984 19.5794 18.1652 19.1889 17.7747L13.4142 12L19.189 6.2253C19.5795 5.83477 19.5795 5.20161 19.189 4.81108C18.7985 4.42056 18.1653 4.42056 17.7748 4.81108L12 10.5858L6.2253 4.81108Z"
                        fill="currentColor"/>
                </svg>
            </button>
        </div>
    </div>
    <div class="bg-blue-100 rounded min-h-screen flex items-center justify-center flex-col">
        <div class="p-2 w-full md:w-5/12">
            <div class="p-4 md:p-16 bg-white rounded-lg shadow-xl">
                <h1 class="text-2xl mb-8 text-center font-bold">Update Your Profile..</h1>
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
                        <label for="bio" class="block text-sm font-medium mb-2">Bio</label>
                        <textarea id="bio"
                                  @class([
                                        'py-3 px-4 block w-full border rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500',
                                        'border-slate-300' => $errors->missing('form.bio'),
                                        'border-red-500' => $errors->has('form.bio'),
                                    ])
                                  name="Bio"
                                  maxlength="200"
                                  rows="4" placeholder="A little bit about yourself..."
                                  wire:model.blur="form.bio"
                        ></textarea>
                        @error('form.bio')
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
                                wire:model.blur="form.country"
                        >
                            <option value="" selected disabled>Choose your country</option>
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
                                    @checked($form->receive_emails)
                                >
                                <label for="yes-receive-emails"
                                       class="ms-2 text-sm font-medium text-slate-500">Yes</label>
                            </div>
                            <div class="flex items-center">
                                <input id="no-receive-emails" type="radio" value="false" name="receive-emails"
                                       class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-0"
                                       wire:model.boolean="form.receive_emails"
                                    @checked(!$form->receive_emails)
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
                    <div class="w-full">
                        <button type="submit"
                                class="relative w-full py-3 text-center text-sm font-medium rounded-lg border border-transparent bg-blue-400 text-blue-800 hover:bg-blue-300 focus:outline-none disabled:opacity-75 disabled:cursor-not-allowed">
                            Update
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
