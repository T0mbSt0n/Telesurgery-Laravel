@extends('../layout/' . $layout)

@section('subhead')
    <title>Add User - Telesurgery</title>
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
                    <a class="flex items-center mt-5" href="change-password-page">
                        <i data-lucide="lock" class="w-4 h-4 mr-2"></i> Change Password
                    </a>
                    <a class="flex items-center text-primary font-medium mt-5" href="">
                        <i data-lucide="user-plus" class="w-4 h-4 mr-2"></i> Add User
                    </a>
                </div>

            </div>
        </div>
        <!-- END: Profile Menu -->
        <div class="col-span-12 lg:col-span-8 2xl:col-span-9">
            <!-- BEGIN: add user -->
            <div class="intro-y box lg:mt-5">
                <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">Change Password</h2>
                </div>
                <form class="p-5" method="POST" action="addnew">
                @csrf
                @method('POST')
                <div>
                    <label for="nameInput" class="form-label">Name</label>
                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="nameInput" placeholder="Name">
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-3">
                    <label for="emailInput" class="form-label">Email</label>
                    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="emailInput" placeholder="Email">
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-3">
                    <label for="passwordInput" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="passwordInput" placeholder="Password">
                    @error('password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-3">
                    <label for="confirmPasswordInput" class="form-label">Confirm Password</label>
                    <input name="password_confirmation" type="password" class="form-control" id="confirmPasswordInput" placeholder="Confirm Password">
                </div>
                <div class="mt-3">
                    <label for="roleSelect" class="form-label">Role</label>
                    <select name="role" id="roleSelect" class="tom-select w-full @error('role') is-invalid @enderror">
                        <option value="" disabled selected>Select a role</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                    @error('role')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                    <div class="col-span-12">
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary w-20 mr-auto">Add User</button>
                        </div>
                    </div>
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if(session('failure'))
                        <div class="alert alert-danger">{{ session('failure') }}</div>
                    @endif
                </form>
            </div>
            <!-- END: add user -->
        </div>
    </div>
@endsection

@section('script')
@endsection
