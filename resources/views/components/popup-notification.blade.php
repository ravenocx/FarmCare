<dialog id="my_modal_2" class="modal">
    <div class="modal-box text-green-800 shadow-2xl">
        <div class="rounded-full dark:bg-green-900 p-2 flex items-center justify-center mx-auto">
            <svg aria-hidden="true" class="w-12 h-12 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
            <span class="sr-only">Success</span>
        </div>
        <p class="flex justify-center font-bold text-lg py-4">{{$message}}</p>
        <div class="modal-action flex justify-center">
        <form method="dialog">
            @if(!empty($linkTo))
                <a href="">
                    <button class="btn text-gray-700 bg-green-300 shadow-2xl">Continue</button>
                </a>
            @else
                <button class="btn text-gray-700 bg-green-300 shadow-2xl">Continue</button>
            @endif
        </form>
        </div>
    </div>
    <form method="dialog" class="modal-backdrop shadow-lg">
        <button>close</button>
    </form>
</dialog>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('my_modal_2');
        if (modal) {
            modal.showModal();
        }
    });
</script>
@endpush