<footer class="{{ config('tailwind.block-bg--transparent') }} text-gray-600 text-center p-3 text-sm">
    <div class="max-w-4xl mx-auto flex items-center justify-between">
        <div class="bg-change">
            <select title="Select Background GIF" name="bg-change" class="border bg-[transparent] border-gray-700 p-1 px-2 rounded-md cursor-pointer transition opacity-30 hover:opacity-100">
                <option disabled value="0">Select Background GIF</option>
            </select>
        </div>
        <p>&copy; Nov 2025 MyCompany. All rights reserved.</p>
    </div>
</footer>

@include('partials.js_change_bg')