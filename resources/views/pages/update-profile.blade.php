@extends('../layout/' . $layout)

@section('subhead')
    <title>Profile Update - Telesurgery</title>
@endsection

@section('subcontent')
<script src="https://cdnjs.cloudflare.com/ajax/libs/mqtt/2.18.8/mqtt.min.js"></script>
<script src="{{ asset('js/mqtt.js') }}"></script>
<script src="public/script.js"></script>

<div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Update Profile</h2>
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
                    <a class="flex items-center text-primary font-medium" href="">
                        <i data-lucide="user" class="w-4 h-4 mr-2"></i> Personal Information
                    </a>
                    <a class="flex items-center mt-5" href="change-password-page">
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
            <!-- BEGIN: Display Information -->
            <div class="intro-y box lg:mt-5">
                <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">Display Information</h2>
                </div>
                <div class="p-5">
                    <div class="flex flex-col-reverse xl:flex-row flex-col">
                        <div class="flex-1 mt-6 xl:mt-0">
                            <form id=#profile class="grid grid-cols-12 gap-x-5" method="POST" action="/profile">
                            @csrf
                            @method('POST')
                                <div class="col-span-12 2xl:col-span-6">
                                    <div>
                                        <label for="name" class="form-label">Display Name</label>
                                        <input id="name" type="text" class="form-control" placeholder="Input text" value="{{ Auth::user()->name }}" disabled>
                                    </div>
                                </div>
                                <div class="col-span-12 2xl:col-span-6">
                                    <div class="mt-3 2xl:mt-0">
                                        <label for="number" class="form-label">Phone Number</label>
                                        <input id="number" type="text" name="phone_number" class="form-control" placeholder="Input text" value="{{ Auth::user()->Phone_number }}">
                                    </div>
                                </div>
                                <div class="col-span-12">
                                    <div class="mt-3">
                                        <label for="job" class="form-label">Job</label>
                                        <input id="job" type="text" name="job" class="form-control" placeholder="Input text" value="{{ Auth::user()->job }}">
                                    </div>
                                </div>
                                <div class="col-span-12">
                                    <div class="mt-3">
                                        <button type="submit" class="btn btn-primary w-20 mr-auto">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="w-52 mx-auto xl:mr-0 xl:ml-6">
                            <div class="border-2 border-dashed shadow-sm border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                <div class="h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                    <img class="rounded-md" alt="Midone - HTML Admin Template" src="{{ asset('build/assets/images/' . Auth::user()->photo) }}">
                                    <div title="Remove this profile photo?" class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2">
                                        <i data-lucide="x" class="w-4 h-4"></i>
                                    </div>
                                </div>
                                <form class="mx-auto cursor-pointer relative mt-5" method="POST" action="/profile/picture" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                    <input type="file" name="photo" id="photo" class="form-control" accept="image/*">
                                    <button type="submit" class="btn btn-primary w-full">Change Photo</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Display Information -->
            <!-- BEGIN: Personal Information -->
            <div class="intro-y box mt-5">
                <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">Personal Information</h2>
                </div>
                <div class="p-5">
                    <form id=#profile class="grid grid-cols-12 gap-x-5" method="POST" action="/profile">
                        @csrf
                        @method('POST')
                        <div class="col-span-12 xl:col-span-6">
                            <div>
                                <label for="email" class="form-label">Email</label>
                                <input id="email" type="text" class="form-control" placeholder="Input text" value="{{ Auth::user()->email }}" disabled>
                            </div>
                            <div class="mt-3">
                                <label for="name" class="form-label">Name</label>
                                <input id="name" type="text" class="form-control" placeholder="Input text" value="{{ Auth::user()->name }}" disabled>
                            </div>
                        </div>
                        <div class="col-span-12 xl:col-span-6">
                            <div class="mt-3 xl:mt-0">
                                <label for="number" class="form-label">Phone Number</label>
                                <input id="number" type="text" name="phone_number" class="form-control" placeholder="Input text" value="{{ Auth::user()->Phone_number }}">
                            </div>
                            <div class="mt-3">
                                <label for="job" class="form-label">Job</label>
                                <input id="job" type="text" name="job" class="form-control" placeholder="Input text" value="{{ Auth::user()->job }}">
                            </div>
                        </div>
                        <div class="col-span-12">
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary w-20 mr-auto">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END: Personal Information -->
        </div>
    </div>
@endsection

@section('script')
@endsection
