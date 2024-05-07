<div class="flex">
    <img src="{{asset($doctorImage)}}" alt="{{ $alt }}" class="card-image  h-[180px] border-shadeBrown border-2 rounded-md">

    <div class="text-left ml-5 text-xs">
        <p class="font-semibold ">{{ $name }}</p>
        <p class="text-mediumGray my-1">{{ $specialist }}</p>
        <button class="text-[#FF0000]">+more</button>

        <div class="flex mt-2 items-center">
            <img src="{{asset('images/vector/doctor-bag.svg')}}" alt="years of experience" class="h-4">
            <p class="font-semibold text-xs text-[#A4907C] ml-1 ">{{ $experience }}</p>
        </div>

        <p class="mb-[43px] font-medium mt-2">{{ $price }}</p>

        <button class="bg-shadeBrown font-bold text-xs text-white rounded py-2 px-5">Chat</button>
    </div>
</div>

