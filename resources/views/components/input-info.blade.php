@props(['messages'])

@if ($messages)
<p class="flex items-center gap-0.5 dark:text-blackColor-dark">
    <svg
     class="feather feather-info w-14px h-14px"
      xmlns="http://www.w3.org/2000/svg"
      width="24"
      height="24"
      viewBox="0 0 24 24"
      fill="none"
      stroke="currentColor"
      stroke-width="2"
      stroke-linecap="round"
      stroke-linejoin="round"
     
    >
      <circle cx="12" cy="12" r="10"></circle>
      <line
        x1="12"
        y1="16"
        x2="12"
        y2="12"
      ></line>
      <line
        x1="12"
        y1="8"
        x2="12.01"
        y2="8"
      ></line>
    </svg>
 {{$messages}}
  </p>
@endif
