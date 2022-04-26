@extends('admin.layouts.app')

@section('content')

<div class="container mx-auto">
  <div class="columns-4">
    <div class="block rounded relative pb-8">
      <div class="uppercase text-neutral-400">Search For Name</div>

      <svg id="search-icon" class="absolute top-7 left-2 w-6 h-6 fill-neutral-100 bg-neutral-200" fill="currentColor"
        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <path
          d="M16.32 14.9l5.39 5.4a1 1 0 0 1-1.42 1.4l-5.38-5.38a8 8 0 1 1 1.41-1.41zM10 16a6 6 0 1 0 0-12 6 6 0 0 0 0 12z">
        </path>
      </svg>

      <form action={{ route("admin.students") }} method="get">
        
          <input id="search" type="text" name="keyword" class="px-2 py-1 bg-neutral-200 text-black">
      </form>
    </div>
    <div class="flex pt-7 ">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
        stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round"
          d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
      </svg>
      <p class="uppercase font-bold"><span>{{ $count_of_students }}</span> students</p>
    </div>
    <div class="flex pt-7">
      <a href="#" id="edit_student" class="bg-cyan-500 w-7 h-7">
        <svg xmlns="http://www.w3.org/2000/svg" class="text-white font-bold h-5 w-5" fill="none" viewBox="0 0 24 24"
          stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round"
            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
        </svg>
      </a>
      <a href="{{ route('admin.students.create') }}"
        class="bg-cyan-400 text-white font-bold text-center w-20 h-7">New</a>
    </div>
    <div class="flex pt-7">
      {{ $students->links() }}
    </div>
  </div>

  <hr>

  <div class="flex flex-row pt-8">
    <div class="block mr-50">
      <h5 class="uppercase text-neutral-400">Filters for study groups</h5>
      <ul>
        <form action="" method="POST" id='submit'>
          @csrf
          @foreach ($study_groups as $group)
          <li class="mb-2"><input class="mr-2 accent-orange-600 filter-group" type="checkbox" name="study[]" id={{
              $group->name }} value={{ $group->id }}> {{ $group->name }}</li>

          @endforeach
        </form>
      </ul>
    </div>

    <div class="flex flex-row ml-36">
      <div class="overflow-x-auto shadow-md sm:rounded-lg">
        <div class="inline-block min-w-full align-middle">
          <div class="overflow-hidden " id="students_table">
            <table class="min-w-full divide-y table-fixed divide-gray-700">
              <thead>
                <tr>
                  <th scope="col" class="p-4">
                    <div class="flex items-center">
                      <input id="checkbox-all" type="checkbox"
                        class="w-4 h-4 accent-orange-600 bg-gray-800 rounded focus:ring-2">
                    </div>
                  </th>
                  <th scope="col"></th>
                  <th scope="col"
                    class="py-3 px-6 text-xs font-medium tracking-wider text-left text-neutral-400 uppercase">
                    Name
                  </th>
                  <th scope="col"
                    class="py-3 px-6 text-xs font-medium tracking-wider text-left text-neutral-400 uppercase">
                    Sex
                  </th>
                  <th scope="col"
                    class="py-3 px-6 text-xs font-medium tracking-wider text-left text-neutral-400 uppercase">
                    Place and date of birth
                  </th>
                  <th scope="col"
                    class="py-3 px-6 text-xs font-medium tracking-wider text-right text-neutral-400 uppercase">
                    Groups
                  </th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y">
                @foreach ($students as $student)
                <tr class="hover:bg-gray-100">
                  <td class="p-4 w-4">
                    <div class="flex items-center">
                      <input id="checkbox-table-1" type="checkbox" data-id={{ $student->id }}
                      class="w-4 h-4 accent-orange-600 bg-gray-100 rounded border-gray-300 ">
                    </div>
                  </td>
                  <td class="py-4 px-6">
                    <img class="h-8 w-8 object-cover  rounded-full"
                      src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1361&q=80"
                      alt="Current profile photo" />
                  </td>
                  <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                    {{ $student->name }}
                  </td>
                  <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                    {{ $student->sex }}
                  </td>
                  <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                    {{ $student->place_of_birth.', '.$student->date_of_birth }}
                  </td>
                  <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                    @foreach ($student->study_groups as $group)
                    {{ $group->name.', ' }}
                    @endforeach
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>


  </div>

</div>
@endsection