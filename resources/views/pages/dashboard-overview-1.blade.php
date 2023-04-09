@extends('../layout/' . $layout)

@section('subhead')
    <title>Dashboard - Telesurgery</title>
@endsection

@section('subcontent')
<script src="https://cdnjs.cloudflare.com/ajax/libs/mqtt/2.18.8/mqtt.min.js"></script>
<script src="{{ asset('js/mqtt.js') }}"></script>
<script src="public/script.js"></script>

    <div class="grid grid-cols-12 gap-6">
        <!-- BEGIN: Room Join -->
        <div class="col-span-6 lg:mt-2" style="center">
            <div class="intro-y box p-1 mt-2">
                <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-3">
                    <div class="flex flex-col sm:flex-row items-center p-1 border-b border-slate-300/60 dark:border-darkmode-100">
                        <h2 class="font-medium text-base mr-auto">Streaming</h2>
                    </div> 
                    <form method="POST" action="/meeting" class="flex flex-grid items-center gap-3 lg:mt-2"> 
                        @csrf
                        <input type="text" name="room_name"id="room_name" class="form-control col-span-5" placeholder="Input inline 1" aria-label="default input inline 1">
                        <button type="submit" name="action" class="btn btn-elevated-rounded-dark w-24 mr-1 mb-2">GO</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- END: Room Join -->
    </div>
        <!-- BEGIN: Notification Content -->
        <div id="success-notification-content" class="toastify-content hidden flex"> <i class="text-success" data-lucide="check-circle"></i>
            <div class="ml-4 mr-4">
                <div class="font-medium">Yay! You are Logged In</div>
            </div>
        </div> 
        <!-- END: Notification Content -->
    <script src='https://meet.jit.si/external_api.js'></script>
    <script>
        const domain = 'meet.jit.si';
        const options = {
            roomName: '', // room name will be set dynamically
            parentNode: document.querySelector('#jitsi-container'),
        };

        const api = new JitsiMeetExternalAPI(domain, options);

        // Set room name dynamically when form is submitted
        const form = document.querySelector('form');
        form.addEventListener('submit', (event) => {
            event.preventDefault();
            const roomNameInput = document.querySelector('#room_name');
            const roomName = roomNameInput.value;
            options.roomName = roomName;
            api.executeCommand('displayName', 'My Name');
            api.executeCommand('subject', 'My Meeting');
        });
    </script>
@endsection

@section('script')
<script type="module">
    (function () {
        Toastify({
            node: $("#success-notification-content").clone().removeClass("hidden")[0],
            duration: 2500,
            newWindow: true,
            close: true,
            gravity: "top",
            position: "right",
            stopOnFocus: true
        }).showToast();
    })();
</script>
@endsection