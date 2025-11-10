<div>

{{-- page title --}}
<h2 class="text-[#eee] font-bold text-3xl mb-[10px]">Sign Up</h2>

<form action="{{ route('user.signup') }}" method="POST" class="{{config('tailwind.block-bg--transparent')}} border border-gray-700 text-white p-6 rounded-lg mx-auto space-y-4 max-w-sm">
    @csrf 

    <input required autofocus type="email" name="email" placeholder="Email" class="w-full py-2 px-4 rounded bg-gray-700 focus:outline-none focus:outline-none focus:ring-1 focus:ring-gray-300 focus:bg-gray-700">

    <input required type="password" name="password" placeholder="Password" class="w-full py-2 px-4 rounded bg-gray-700 focus:outline-none focus:outline-none focus:ring-1 focus:ring-gray-300 focus:bg-gray-700">
    
    <input required type="password" name="password_confirmation" placeholder="Repeat Password" class="w-full py-2 px-4 rounded bg-gray-700 focus:outline-none focus:outline-none focus:ring-1 focus:ring-gray-300 focus:bg-gray-700">

    <button class="w-full bg-green-600 {{config('tailwind.btn-styles')}}">Sign Up</button>

</form>

{{-- print errors --}}
@error('email')
    <div class="text-[red] mt-8 bg-black/50 px-3 py-2 rounded">{{$message}}</div>
@enderror

@error('password')
    <div class="text-[red] mt-8 bg-black/50 px-3 py-2 rounded">{{$message}}</div>
@enderror

</div>