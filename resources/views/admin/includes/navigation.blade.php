<ul class="flex mb-0 list-none flex-wrap pt-10 flex-row">
  <li class="-mb-px mr-2 last:mr-0 text-left">
    <a href="{{ route('admin.students') }}" class="{{ (Route::currentRouteName() == 'admin.students') ? 'active' : '' }} text-lg font-bold uppercase pl-10 pr-52 py-10 rounded block leading-normal tab">
      Students
      <p class="text-sm text-gray-500">125 student registered</p>
    </a>
  </li>
  <li class="-mb-px mr-2 last:mr-0 text-left">
    <a href="{{ route('admin.study_groups') }}" class="{{ (Route::currentRouteName() == 'admin.study_groups') ? 'active' : '' }} text-lg font-bold uppercase pl-10 pr-52 py-10 rounded block leading-normal tab">
      Study Groups
      <p class="text-sm text-gray-300">6 groups 42 student</p>
    </a>
  </li>      
</ul>
  
      
