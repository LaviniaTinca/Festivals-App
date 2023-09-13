 <!-- Button section  -->
 <section class="max-w-xs flex flex-col justify-between items-right mt-8 mb-8">
     <div class="mt-4 ml-40 items-center">
         <div>
             <a href="/admin/events/{{ $festival->id }}/create1">
                 <button class="transition-colors duration-300 text-xs text-gray-500 font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8 text-gray-400">
                     Add Event</button>
             </a>
         </div>
         <br>
         <div>
             <a href="/admin/tickets/{{ $festival->id }}/create1">
                 <button class="transition-colors duration-300 text-xs text-gray-500 font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8 text-gray-400">
                     Add Ticket</button>
             </a>
         </div>
         <br>
         <div>
             <a href="/admin/festivals/{{ $festival->id }}/edit">
                 <button class="transition-colors duration-300 text-xs text-gray-500 font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8 text-gray-400">
                     Edit Festival</button>
             </a>
         </div>
         <br>
         <div>
             <form method="POST" action="/admin/festivals/{{ $festival->id }}">
                 @csrf
                 @method('DELETE')

                 <button class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8 text-gray-400">
                     Delete Festival</button>
             </form>
         </div>
     </div>
 </section>