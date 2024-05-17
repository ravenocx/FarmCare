<aside id="logo-sidebar" class="fixed top-0 left-0 w-1/6 h-screen pt-36 transition-transform -translate-x-full bg-secondaryColor border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
   <div class="h-full px-3 pb-4 overflow-y-auto">
      <ul class="space-y-2 font-semibold max-w-60 container mx-auto">
         <li>
            <a href="{{route('veterinarian.index')}}" class="flex items-center p-2 rounded-lg {{Route::currentRouteName() == 'veterinarian.index' ? 'bg-primaryColor text-white' : ''}} hover:bg-primaryColor hover:text-white group">
               <span class="ms-3">Home</span>
            </a>
         </li>
         <li>
            <a href="#" class="flex items-center p-2 rounded-lg  hover:bg-primaryColor hover:text-white group">
               <span class="ms-3">Article</span>
            </a>
         </li>
         <li>
            <a href="#" class="flex items-center p-2 rounded-lg  hover:bg-primaryColor hover:text-white group">
               <span class="ms-3">Order History</span>
            </a>
         </li>
         <li>
            <a href="{{route('offschedule.index')}}" class="flex items-center p-2 rounded-lg  hover:bg-primaryColor hover:text-white group">
               <span class="ms-3">Offline Reservation</span>
            </a>
         </li>
         <li>
            <a href="#" class="flex items-center p-2 rounded-lg  hover:bg-primaryColor hover:text-white group">
               <span class="ms-3">Online Consultation</span>
            </a>
         </li>
         <li>
            <a href="#" class="flex items-center p-2 rounded-lg  hover:bg-primaryColor hover:text-white group">
               <span class="ms-3">Profile</span>
            </a>
         </li>
      </ul>
   </div>
</aside>