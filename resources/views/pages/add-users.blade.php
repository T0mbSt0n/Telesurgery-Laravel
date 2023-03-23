@extends('../layout/' . $layout)

@section('subhead')
    <title>Add User - Telesurgery</title>
@endsection

@section('subcontent')
<script src="https://cdnjs.cloudflare.com/ajax/libs/mqtt/2.18.8/mqtt.min.js"></script>
<script src="{{ asset('js/mqtt.js') }}"></script>
<script src="public/script.js"></script>

<div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Add User</h2>
    </div>
    <div class="grid grid-cols-12 gap-6">
            <!-- BEGIN: Profile Menu -->
            <div class="col-span-12 lg:col-span-4 2xl:col-span-3 flex lg:block flex-col-reverse">
            <div class="intro-y box mt-5">
                <div class="relative flex items-center p-5">
                    <div class="w-12 h-12 image-fit">
                        <img alt="Midone - HTML Admin Template" class="rounded-full" src="{{ asset('build/assets/images/' . Auth::user()->photo) }}">
                    </div>
                    <div class="ml-4 mr-auto">
                    <div class="font-medium text-base">{{ Auth::user()->name }}</div>
                        <div class="text-slate-500">{{ Auth::user()->job }}</div>
                    </div>
                </div>
                <div class="p-5 border-t border-slate-200/60 dark:border-darkmode-400">
                    <a class="flex items-center" href="update-profile-page">
                        <i data-lucide="user" class="w-4 h-4 mr-2"></i> Personal Information
                    </a>
                    <a class="flex items-center mt-5" href="">
                        <i data-lucide="lock" class="w-4 h-4 mr-2"></i> Change Password
                    </a>
                    <a class="flex items-center text-primary font-medium mt-5" href="add-user">
                        <i data-lucide="user-plus" class="w-4 h-4 mr-2"></i> Add User
                    </a>
                </div>

            </div>
        </div>
        <!-- END: Profile Menu -->
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Form Validation -->
            <div class="intro-y box">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">Put the Details Below</h2>
                </div>
                <div id="form-validation" class="p-5">
                    <div class="preview">
                        <!-- BEGIN: Validation Form -->
                        <form class="validate-form">
                            <div class="input-form">
                                <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row">
                                    Name <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, at least 2 characters</span>
                                </label>
                                <input id="validation-form-1" type="text" name="name" class="form-control" placeholder="John Legend" minlength="2" required>
                            </div>
                            <div class="input-form mt-3">
                                <label for="validation-form-2" class="form-label w-full flex flex-col sm:flex-row">
                                    Email <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, email address format</span>
                                </label>
                                <input id="validation-form-2" type="email" name="email" class="form-control" placeholder="example@gmail.com" required>
                            </div>
                            <div class="input-form mt-3">
                                <label for="validation-form-3" class="form-label w-full flex flex-col sm:flex-row">
                                    Password <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, at least 6 characters</span>
                                </label>
                                <input id="validation-form-3" type="password" name="password" class="form-control" placeholder="secret" minlength="6" required>
                            </div>
                            <div class="input-form mt-3">
                                <label for="validation-form-4" class="form-label w-full flex flex-col sm:flex-row">
                                    Age <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, integer only & maximum 3 characters</span>
                                </label>
                                <input id="validation-form-4" type="number" name="age" class="form-control" placeholder="21" required>
                            </div>
                            <div class="input-form mt-3">
                                <label for="validation-form-5" class="form-label w-full flex flex-col sm:flex-row">
                                    Profile URL <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Optional, URL format</span>
                                </label>
                                <input id="validation-form-5" type="url" name="url" class="form-control" placeholder="https://google.com">
                            </div>
                            <div class="input-form mt-3">
                                <label for="validation-form-6" class="form-label w-full flex flex-col sm:flex-row">
                                    Comment <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, at least 10 characters</span>
                                </label>
                                <textarea id="validation-form-6" class="form-control" name="comment" placeholder="Type your comments" minlength="10" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary mt-5">Register</button>
                        </form>
                        <!-- END: Validation Form -->
                        <!-- BEGIN: Success Notification Content -->
                        <div
                            id="success-notification-content"
                            class="toastify-content hidden flex"
                        >
                            <i class="text-success" data-lucide="check-circle"></i>
                            <div class="ml-4 mr-4">
                            <div class="font-medium">Registration success!</div>
                            <div class="text-slate-500 mt-1">
                                Please check your e-mail for further info!
                            </div>
                            </div>
                        </div>
                        <!-- END: Success Notification Content -->
                        <!-- BEGIN: Failed Notification Content -->
                        <div
                            id="failed-notification-content"
                            class="toastify-content hidden flex"
                        >
                            <i class="text-danger" data-lucide="x-circle"></i>
                            <div class="ml-4 mr-4">
                            <div class="font-medium">Registration failed!</div>
                            <div class="text-slate-500 mt-1">
                                Please check the fileld form.
                            </div>
                            </div>
                        </div>
                        <!-- END: Failed Notification Content -->
                    </div>
                    <div class="source-code hidden">
                        <button data-target="#copy-form-validation" class="copy-code btn py-1 px-2 btn-outline-secondary">
                            <i data-lucide="file" class="w-4 h-4 mr-2"></i> Copy example code
                        </button>
                        <div class="overflow-y-auto mt-3 rounded-md">
                            <pre id="copy-form-validation" class="source-preview">
                                <code class="html">
                                    {{ str_replace('>', 'HTMLCloseTag', str_replace('<', 'HTMLOpenTag', '
                                        <!-- BEGIN: Validation Form -->
                                        <form class="validate-form">
                                            <div class="input-form">
                                                <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row">
                                                    Name <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, at least 2 characters</span>
                                                </label>
                                                <input id="validation-form-1" type="text" name="name" class="form-control" placeholder="John Legend" minlength="2" required>
                                            </div>
                                            <div class="input-form mt-3">
                                                <label for="validation-form-2" class="form-label w-full flex flex-col sm:flex-row">
                                                    Email <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, email address format</span>
                                                </label>
                                                <input id="validation-form-2" type="email" name="email" class="form-control" placeholder="example@gmail.com" required>
                                            </div>
                                            <div class="input-form mt-3">
                                                <label for="validation-form-3" class="form-label w-full flex flex-col sm:flex-row">
                                                    Password <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, at least 6 characters</span>
                                                </label>
                                                <input id="validation-form-3" type="password" name="password" class="form-control" placeholder="secret" minlength="6" required>
                                            </div>
                                            <div class="input-form mt-3">
                                                <label for="validation-form-4" class="form-label w-full flex flex-col sm:flex-row">
                                                    Age <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, integer only & maximum 3 characters</span>
                                                </label>
                                                <input id="validation-form-4" type="number" name="age" class="form-control" placeholder="21" required>
                                            </div>
                                            <div class="input-form mt-3">
                                                <label for="validation-form-5" class="form-label w-full flex flex-col sm:flex-row">
                                                    Profile URL <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Optional, URL format</span>
                                                </label>
                                                <input id="validation-form-5" type="url" name="url" class="form-control" placeholder="https://google.com">
                                            </div>
                                            <div class="input-form mt-3">
                                                <label for="validation-form-6" class="form-label w-full flex flex-col sm:flex-row">
                                                    Comment <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, at least 10 characters</span>
                                                </label>
                                                <textarea id="validation-form-6" class="form-control" name="comment" placeholder="Type your comments" minlength="10" required></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary mt-5">Register</button>
                                        </form>
                                        <!-- END: Validation Form -->
                                        <!-- BEGIN: Success Notification Content -->
                                        <div
                                            id="success-notification-content"
                                            class="toastify-content hidden flex"
                                        >
                                            <i class="text-success" data-lucide="check-circle"></i>
                                            <div class="ml-4 mr-4">
                                            <div class="font-medium">Registration success!</div>
                                            <div class="text-slate-500 mt-1">
                                                Please check your e-mail for further info!
                                            </div>
                                            </div>
                                        </div>
                                        <!-- END: Success Notification Content -->
                                        <!-- BEGIN: Failed Notification Content -->
                                        <div
                                            id="failed-notification-content"
                                            class="toastify-content hidden flex"
                                        >
                                            <i class="text-danger" data-lucide="x-circle"></i>
                                            <div class="ml-4 mr-4">
                                            <div class="font-medium">Registration failed!</div>
                                            <div class="text-slate-500 mt-1">
                                                Please check the fileld form.
                                            </div>
                                            </div>
                                        </div>
                                        <!-- END: Failed Notification Content -->
                                    ')) }}
                                </code>
                            </pre>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Form Validation -->
        </div>
    </div>
@endsection

@section('script')
@endsection
