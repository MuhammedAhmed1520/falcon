@if(!request()->get('window'))
<nav class="breadcrumb" aria-label="breadcrumbs">
    <ul>
        <li><a href="{{$shared_main_settings['front_site']->where('key','front_home')->first()->value ?? null}}"  class="has-text-black"> الرئيسية </a></li>
        <li><a  href="{{$shared_main_settings['front_site']->where('key','front_eservices')->first()->value ?? null}}"  class="has-text-black">الخدمات الإلكترونية</a></li>
        <li class="is-active"><a href="#" aria-current="page">المخالفات البيئية</a></li>
    </ul>
</nav>
@endif