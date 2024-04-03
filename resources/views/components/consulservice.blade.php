<div class="flex">
    <img src="{{asset($doctorImage)}}" alt="{{ $alt }}" class="card-image">

    <div class="text-left pl-[20px] text-[12px]">
        <p class="font-semibold ">{{ $name }}</p>
        <p class="text-[#888888]">{{ $specialist }}</p>
        <button class="text-[#FF0000] outline-none">+more</button>

        <div class="flex pt-[8px]">
            <img src="{{asset('images/doctor-bag.png')}}" alt="years of experience" class="w-[9.75px] h-[10.5px]">
            <p class="text-semibold text-[8px] text-[#A4907C] pl-[4px] ">{{ $experience }}</p>
        </div>

        <p class="pb-[50px] text-medium pt-[4px]">{{ $price }}</p>

        <button class="bg-[#A4907C] text-bold text-[12px] text-white rounded-[4px] py-[8px] px-[21px]">Chat</button>
    </div>
</div>

