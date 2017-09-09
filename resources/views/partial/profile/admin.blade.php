@if (Auth::user()->hasRole('Assessor'))
    @include('modal.addmockevent')
@endif

<div>

    <h3>Admin Section</h3>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddMockModal">Add Assessment</button>
    <button type="button" class="btn btn-primary">Update Dog</button>
</div>