<img  
    @if(setting('site_logo')!='') 
        src="{{setting('site_logo')}}" 
    @else
        src="{{asset('assets/images/logo.png')}}"
    @endif alt='{{setting('site_name')}}'
/>