@extends('../layout/' . $layout)

@section('subhead')
    <title>Profile Update - Telesurgery</title>
@endsection

@section('subcontent')
<script src="https://cdnjs.cloudflare.com/ajax/libs/mqtt/2.18.8/mqtt.min.js"></script>
<script src="{{ asset('js/mqtt.js') }}"></script>
<script src="public/script.js"></script>
<script src="{{ asset('js/toastify/toastify.min.js') }}"></script>

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
                                        <button id="success-notification-toggle" type="submit" class="btn btn-primary w-20 mr-auto">Save</button>
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
                                    <button id="success-notification-toggle" type="submit" class="btn btn-primary w-full">Change Photo</button>
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
                                <button id= "success-notification-toggle" type="submit" class="btn btn-primary w-20 mr-auto">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END: Personal Information -->
                        <!-- BEGIN: Success Notification Content -->
                        <div
                            id="success-notification-content"
                            class="toastify-content hidden flex"
                        >
                            <i class="text-success" data-lucide="check-circle"></i>
                            <div class="ml-4 mr-4">
                            <div class="font-medium">Profile Updated!</div>
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
                            <div class="font-medium">Profile Update failed!</div>
                            <div class="text-slate-500 mt-1">
                                Please check the fileld form.
                            </div>
                            </div>
                        </div>
                        <!-- END: Failed Notification Content -->
            
        </div>
    </div>
@endsection

@section('script')
<script type="module">
    (function () {
        // Check if the notification has been shown before
        if (getCookie("notificationShown") != "true") {
            $("#success-notification-toggle").on("click", function () {
                // Show the notification
                Toastify({
                    node: $("#success-notification-content").clone().removeClass("hidden")[0],
                    duration: 5000,
                    newWindow: true,
                    close: true,
                    gravity: "top",
                    position: "right",
                    stopOnFocus: true
                }).showToast();
                
                // Set a cookie to indicate that the notification has been shown
                setCookie("notificationShown", "true", 365);
            });
        }
        
        // Function to set a cookie
        function setCookie(name, value, days) {
            var expires = "";
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + (value || "")  + expires + "; path=/";
        }
        
        // Function to get a cookie
        function getCookie(name) {
            var nameEQ = name + "=";
            var ca = document.cookie.split(';');
            for(var i=0;i < ca.length;i++) {
                var c = ca[i];
                while (c.charAt(0)==' ') c = c.substring(1,c.length);
                if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
            }
            return null;
        }
    })();
</script>
@endsection