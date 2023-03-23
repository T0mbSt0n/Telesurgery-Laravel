@extends('../layout/' . $layout)

@section('subhead')
    <title>Change Password - Telesurgery</title>
@endsection

@section('subcontent')
<script src="https://cdnjs.cloudflare.com/ajax/libs/mqtt/2.18.8/mqtt.min.js"></script>
<script src="{{ asset('js/mqtt.js') }}"></script>
<script src="public/script.js"></script>

    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Change Password</h2>
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
                    <a class="flex items-center text-primary font-medium mt-5" href="">
                        <i data-lucide="lock" class="w-4 h-4 mr-2"></i> Change Password
                    </a>
                    <a class="flex items-center mt-5" href="add-user">
                        <i data-lucide="user-plus" class="w-4 h-4 mr-2"></i> Add User
                    </a>
                </div>

            </div>
        </div>
        <!-- END: Profile Menu -->
        <div class="col-span-12 lg:col-span-8 2xl:col-span-9">
            <!-- BEGIN: Change Password -->
            <div class="intro-y box lg:mt-5">
                <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">Change Password</h2>
                </div>
                <form class="p-5" method="POST" action="change-pass">
                @csrf
                @method('POST')
                    <div>
                        <label for="oldPasswordInput" class="form-label">Old Password</label>
                        <input name="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" id="oldPasswordInput" placeholder="Old Password">
                            @error('old_password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                    <div class="mt-3">
                        <label for="newPasswordInput" class="form-label">New Password</label>
                        <input name="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput" placeholder="New Password">
                            @error('new_password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                    <div class="mt-3">
                        <label for="confirmNewPasswordInput" class="form-label">Confirm New Password</label>
                        <input name="new_password_confirmation" type="password" class="form-control" id="confirmNewPasswordInput" placeholder="Confirm New Password">
                    </div>
                    <div class="col-span-12">
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary w-20 mr-auto">Save</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- END: Change Password -->
        </div>
    </div>
@endsection

@section('script')
@endsection
