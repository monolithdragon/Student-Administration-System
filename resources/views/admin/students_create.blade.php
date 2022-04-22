@extends('admin.layouts.app')

@section('content')
<h5 class="uppercase text-neutral-400 mb-2">Student Informations</h5>
    <form action="{{ route('admin.students.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="student-name">Name</label>
            <input id="student-name" name="name" type="text" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Student name">
        </div>
        <div class="mb-3">
            <label for="student-email">Email</label>
            <input id="student-email" name="email" type="email" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Student email">
        </div>
        <div class="mb-3">
            <label for="student-sex">Sex</label>
            <input id="student-sex" name="sex" type="text" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Student sex">
        </div>
        <div class="mb-3">
            <label for="student-place_of_birth">Place of Birth</label>
            <input id="student-place_of_birth" name="place_of_birth" type="text" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Student place of birth">
        </div>
        <div>
            <label for="student-date_of_birth">Date of Birth</label>
            <input id="student-date_of_birth" name="date_of_birth" type="text" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Student date of birth">
        </div>

        <div class="block mt-5 mr-20">
            <h5 class="uppercase text-neutral-400 mb-2">Study groups</h5>
            <ul>
                @foreach ($study_groups as $group)
                    
                <li class="mb-2"><input class="mr-2 accent-orange-600" type="checkbox" name="study[]" value="{{ $group->id }}">{{ $group->name }}</li>
                
                @endforeach
              
            </ul>
          </div>
        <a href="{{ route('admin.students') }}" class="mt-5 py-2 px-4 border text-sm font-medium rounded-md text-white bg-orange-400 hover:bg-orange-600 float-right shadow-md">Cancel</a>
        <button type="submit" class="mt-5 py-2 px-4 border text-sm font-medium rounded-md text-white bg-orange-400 hover:bg-orange-600 float-right shadow-md">Create Student</button>
    </form>
@endsection