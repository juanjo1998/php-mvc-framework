<div class="w-full max-w-xs">
   <form
      method="POST"
      class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
      <div class="mb-4">
         <label class="block text-gray-700 text-sm font-bold mb-2" for="subject">
            Subject
         </label>
         <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="subject" name="subject" type="text" placeholder="Subject">
      </div>

      <div class="mb-4">
         <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
            Email
         </label>
         <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" type="text" placeholder="Email">
      </div>

      <div class="mb-4">
         <label class="block text-gray-700 text-sm font-bold mb-2" for="body">
            Body
         </label>
         <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="body" name="body" type="text" placeholder="Enter a description"></textarea>
      </div>

      <div class="flex items-center justify-between">
         <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
            Submit
         </button>
      </div>
   </form>
</div>