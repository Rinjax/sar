<h2 class="text-center">Team Dogs</h2>
<div class="panel">
    <table class="table center-table-text">
        <tr class="" style="background-color: #7f7f7f">
            <th>Pic</th>
            <th>Name</th>
            <th>Level</th>
        </tr>
        @foreach($dogs as $dog)
            <tr>
                <td>
                    <img class="img-circle img-responsive center-block" src="img/profile/dogs/{{$dog->profile_pic}}"
                         alt="Dog" style="max-height: 7rem;">
                </td>
                <td>{{$dog->name}}</td>
                <td>{{$dog->level}}</td>
            </tr>
        @endforeach

    </table>
</div>
