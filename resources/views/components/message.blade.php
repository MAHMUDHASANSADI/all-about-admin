@if(Session::has('success'))
    <div class="w-full mb-4 px-4 py-2 bg-green-700 text-white rounded-md ">{{Session::get('success')}}</div>
@endif
@if(Session::has('error'))
    <div class="w-full mb-4 px-4 py-2 bg-red-700 text-white rounded-md">{{Session::get('error')}}</div>
@endif
