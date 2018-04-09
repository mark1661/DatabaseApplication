<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
    </head>
    <body>
      <ul>
        <!-- Blade code -->
        @foreach ($tasks as $task)
         <li>
           <a href="/tasks/{{$task->id}}">
             {{$task->body}}
           </a>
         </li>
        @endforeach
      </ul>
    </body>
</html>
