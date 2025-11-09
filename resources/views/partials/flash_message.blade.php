@if (session('success'))
    <div class="flash-msg transition bg-black text-[antiquewhite] px-3 py-2 rounded border border-[antiquewhite] fixed bottom-[20px] right-[20px] opacity-0 translate-y-[100px]">{{ session('success') }}</div>

    <script>
        // show success msg nicely and then hide
        const successMsg = document.querySelector('.flash-msg');
        setTimeout(() => {
            successMsg.classList.remove('opacity-0');
            successMsg.classList.remove('translate-y-[100px]');
        }, 200)
        setTimeout(() => {
            successMsg.classList.add('opacity-0');
            successMsg.classList.add('translate-y-[100px]');
        }, 5000)
        setTimeout(() => { successMsg.remove(); }, 6000)
    </script>
@endif



@if (session('error'))
    <div class="flash-msg transition bg-black text-[red] px-3 py-2 rounded border border-[red] fixed bottom-[20px] right-[20px] opacity-0 translate-y-[100px]">{{ session('error') }}</div>

    <script>
        // show success msg nicely and then hide
        const successMsg = document.querySelector('.flash-msg');
        setTimeout(() => {
            successMsg.classList.remove('opacity-0');
            successMsg.classList.remove('translate-y-[100px]');
        }, 200)
        setTimeout(() => {
            successMsg.classList.add('opacity-0');
            successMsg.classList.add('translate-y-[100px]');
        }, 5000)
        setTimeout(() => { successMsg.remove(); }, 6000)
    </script>
@endif