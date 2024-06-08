@extends('layouts.user.app')

@section('title','FarmCare - Online Consultation')

@section('main-content')
    <div class="container mx-auto mb-20">
        <h1 class="font-semibold text-center text-4xl mt-14 mb-6">Frequently Ask Question</h1>
        
        <div id="accordion-collapse" data-accordion="collapse">
            <h2 id="accordion-collapse-heading-1">
                <button id ="accordionButton-1" type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right border-2 border-b-0 rounded-t-xl border-shadeCream gap-3 bg-white" data-accordion-target="#accordion-collapse-body-1" aria-expanded="true" aria-controls="accordion-collapse-body-1">
                <span class="text-black">I have made a consultation appointment. Where can I see it?</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                </svg>
                </button>
            </h2>
            <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
                <div class="p-5 border-2 border-t-0 border-shadeCream rounded-b-xl">
                    <p class="mb-2">Follow these steps to view your consultation appointment:</p>
                    <ol class="list-decimal text-base mt-4 pl-5">
                        <li>Select 'Order History' on the main page of the FarmCare+</li>
                        <li>You can see your consultation appointment in the 'Detailed Order History' button.</li>
                        <li>There you will see details of the consultation appointment that you have made.</li>
                    </ol>
                </div>
            </div>

            <h2 id="accordion-collapse-heading-2" class="mt-10">
                <button id ="accordionButton-2" type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right border-2 rounded-xl border-shadeCream gap-3 bg-white" data-accordion-target="#accordion-collapse-body-2" aria-expanded="false" aria-controls="accordion-collapse-body-2">
                <span class="text-black">Is online consultation service safe?</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                </svg>
                </button>
            </h2>
            <div id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2">
                <div class="p-5 border-2 border-t-0 border-shadeCream rounded-b-xl">
                    <p class="mb-2">We take the privacy of your data very seriously, and in accordance with our Privacy Policy, only your selected doctor(s) and you can view your personal health information, for the avoidance of doubt, the personal health information we collect is information related to your health and is not considered medical records, as regulated in our Privacy Policy.</p>
                </div>
            </div>

            <h2 id="accordion-collapse-heading-3" class="mt-10">
                <button id ="accordionButton-3" type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right border-2 rounded-xl border-shadeCream gap-3 bg-white" data-accordion-target="#accordion-collapse-body-3" aria-expanded="false" aria-controls="accordion-collapse-body-3">
                <span class="text-black">I have made a consultation appointment. Where can I see it?</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                </svg>
                </button>
            </h2>
            <div id="accordion-collapse-body-3" class="hidden" aria-labelledby="accordion-collapse-heading-3">
                <div class="p-5 border-2 border-t-0 border-shadeCream rounded-b-xl">
                    <p class="mb-2">Flowbite is an open-source library of interactive components built on top of Tailwind CSS including buttons, dropdowns, modals, navbars, and more.</p>
                    <p class="">Check out this guide to learn how to <a href="/docs/getting-started/introduction/" class="text-blue-600 dark:text-blue-500 hover:underline">get started</a> and start developing websites even faster with components on top of Tailwind CSS.</p>
                </div>
            </div>

            <h2 id="accordion-collapse-heading-4" class="mt-10">
                <button id ="accordionButton-4" type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right border-2 rounded-xl border-shadeCream gap-3 bg-white" data-accordion-target="#accordion-collapse-body-4" aria-expanded="false" aria-controls="accordion-collapse-body-4">
                <span class="text-black">I have made a consultation appointment. Where can I see it?</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                </svg>
                </button>
            </h2>
            <div id="accordion-collapse-body-4" class="hidden" aria-labelledby="accordion-collapse-heading-4">
                <div class="p-5 border-2 border-t-0 border-shadeCream rounded-b-xl">
                    <p class="mb-2">Flowbite is an open-source library of interactive components built on top of Tailwind CSS including buttons, dropdowns, modals, navbars, and more.</p>
                    <p class="">Check out this guide to learn how to <a href="/docs/getting-started/introduction/" class="text-blue-600 dark:text-blue-500 hover:underline">get started</a> and start developing websites even faster with components on top of Tailwind CSS.</p>
                </div>
            </div>

            <h2 id="accordion-collapse-heading-5" class="mt-10">
                <button id ="accordionButton-5" type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right border-2 rounded-xl border-shadeCream gap-3 bg-white" data-accordion-target="#accordion-collapse-body-5" aria-expanded="false" aria-controls="accordion-collapse-body-5">
                <span class="text-black">I have made a consultation appointment. Where can I see it?</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                </svg>
                </button>
            </h2>
            <div id="accordion-collapse-body-5" class="hidden" aria-labelledby="accordion-collapse-heading-5">
                <div class="p-5 border-2 border-t-0 border-shadeCream rounded-b-xl">
                    <p class="mb-2">Flowbite is an open-source library of interactive components built on top of Tailwind CSS including buttons, dropdowns, modals, navbars, and more.</p>
                    <p class="">Check out this guide to learn how to <a href="/docs/getting-started/introduction/" class="text-blue-600 dark:text-blue-500 hover:underline">get started</a> and start developing websites even faster with components on top of Tailwind CSS.</p>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function toggleBorderClass(i) {
            const button = document.querySelector(`button[data-accordion-target="#accordion-collapse-body-${i}"]`).classList;
    
            if (button.contains('border-b-0')) {
                button.add('rounded-xl');
                button.remove('border-b-0', 'rounded-t-xl');
            } else if (button.contains('rounded-xl')) {
                button.remove('rounded-xl');
                button.add('border-b-0', 'rounded-t-xl');
            }
        }

        for (let i = 1; i <= 5; i++) {
            document.getElementById(`accordionButton-${i}`).addEventListener('click', function() {
                let accordionIndex
                for (let j = 1; j <= 5; j++) {
                    let aria = document.getElementById(`accordion-collapse-body-${j}`).classList
                    if (!aria.contains('hidden')){
                        accordionIndex = j
                    }
                    console.log(accordionIndex)
                }
                console.log("accordInd" , accordionIndex)
                toggleBorderClass(accordionIndex);
                toggleBorderClass(i);
            });
        }


    </script>
    @endpush

@endsection