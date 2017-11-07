<h1>Profiles</h1>
@if (count($profiles)>0)
    @foreach ($profiles as $profile)

        <div>{{$profile->PSID}} {{$profile->name}}</div>

    @endforeach
@else
    No profile found
@endif