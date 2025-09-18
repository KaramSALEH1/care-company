@extends('layouts.app')

@section('content')
    <section class="bg-white rounded-none shadow-lg p-10 w-full">
        <h1 class="text-4xl font-extrabold text-blue-800 mb-6 text-center">Contact Us</h1>
        <form class="space-y-6">
            <div>
                <label class="block mb-1 font-semibold text-blue-700" for="name">Name</label>
                <input class="w-full border border-blue-200 rounded px-3 py-2 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition" type="text" id="name" name="name" required>
            </div>
            <div>
                <label class="block mb-1 font-semibold text-blue-700" for="email">Email</label>
                <input class="w-full border border-blue-200 rounded px-3 py-2 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition" type="email" id="email" name="email" required>
            </div>
            <div>
                <label class="block mb-1 font-semibold text-blue-700" for="message">Message</label>
                <textarea class="w-full border border-blue-200 rounded px-3 py-2 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition" id="message" name="message" rows="4" required></textarea>
            </div>
            <button type="submit" class="w-full bg-blue-700 text-white px-6 py-2 rounded-full font-semibold shadow hover:bg-blue-800 transition">Send</button>
        </form>
    </section>
@endsection 